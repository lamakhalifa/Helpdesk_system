<?php

namespace App\Policies;

use App\User;
use App\Ticket;
use Illuminate\Auth\Access\HandlesAuthorization;

class TicketPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user has admin role.
     *
     * @param \App\Models\User $user
     * @return bool
     */
    private function isAdmin(User $user)
    {
        return $user->role === 'admin'; // Check if user's role is 'admin'
    }

    private function isAssignedAgent(User $user, Ticket $ticket)
    {
        return $user->id === $ticket->agent_id; // Assuming 'agent_id' is the field in Ticket model that stores the agent ID
    }

    private function isOwner(User $user, Ticket $ticket)
    {
        return $user->id === $ticket->customer_id; // Assuming 'user_id' is the field in Ticket model that stores the owner ID
    }
    private function isCustomer(User $user)
    {
        return $user->role === 'customer'; // Check if user's role is 'customer'
    }

    /**
     * Determine if the user can view any tickets.
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return $this->isAdmin($user) || $this->isAssignedAgent($user) ;
    }

    /**
     * Determine if the user can view a specific ticket.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Ticket $ticket
     * @return bool
     */
    public function view(User $user, Ticket $ticket)
    {
    
        if ($this->isAdmin($user) || $this->isAssignedAgent($user, $ticket)) {
            return Ticket::all(); 
        }

        return $request->user()->tickets;
    }

    /**
     * Determine if the user can create tickets.
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function create(User $user)
    {
        return $this->isAdmin($user) || $this->isCustomer($user);
    }

    /**
     * Determine if the user can update the ticket.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Ticket $ticket
     * @return bool
     */
    public function update(User $user, Ticket $ticket)
    {
        return $this->isAdmin($user) || $this->isAssignedAgent($user, $ticket) || $this->isOwner($user, $ticket);
    }

    /**
     * Determine if the user can delete the ticket.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Ticket $ticket
     * @return bool
     */
    public function delete(User $user, Ticket $ticket)
    {
        return $this->isAdmin($user) || $this->isOwner($user, $ticket);
    }

    public function close(User $user, Ticket $ticket)
    {
        return $this->isAdmin($user) || $this->isOwner($user, $ticket) || $this->isAssignedAgent($user, $ticket);
    }
}
