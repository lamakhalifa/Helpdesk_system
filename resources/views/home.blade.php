@extends('layouts.app')
@section('content')
<div class="col-md-9" dir ="rtl">
            <div class="card">
                <div class="card-header text-center text-light">مستخدمين النظام</div>

                <div class="card-body text-center">
                       
                       <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">اسم المستخدم</th>
                                    <th scope="col">الدور</th>
                                    <th scope="col">صورة المستخدم</th>
                                    <th scope="col">دور المستخدم</th>
                                    <th scope="col">تعديل</th>
                                    
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
                                    <option value="" selected="" disabled="">اختر دور المستخدم</option>
                                    @for ($role = 0; $role < count($roles); $role++)
                                         <option value="{{ $roles[$role] }}">{{$roles[$role] }}</option>
                                    @endfor
                                </select>
                                   
                                <td><a href="{{route('home.store'),$row->id}}"><button class="btn btn-primary " type="submit">تعديل</button></a></td>
                             
                                </tr>
                                @endforeach
                                @else
                                <p>لا يوجد مستخدمين</p>
                                @endif
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
        @endsection