<?php

namespace App\Http\Controllers\Api;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ticket;


class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'ticket_id' => 'required',
            'content' => 'required'
        ]);

        $ticket = Ticket::findOrFail($request->ticket_id);

        if(auth()->id() != $ticket->user_id){
            return response()->json(['message' => 'You are not the task owner'], 401);
        }

        $request['user_id'] = auth()->id();

        $comment = $task->comments()->create($request->all());

        if($comment){
            return $comment;
        }

        return response()->json(['message' => 'Error, try again later'], 500);

    }

    public function update(Request $request, Comment $comment){

        $validatedData = $request->validate([
            'content' => 'required'
        ]);

        if(auth()->id() != $comment->user_id){
            return response()->json(['message' => 'you can not update this comment'], 401);
        }

        $updated = $comment->update($validatedData);

        if($updated){
            return ['message' => 'Updated successfully'];
        }

        return response()->json(['message' => 'Error, try again later'], 500);
    }

    public function destroy(Comment $comment){

        if(auth()->id() != $comment->user_id){
            return response()->json(['message' => 'you dont have permission to delete this comment'], 401);
        }

        if($comment->delete()){
            return ['message' => 'The comment has been Deleted successfully'];
        }


        return response()->json(['message' => 'Error, try again later'], 500);

    }


}
