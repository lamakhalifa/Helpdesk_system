<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',Comment::class);
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$ticket_id)
    {

        $request['user_id']=Auth::id();
        $request['ticket_id']=$ticket_id;
        $ticket = Ticket::find($ticket_id);
        $this->authorize('create', [Comment::class, $ticket]);
        //validate input
        $request->validate([
            'content' => 'required|string|max:200'
        ]);
        // create new comment after validate input
        Comment::create([
            'user_id'=>$request->user_id, // customer, agent, admin
            'ticket_id'=>$request->ticket_id,
            'content' => $request['content']
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        $this->authorize('view',Comment::class);
        return view('comments.show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ticket_id,$comment_id)
    {

        $comment = Comment::where('ticket_id', $ticket_id)->where('id', $comment_id)->first();
        $this->authorize('delete',$comment);
        $comment->delete();
        return redirect()->back();
    }
}
