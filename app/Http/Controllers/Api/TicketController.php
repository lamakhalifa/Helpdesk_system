<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Ticket;
use Illuminate\Http\Request;
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

        $customer = auth()->user();

        $ticket = Ticket::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'content' => $request->content,
            'customer_id' => $customer->id,
        ]);

        if($ticket){
            return response()->json(['ticket' => $ticket]); // TODO: create ticket resource
        }

        return response()->json(['error' => 'Ticket could not be created'], 500);

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
        // TODO: create show
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

        if( $ticket->delete()){
            return response()->json(['message' => 'deleted']);
        }else{
            return response()->json(['message' => 'error'], 500);
        }
    }

    public function closeTicket(Ticket $ticket)
    {
        $this->authorize('close', $ticket);

        $ticket->status = 'close';
        $ticket->save();

        return response()->json(['message' => 'Ticket closed successfully.']);
    }
}
