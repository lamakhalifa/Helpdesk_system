@csrf
    <div class="form-group">
        <label for="userName">{{__('User name')}}</label>
        <input class="form-control" for="userName" type="text" @isset($users) value="{{$users->name}}" @endisset></input>
    </div>
    <div class="form-group">
        <label for="email">{{__('Email')}}</label>
        <input class="form-control" for="email" type="email" @isset($users) value="{{$users->email}}" @endisset></input>
    </div>
    <div class="form-group">
        <label for="password">{{__('Password')}}</label>
        <input class="form-control" for="password" type="password" @isset($users) value="{{$users->password}}" @endisset ></input>
    </div>
    <div class="form-group">
        <label for="role">{{__('Role')}}</label>
        @isset($users) value="{{$users->role}}" @endisset
        <select name="role" class="form-control" required="">
            <option  @isset($users) @if($users->role ==="") selected="selected" @endif @endisset value="" selected="" >Select user role</option>
            <option @isset($users) @if($users->role ==="Admin") selected="selected" @endif @endisset value="Admin">Admin</option>
            <option  @isset($users) @if($users->role ==="Customer") selected="selected" @endif @endisset value="Customer">Customer</option>
            <option @isset($users) @if($users->role ==="Agent") selected="selected" @endif @endisset value="Agent">Agent</option>
        </select>
    </div>
    <div class="form-group">
        <button class="ticket-btn">{{__('Save')}}</button>
    </div>

