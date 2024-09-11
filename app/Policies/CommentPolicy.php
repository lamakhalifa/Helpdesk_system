<?php

namespace App\Policies;

use App\Comment;
use App\User;
use App\Ticket;
use Illuminate\Auth\Access\Response;

class CommentPolicy
{

    private function isAdmin(User $user)
    {
        return $user->role === 'admin'; // Check if user's role is 'admin'
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $this->isAdmin($user)|| Ticket::where('agent_id', $user->id)->exists();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Comment $comment): bool
    {
        // Check if the user can view the ticket which the comment belongs to
        return $user->can('view', $comment->ticket);
    }

    /**
     * Determine whether the user can create models.
     */
    // anyone who can view the ticket can create a comment
    public function create(User $user,Ticket $ticket): bool
    {
        return $user->can('view', $ticket);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Comment $comment): bool
    {
        return $this->isAdmin($user)|| $user->id === $comment->user_id;
    }


}
