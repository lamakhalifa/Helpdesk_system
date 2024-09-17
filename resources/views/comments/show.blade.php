<div id="commentForm">
    <div class="card pt-0" >
        <h5 class="card-header text-center text-secondary">{{__('Type your comment here')}}</h5>
        <div id="comments" class="my-2 mx-4">
            @forelse($ticket->comments as $comment)
                <div class="card p-3 mb-4 " style="height:unset !important;">
                    {{$comment->content}}
                    <small>{{__('Author :')}} {{ $comment->user->name }}</small>
                    <small>Posted on {{ $comment->created_at->format('Y-m-d H:i') }}</small>
                    <!-- Check if this is the last comment -->
                    @if ($loop->last)
                        @can('delete', $comment)
                            <form action="{{ route('comments.destroy', $comment->id)}}" method="POST" style="display:inline;text-align: end;">
                                @method('DELETE')
                                @csrf
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
