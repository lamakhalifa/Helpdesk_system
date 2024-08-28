@extends('layouts.app')
@section('content')
    <link href="{{ asset('css/dash.css') }}" rel="stylesheet">
    <script src="{{ asset('js/chart-area-demo.js') }}" defer></script>
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
                <h1>Tickets </h1>
                <a href="{{route('tickets.create')}}"><button class="new ticket-btn">new Ticket</button></a>
            </div>
            <div class="grid-item">
                <a href="#" class="tab active" data-target="content1">Ticket</a>
                <!--a href="#" class="tab" data-target="content2">Scheduled Ticket</a-->
            </div>
            <div class="content" id="content1">
                <!--div class="grid-item3">
                    <input type="checkbox" name="all-selected" id="all-selected">
                    <div>
                        <a href="http://">Delete</a>
                    </div>
                    <div>
                        <a href="http://">Set status</a>
                    </div>
                    <div>
                        <a href="http://">Set priority</a>
                    </div>
                </div-->
                <div class="grid-item5">
                    <div class="wrapper">
                        <div class="table-contaier">
                            <table>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Customer Name</th>
                                    <th>Agent Name</th>
                                    <th>Date Created</th>
                                    <th>Action</th>
                                </tr>
                                <tbody>
                                @if(count($tickets)>0)
                                    @foreach($tickets as $row)
                                        <tr>
                                            <td scope="row">{{$row->id }}</th>
                                            <td>{{$row->title}}</td>
                                            <td class="ticket-creator">{{$row->customer_id}}</td>
                                            <td>{{$row->category_id}}</td>
                                            <td>{{$row->created_at}}</td>
                                            <td>
                                                <form action="{{route('tickets.destroy',$row->id)}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a href=""><button class="btn btn-primary " type="submit">Update</button></a>
                                                    <button class="btn btn-danger" onclick="return confirm('{{__('Are you sure you want to delete this row?')}}')"  type="submit">Delete</button>
                                                </form>
                                                <a href="{{route('tickets.destroy',$row->id)}}"></a>
                                            </td>
                                        </tr>
                                        </tr>
                                    @endforeach
                                @else
                                    <p>No Tickets Yet</p>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content" id="content2" style="display: none">
                <div class="grid-item">
                    <div class="Dashboard-header">
                        <h1 class="h3 mb-0 text-gray-800 Dashboard-header">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ticket-btn"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold title-color text-uppercase mb-1">
                                            Open Tickets</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-circle-notch"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold title-color text-uppercase mb-1">
                                            Closed Tickets</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-check-to-slot"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold title-color text-uppercase mb-1">
                                            Pending Tickets</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-regular fa-hourglass-half"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold title-color text-uppercase mb-1">
                                            New Tickets Today</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-calendar-day"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wrapper">
                    <div class="table-contaier">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">NAME</th>
                                <th scope="col">RESPON</th>
                                <th scope="col">RESULOSI</th>
                                <th scope="col">PERINGATAN</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Critical</td>
                                <td>4</td>
                                <td>2</td>
                                <td>8</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>High</td>
                                <td>2</td>
                                <td>24</td>
                                <td>9</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Medium</td>
                                <td>3</td>
                                <td>48</td>
                                <td>40</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
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
