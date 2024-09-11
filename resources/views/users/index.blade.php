@extends('layouts.app')
@section('content')

    <div class="container-dash-page">
        <div class="left-panel">
            <div class="brand">
                HelpPro
            </div>
            <div>
                <a href="#"><i class="fa-regular fa-comments"></i>Tickets</a>
            </div>
            <div>
                <a href="#"> <i class="fa-regular fa-user"></i>Customers</a>
            </div>
            <div>
                <a href="#"> <i class="fa-solid fa-user-tie"></i> Agents</a>
            </div>
            <div>
                <a href="{{ route('home') }}"> <i class="fa fa-cogs"></i> Home</a>
            </div>
        </div>
        <div class="right-panel">
            <div class="grid-item">
                <h1>Users </h1>

                <a href="{{ route('users.create') }}"><button class="new ticket-btn">new User</button></a>
            </div>
            <div class="grid-item">
                <a href="#" class="tab active" data-target="content1">Users</a>
            </div>
            <div class="content" id="content1">
                <form class="frmfilter" action="{{ route('users.index') }}" method="GET">

                    <div>
                        <div>
                            <input type="checkbox" name="role" value="agent" id="agent">
                            <label for="agent">Agent</label>
                        </div>
                        <div>
                            <input type="checkbox" name="role" value="customer" id="customer">
                            <label for="customer">Customer</label>
                        </div>
                    </div>

                    <div>
                        <button type="reset" class="ticket-btn left-zero">RESET</button>
                        <button type="submit" class="ticket-btn left-zero">SEARCH</button>
                    </div>
                </form>
                <div class="grid-item5">
                    <div class="wrapper">
                        <div class="table-contaier">
                            @if (count($users) > 0)

                <a href="{{route('users.create')}}"><button class="new ticket-btn">new User</button></a>
            </div>
            <div class="grid-item">
                <a href="#" class="tab active" data-target="content1">Users</a>
                <!--a href="#" class="tab" data-target="content2">Users</a-->
            </div>
            <div class="content" id="content1">
                <div class="grid-item5">
                    <div class="wrapper">
                        <div class="table-contaier">
                            @if(count($users)>0)

                                <table>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Date Created</th>
                                        <th>Action</th>
                                    </tr>
                                    <tbody>

                                        @foreach ($users as $row)
                                            <tr>
                                                <td scope="row">{{ $row->id }}</td>
                                                <td class="ticket-creator">{{ $row->name }}</td>
                                                <td>{{ $row->email }}</td>
                                                <td>{{ $row->role }}</td>
                                                <td>{{ $row->created_at }}</td>
                                                <td class="edit-delete-btn">
                                                    <form action="{{ route('users.edit', $row->id) }}" method="post">
                                                        @csrf
                                                        <button class="btn btn-primary" type="submit"><i
                                                                class="fa-solid fa-user-pen"></i></button>
                                                    </form>

                                                    <form action="{{ route('users.destroy', $row->id) }}" method="post"
                                                        style="display:inline;">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger" type="submit"
                                                            onclick="return confirm('{{ __('Are you sure you want to delete this row?') }}')"><i
                                                                class="fa-solid fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <div id="userList"></div>
                                        @endforeach
                                    @else
                                        <p>No Users Yet</p>
                            @endif
                            </tbody>

                                        @foreach($users as $row)
                                            <tr>
                                                <td scope="row">{{$row->id }}</td>
                                                <td class="ticket-creator">{{$row->name}}</td>
                                                <td >{{$row->email}}</td>
                                                <td>{{$row->role}}</td>
                                                <td>{{$row->created_at}}</td>
                                                <td>
                                                    <form action="{{route('users.destroy',$row->id)}}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <a href=""><button class="btn btn-primary " type="submit">Update</button></a>
                                                        <button class="btn btn-danger" onclick="return confirm('{{__('Are you sure you want to delete this row?')}}')"  type="submit">Delete</button>
                                                    </form>
                                                    <a href="{{route('users.destroy',$row->id)}}"></a>
                                                </td>
                                            </tr>
                                    @endforeach
                                @else
                                    <p>No Users Yet</p>
                            @endif
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const tabs = document.querySelectorAll('a.tab');
                    const contents = document.querySelectorAll('.content');

                    tabs.forEach(tab => {
                        tab.addEventListener('click', function(event) {
                            event.preventDefault();

                            tabs.forEach(t => t.classList.remove('active'));
                            contents.forEach(c => c.style.display = 'none');

                            this.classList.add('active');

                            const targetId = this.getAttribute('data-target');
                            document.getElementById(targetId).style.display = 'block';
                        });
                    });
                });
            </script>

        </div>
    @endsection