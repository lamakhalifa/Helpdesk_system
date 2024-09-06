@csrf
    <div class="form-group">
        <label for="categoryName">{{__('Category name')}}</label>
        <input class="form-control" id="categoryName"  name="title" type="text" @isset($category) value="{{$category->title}}" @endisset>
    </div>
    <div class="form-group my-3">
        <button class="ticket-btn">{{__('Save')}}</button>
    </div>

