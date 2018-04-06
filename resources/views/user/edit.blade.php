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
                        <form method="post" action="{{action('TicketController@update', $id)}}" >
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="PUT" />
                            <div class="form-group">
                                <input type="hidden" value="{{csrf_token()}}" name="_token" />
                                <label for="title">Ticket Title:</label>
                                <input type="text" class="form-control" name="title" value={{$ticket->title}} />
                            </div>
                            <div class="form-group">
                                <label for="description">Ticket Description:</label>
                                <textarea cols="5" rows="5" class="form-control" name="description">{{$ticket->description}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection