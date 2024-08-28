@extends('layouts.app')

@section('content')

<div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header bg-success text-center">Ticket</div>

                 <div class="card-body text-left">
                     <div class="row">
                        <div class="col-md-6">
                             <p><h3> <strong style="color: seagreen ; font-size: 22px  ">Ticket Category</strong>{{ $cat->title }}</h3></p>

                             <p>
                             <h3> <strong style="color: seagreen ; font-size: 22px "> Title
                                 </strong>{{ $ticket->title }}</h3>
                             </p>

                             <p>
                             <h3> <strong style="color: seagreen ; font-size: 22px  ">Customer
                                 </strong> {{ $ticket->customer }}$</h3>
                             </p>
                             <p>
                             <h3> <strong style="color: seagreen ; font-size: 22px  "> Assignee Agent</p>
                                     <p></strong>{{ $ticket->agent }}</h3>
                             </p>

                         </div>


                     </div>
                 </div>
             </div>
         </div>

</div>
 </div>



 <style>

     .card-header {

         color: #fff;
         font-size: 22px;
     }

 </style>


@endsection
