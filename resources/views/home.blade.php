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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
