<!-- resources/views/components/sidebar.blade.php -->

<div>
    <div class="brand">
        HelpDisk
    </div>
    <div>
        <a href="{{route('tickets.index')}}"><i class="fa-regular fa-comments"></i> Ticket</a>
    </div>
    <div>
        <a href="{{route('users.index')}}"><i class="fa-regular fa-user"></i> Users</a>
    </div>
    <div>
        <a href="{{route('categories.index')}}"><i class="fa-solid fa-user-tie"></i> Categories </a>
    </div>
    <div>
        <a href="#"><i class="fa fa-cogs"></i> Control Panel</a>
    </div>
    <div>
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf 
            <button type="submit" class="logout-btn">
                <i class="fa-solid fa-user-tie"></i> Logout
            </button>
        </form>        
    </div>
</div>
