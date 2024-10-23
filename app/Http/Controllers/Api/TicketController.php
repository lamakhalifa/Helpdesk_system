<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Ticket;
use Illuminate\Http\Request;
use App\Category;
use App\Comment;
use App\User;
use App\Http\Resources\FileResource;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth:api');
     }

    public function index(Request $request)
    {
        return $request->user()->tickets;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

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

        // //upload files
        // if ($request->hasFile('files')) {
        //     foreach ($request->file('files') as $file) {
        //         $storageType = env('FILES_STORAGE');
        //         $ticket->addMedia($file)->toMediaCollection('files',$storageType); 
        //     }
        // }

    }

    public function uploadFiles(Ticket $ticket){
        if (request()->hasFile('files')) {
            $uploadedFiles = [];
            foreach (request()->file('files') as $file) {
                $storageType = env('FILES_STORAGE');
                $uploadedFile = $ticket->addMedia($file)->toMediaCollection('files',$storageType); 
                $uploadedFiles[] = $uploadedFile;
            }
            return FileResource::collection($uploadedFiles);
        }

    }
    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $this->authorize('update', $ticket);
        $this->validateTicket($request);

        // Check if the ticket was updated 
        if ($ticket->update($request->all())) {
            return response()->json(['message' => 'updated']);
        } else {
            return response()->json(['message' => 'error'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $this->authorize('delete', $ticket);
        $ticket->delete();
    }

    public function closeTicket($id)
    {
        
        $ticket = Ticket::find($id);
        $this->authorize('close', $ticket);
        if ($ticket) {
            $ticket->status = 'close'; 
            $ticket->save();
            return response()->json(['message' => 'Ticket closed successfully.']);
        }

        return response()->json(['message' => 'Ticket not found.'], 404);
    }
}
