
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card pt-0">
                    <div class="card-header text-center text-light">Tickets</div>
                    <div class="card-body text-center">
                        @if(count($categories)>0)
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Tickets Num</th>
                                    <th scope="col">Date Created</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $row)
                                    <?php $ticketCount = $row->tickets_count ?>
                                    <tr>
                                        <td>{{$row->id }}</td>
                                        <td>{{$row->title}}</td>
                                        <td>{{$ticketCount}}</td>
                                        <td>{{$row->created_at}}</td>
                                        <td><a href="{{ route('categories.edit', $row->id) }}"><button class="btn btn-primary " type="submit">Update</button></a></td>
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
                                @else
                                    <p>{{__('No Categories Yet')}}</p>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <a  href="{{ route('categories.create')}}" class="btn btn-primary m-3">{{__('Add new category')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
