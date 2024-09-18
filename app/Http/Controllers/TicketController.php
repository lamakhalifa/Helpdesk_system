<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\User;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Support\Facades\Gate;


class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();

        // Check if the user is authorized to view any tickets
        $this->authorize('viewAny', Ticket::class);

        if ($user->role === 'admin') {
            // Admins can view all tickets
            $tickets = Ticket::with(['customer', 'category', 'agent'])->paginate(50);
        } elseif ($user->role === 'agent') {

            // Agents can only view tickets assigned to them
            $tickets = Ticket::where('agent_id', $user->id)
                ->with(['customer', 'category', 'agent'])
                ->paginate(50);
        }
        return view('tickets.index', compact('tickets'));
    }


    public function create()
    {
        $this->authorize('create', Ticket::class);

        $cats = Category::latest()->get();
        return view('tickets.create', compact('cats'));
    }

    private function validateTicket(Request $request)
    {
        return $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|min:3|max:40',
            'content' => 'required|string|min:3|max:500',
            'customer_email' => 'required|email|exists:users,email',
            'agent_email' => 'required|email|exists:users,email',
            'files' => 'array',
            'files.*' => 'file|mimes:jpg,jpeg,png,gif,txt,pdf,doc,docx|max:2048',
        ]);
    }
    public function store(Request $request)
    {
        $this->authorize('create', Ticket::class);
        $this->validateTicket($request);

        // Find the customer and agent by their email addresses
        $customer = User::where('email', $request->customer_email)->first();
        $agent = User::where('email', $request->agent_email)->first();

        // Check if customer and agent exist
        if (!$customer) {
            return redirect()->back()->withErrors(['customer_email' => 'Customer email not found.']);
        }

        if (!$agent) {
            return redirect()->back()->withErrors(['agent_email' => 'Agent email not found.']);
        }

        // Check if the agent has the 'agent' role
        if (!in_array($agent->role, ['agent', 'admin'])) {
            return redirect()->back()->withErrors(['agent_email' => 'The user is not an agent.']);
        }

        // Create the ticket
        $ticket = Ticket::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'content' => $request->content,
            'customer_id' => $customer->id,
            'agent_id' => $agent->id,
        ]);

        //upload files
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $storageType = env('FILES_STORAGE');
                $ticket->addMedia($file)->toMediaCollection('files',$storageType); 
            }
        }

        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully');
    }

    public function edit(Ticket $ticket)
    {
        $this->authorize('update', $ticket);
        $cats = Category::latest()->get();
        return view('tickets.edit', compact('ticket', 'cats'));
    }


    public function update(Request $request, Ticket $ticket)
    {
        $this->authorize('update', $ticket);
        $this->validateTicket($request);

        // Find the customer and agent by their email addresses
        $customer = User::where('email', $request->customer_email)->first();
        $agent = User::where('email', $request->agent_email)->first();

        if (!$customer || !$agent) {
            return redirect()->back()->withErrors(['email' => 'Customer or agent email not found.']);
        }

        if (!in_array($agent->role, ['agent', 'admin'])) {
            return redirect()->back()->withErrors(['agent_email' => 'The user is not an agent.']);
        }

        // Update the ticket
        $ticket->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'content' => $request->content,
            'customer_id' => $customer->id,
            'agent_id' => $agent->id,
        ]);

        return redirect()->route('tickets.index')->with('success', 'Ticket updated successfully');
    }


    public function destroy(Ticket $ticket)
    {
        $this->authorize('delete', $ticket);
        $ticket->delete();
        return redirect()->route('tickets.index');

    }

    public function show(Ticket $ticket)
    {
        $this->authorize('view', $ticket);
        return view('tickets.details', compact('ticket'));
    }

    public function storeComment(Request $request,Ticket $ticket)
    {
        $this->authorize('create',  $ticket);
        $request->validate([
            'content' => 'required|string|max:200'
        ]);
        auth()->user()->comments()->create([
            'ticket_id'=>$ticket->id,
            'content' => $request['content']
        ]);
        return redirect()->back();
    }

}
