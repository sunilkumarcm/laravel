@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(\Session::has('success'))
                        <div class="alert alert-success">
                            {{\Session::get('success')}}
                        </div>
                    @endif

                    <div class="row">
                        <a href="{{url('/create/ticket')}}" class="btn btn-success">Create Ticket</a>
                        <a href="{{url('/tickets')}}" class="btn btn-default">All Tickets</a>
                    </div>

                    <hr/>

                    <div class="row">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                  <td>ID</td>
                                  <td>Title</td>
                                  <td>Description</td>
                                  <td colspan="2">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tickets as $ticket)
                                <tr>
                                    <td>{{$ticket->id}}</td>
                                    <td>{{$ticket->title}}</td>
                                    <td>{{$ticket->description}}</td>
                                    <td><a href="{{action('TicketController@edit',$ticket->id)}}" class="btn btn-primary">Edit</a></td>
                                    <td>
                                        <form action="{{action('TicketController@destroy', $ticket->id)}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection