@csrf
<div class="card-body text-left">
    <div class="form-group">
        <label for="categoryName">{{__('Category name')}}</label>
        <input class="form-control" id="categoryName"  name="title" type="text" @isset($category) value="{{$category->title}}" @endisset>
    </div>
    <div class="form-group my-3 text-center">
        <button class="btn btn-primary " type="submit">{{__('Save')}}</button>
        <a href="{{route('categories.index')}}" class="btn btn-primary mx-1" >{{__('Cancel')}}</a>
    </div>
</div>

