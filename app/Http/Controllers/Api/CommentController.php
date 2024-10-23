<?php

namespace App\Http\Controllers\Api;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ticket;
use App\Http\Resources\FileResource;


class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function store(Request $request){
     
        $validatedData = $request->validate([
            'ticket_id' => 'required',
            'content' => 'required',
            'user_id' => 'required',
            'files' => 'array',
            'files.*' => 'file|mimes:jpg,jpeg,png,gif,txt,pdf,doc,docx|max:2048'
        ]);

        $ticket = Ticket::findOrFail($request->ticket_id);

        if(auth()->id() != $ticket->customer_id){
            return response()->json(['message' => 'You are not the ticket owner'], 401);
        }

        $request['user_id'] = auth()->id();

        $comment = $ticket->comments()->create($request->all());
        
            //upload files
            
    
        if($comment){
            return response()->json($comment, 201);
        }

        return response()->json(['message' => 'Error, try again later'], 500);

    }

    public function uploadFiles(Comment $comment){
        if (request()->hasFile('files')) {
            $uploadedFiles = [];
            foreach (request()->file('files') as $file) {
                $storageType = env('FILES_STORAGE');
                $uploadedFile = $comment->addMedia($file)->toMediaCollection('files',$storageType); 
                $uploadedFiles[] = $uploadedFile;
            }
            return FileResource::collection($uploadedFiles);
        }

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
