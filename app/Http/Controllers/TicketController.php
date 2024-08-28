<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use App\Ticket;
use Illuminate\Http\Request;




class TicketController extends Controller
{
    public function index(){
      $tickets = Ticket::paginate(5);
    
        return view('ticket.index',compact('tickets'));
    }
   public function create(){
    $cats = Category::latest()->get();
  
    return view('ticket.create',compact('cats'));
   }

   public function store(Request $request){
    $request->validate([
        'category_id'=>'required',
        'title'=> 'required|string|min:3|max:40',
        'content'=> 'required|string|min:3|max:500',
   ]);

   Ticket::insert([
    'category_id'=> $request->category_id,
    'title'=> $request->title,
    'content'=> $request->content
   ]);

      return redirect()->route('ticket.index');

   }
   public function edit($id){
    $ticket=Ticket::find($id);
    $cats = Category::latest()->get();
    $cat = Category::find($ticket->category_id);
    return view('ticket.edit',compact('ticket','cats','cat'));
   }


   public function update(Request $request, $id){

$ticket = Ticket::findOrFail($id);
     $ticket->update([
        'category_id'=> $request->category_id,
        'title'=> $request->title,
        'content'=> $request->content
      ]);

      return redirect()->route('ticket.index');

   }

    public function delete($id)
   {
       Ticket::find($id)->delete();
       return redirect()->route('ticket.index');

   }

public function details($id){
    $ticket=Ticket::find($id);
  $cat = Category::find($ticket->category_id);
  return view('ticket.details', compact('ticket','cat'));
}

}
