<<<<<<< HEAD
<div class="form-group">
    <div class="form-group">
        <div class="form-group">
            <label for="userName">{{ __('User name') }}</label>
            <input name="name" id="userName" type="text" value="{{ old('name', isset($user) ? $user->name : '') }}"
                class="form-control">
        </div>

        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input name="email" id="email" type="email"
                value="{{ old('email', isset($user) ? $user->email : '') }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input name="password" id="password" type="password"
                value="{{ old('password', isset($user) ? $user->password : '') }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="role">{{ __('Role') }}</label>
            <select name="role" id="role" class="form-control" required>
                <option value="" disabled>Select user role</option>
                <option value="admin" {{ old('role', isset($user) ? $user->role : '') === 'Admin' ? 'selected' : '' }}>
                    Admin</option>
                <option value="customer"
                    {{ old('role', isset($user) ? $user->role : '') === 'Customer' ? 'selected' : '' }}>Customer
                </option>
                <option value="agent" {{ old('role', isset($user) ? $user->role : '') === 'Agent' ? 'selected' : '' }}>
                    Agent</option>
            </select>
        </div>

        <div class="form-group">
            <button class="ticket-btn left-zaro" type="submit">{{ __('Save') }}</button>
        </div>
=======
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

>>>>>>> 10352d4521f7e77bb8a793ddeb7ade807033514d
