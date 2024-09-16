<?php

namespace App\Policies;

use App\Comment;
use App\User;


class CommentPolicy
{

    private function isAdmin(User $user)
    {
        return $user->role === 'admin'; // Check if user's role is 'admin'
    }
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Comment $comment): bool
    {
        $lastCommentId =Comment::where('ticket_id', $comment->ticket_id)->latest()->first()->id;
        return ($this->isAdmin($user) || ($user->id === $comment->user_id) && ($lastCommentId === $comment->id)) ;
    }


}
