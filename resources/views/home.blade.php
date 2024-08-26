@extends('layouts.app')
@section('content')
<div class="col-md-9">
            <div class="card">
                <div class="card-header text-center text-dark">Registered Users</div>

                <div class="card-body text-center">
                       
                       <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Current Role</th>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Update User Role</th>
                                    <th scope="col">Update</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($users)>0)
                                @foreach($users as $row)
                                <tr>
                                <td scope="row">{{$row->id }}</th>
                                <td>{{$row->name}}</td> 
                                <td>{{$row->role}}</td> 
                                <td><img src="{{asset($row->avatar)}}" width="80"></td> 
                               
                                <td><select name="role" class="form-control" required="">
                                    <option value="" selected="" disabled="">Select User Role</option>
                                    @for ($role = 0; $role < count($roles); $role++)
                                         <option value="{{ $roles[$role] }}">{{$roles[$role] }}</option>
                                    @endfor
                                </select>
                                   
                                <td><a href="{{route('home.store'),$row->id}}"><button class="btn btn-primary " type="submit">Update</button></a></td>
                             
                                </tr>
                                @endforeach
                                @else
                                <p>No Users Registered Yet</p>
                                @endif
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
        @endsection