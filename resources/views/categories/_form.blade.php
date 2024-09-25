@csrf

<div class="form-group">
    <label for="categoryName">{{__('Category name')}}</label>
    <input class="form-control" id="categoryName"  name="title" type="text" @isset($category) value="{{$category->title}}" @endisset>
</div>
<div class="form-group my-3">
    <button class="ticket-btn left-42" type="submit">{{__('Save')}}</button>
    <a href="{{route('categories.index')}}" class="ticket-btn left-42 mx-1" >{{__('Cancel')}}</a>
</div>


