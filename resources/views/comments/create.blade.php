
<div class="card-body">
    <form action="{{route('tickets.storeComment', $ticket->id)}}" method="post">
        @csrf
        <div class="form-group">
            <label for="content"></label>
            <textarea class="form-control" placeholder="{{__('Type your comment here...')}}" name="content" id="content" cols="10" rows="5"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-success mt-4" type="submit">{{__('Save')}}</button>
        </div>
    </form>
</div>
