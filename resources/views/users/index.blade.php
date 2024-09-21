@extends('layouts.app')
@section('content')

<div class="container-dash-page">
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
                    {{-- <input type="reset" value="Reset" class="ticket-btn left-zero" onclick="resetFilters()" /> --}}
                    <button type="reset" class="ticket-btn left-zero" onclick="resetFilters()">RESET</button>
                    <button type="submit" class="ticket-btn left-zero">SEARCH</button>
                </div>
            </form>
        </div>
        <div class="grid-item5">
            <div class="wrapper">
                <div class="content" id="content1">
                    <div class="grid-item5">
                        <div class="wrapper">
                            <div class="table-contaier">
                                @if (count($users) > 0)
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
                                                                <form action="{{ route('users.edit', $row->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <button class="btn btn-primary" type="submit">update</button>
                                                                </form>

                                                                <form action="{{ route('users.destroy', $row->id) }}"
                                                                    method="post" style="display:inline;">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-danger" type="submit"
                                                                        onclick="return confirm('{{ __('Are you sure you want to delete this row?') }}')">delete</button>
                                                                </form>
                                                            </td>
                                                        </tr>

                                                        <div id="userList"></div>
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
            </div>
        </div>
    </div>
</div>

<script>
    function resetFilters() {
        window.location.href = "{{ route('users.index') }}";
    }
</script>


@endsection
