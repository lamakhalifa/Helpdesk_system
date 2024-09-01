<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;




class TicketController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

    public function index(){
      $this->authorize('viewAny', Ticket::class);

      $tickets = Ticket::with(['customer','category','agent'])->paginate(50);
        return view('tickets.index',compact('tickets'));
    }

   public function create(){
    $this->authorize('create', Ticket::class);

    $cats = Category::latest()->get();  
    return view('tickets.create',compact('cats'));
   }

   public function store(Request $request)
   {
    $this->authorize('create', Ticket::class);
       $request->validate([
           'category_id' => 'required|exists:categories,id',
           'title' => 'required|string|min:3|max:40',
           'content' => 'required|string|min:3|max:500',
           'customer_email' => 'required|email|exists:users,email',
           'agent_email' => 'required|email|exists:users,email',
       ]);

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
       Ticket::create([
           'category_id' => $request->category_id,
           'title' => $request->title,
           'content' => $request->content,
           'customer_id' => $customer->id,
           'agent_id' => $agent->id,
       ]);

       return redirect()->route('tickets.index')->with('success', 'Ticket created successfully');
   }
   public function edit(Ticket $ticket){
    $this->authorize('update', $ticket);
    $ticket=Ticket::find($ticket->id);
    $cats = Category::latest()->get();
    //$cat = Category::find($ticket->category_id);
    return view('tickets.edit',compact('ticket','cats'));
   }


   public function update(Request $request, Ticket $ticket)
{
  $this->authorize('update', $ticket);
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'title' => 'required|string|min:3|max:40',
        'content' => 'required|string|min:3|max:500',
        'customer_email' => 'required|email|exists:users,email',
        'agent_email' => 'required|email|exists:users,email',
    ]);

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

public function show(Ticket $ticket){
    $ticket=Ticket::find($ticket->id);
  $cat = Category::find($ticket->category_id);
  return view('tickets.details', compact('ticket','cat'));
}

}
