@extends('layouts.main')

@section('title', 'Owner | Dashboard')

@section('extra-css')


@stop

@section('content')

    <div class="container-fluid">

        @if(Session::has('approved_guest'))
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>{{session('approved_guest')}}</strong>
            </div>
        @endif
        <div><h2>Guests Approvals</h2></div>
    </div>
    <div class="row clearfix">
        @if($guests)
            @foreach($guests as $guest)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header {{$guest->is_approved == 0 ? 'bg-red' : 'bg-green'}}">
                            <h2>
                                {{$guest->name}}
                            </h2>
                            <div class="pull-right">
                                @if($guest->is_approved == 0)
                                    {!!Form::open(['url' =>'/owner/approve/'.$guest->id, 'method' => 'GET'])!!}
                                    {{Form::hidden('_method', 'APPROVE')}}
                                    {{Form::submit('APPROVE', ['class' => 'btn btn-primary'])}}
                                    {!!Form::close()!!}
                                @endif
                            </div>
                        </div>
                        <div class="body">
                            <div class="row">
                                <strong>Reason: </strong>{{$guest->reason}}
                            </div>
                            <div class="row">
                                <strong>Requested At: </strong>{{$guest->created_at}}
                            </div>
                            <div class="row">
                                @if($guest->is_approved == 1)
                                    <strong>Approved At: </strong>{{$guest->updated_at}}
                                @else
                                    <strong>Waiting for Approval</strong>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>




    <div class="container-fluid">
        <div><h2>Society Notifications</h2></div>
    </div>
    <div class="row clearfix">
        @if($notifications)
            @foreach($notifications as $notification)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>
                                {{$notification->title}}
                            </h2>
                        </div>
                        <div class="body">
                            <p>
                                {{$notification->description}}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>

@stop

@section('extra-scripts')


@stop