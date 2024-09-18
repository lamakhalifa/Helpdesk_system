<div id="commentForm">
    <div class="card">
        <h5 class="card-header text-center text-secondary">{{__('Type your comment here')}}</h5>
        <div id="comments" class="my-4 mx-4">
            @forelse($ticket->comments as $comment)
                <div class="card p-3 mb-4">
                    {{$comment->content}}
                    <small>{{__('Author :')}} {{ $comment->user->name }}</small>
                    <small>Posted on {{ $comment->created_at->format('Y-m-d H:i') }}</small>
                    <!-- Check if this is the last comment -->
                    @if ($loop->last)
                        @can('delete', $comment)
                            <form action="{{ route('tickets.comments.destroy', [$ticket->id, $comment->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('{{__('Are you sure you want to delete this comment?')}}')">Delete</button>
                            </form>
                        @endcan
                    @endif
                </div>
            @empty
                {{__('No comments yet')}}
            @endforelse
        </div>
        @include('comments.create')
    </div>
</div>