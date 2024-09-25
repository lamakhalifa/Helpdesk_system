
@extends('layouts.app')
@section('content')
    <div class="container-dash-page">
        <div class="right-panel">
            <div class="grid-item">
                <h1>Categories </h1>
                <a href="{{route('categories.create')}}"><button class="ticket-btn">{{__('Create new category')}}</button></a>
            </div>
            <div class="grid-item">
                <a href="#" class="tab active" data-target="content1">Categories</a>
            </div>
                <div class="grid-item5">
                    <div class="wrapper">
                        <div class="content" id="content1">
                            <div class="grid-item5">
                                <div class="table-container">
                                    @if(count($categories)>0)
                                        <table>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Tickets Num</th>
                                                <th scope="col">Date Created</th>
                                                <th scope="col">Edit</th>
                                                <th scope="col">Delete</th>
                                            </tr>
                                            <tbody>
                                                @foreach($categories as $row)
                                                        <?php $ticketCount = $row->tickets_count ?>
                                                    <tr>
                                                        <td>{{$row->id }}</td>
                                                        <td>{{$row->title}}</td>
                                                        <td>{{$ticketCount}}</td>
                                                        <td>{{$row->created_at}}</td>
                                                        <td>
                                                            <a href="{{ route('categories.edit', $row->id) }}"><button class="btn btn-primary " type="submit">Update</button></a></td>
                                                        <td>
                                                            <form action="{{route('categories.destroy',$row->id)}}" method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn btn-danger" onclick="return confirm('{{__('Are you sure you want to delete this category?')}}')"  type="submit">Delete</button>
                                                            </form>
                                                            <a href="{{route('categories.destroy',$row->id)}}"></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @else
                                            <p>{{__('No Categories Yet')}}</p>
                                    @endif
                            </div>
                        </div>
                     </div>
                 </div>
            </div>
        </div>
    </div>
@endsection
