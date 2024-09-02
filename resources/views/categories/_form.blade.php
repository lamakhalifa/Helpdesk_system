@csrf
    <div class="form-group">
        <label for="categoryName">{{__('Category name')}}</label>
        <input class="form-control" for="categoryName"  name="title" type="text" @isset($categories) value="{{$categories->title}}" @endisset></input>
    </div>
    <div class="form-group my-3">
        <button class="ticket-btn">{{__('Save')}}</button>
    </div>

