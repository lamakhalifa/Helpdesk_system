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

    /**
     * Determine if the user can view any tickets.
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return $this->isAdmin($user) || Ticket::where('agent_id', $user->id)->exists();
    }
    /**
     * Determine if the user can view a specific ticket.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Ticket $ticket
     * @return bool
     */
    public function viewAnyForAgent(User $user, Ticket $ticket)
    {
        return $this->isAdmin($user) || $this->isAssignedAgent($user, $ticket);
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
        return $this->isAdmin($user) || $this->isAssignedAgent($user, $ticket);
    }

    /**
     * Determine if the user can create tickets.
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function create(User $user)
    {
        return $this->isAdmin($user);
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
        return $this->isAdmin($user) || $this->isAssignedAgent($user, $ticket);
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
        return $this->isAdmin($user);
    }
}
