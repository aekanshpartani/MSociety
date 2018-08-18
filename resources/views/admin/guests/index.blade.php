@extends('layouts.main')

@section('title', 'Admin | Guests')
@section('extra-css')


@stop

@section('content')

    <h1>Guests</h1>

    @if(Session::has('created_guests'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{session('created_guests')}}</strong>
        </div>
    @endif
    @if(Session::has('no_owner'))
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{session('no_owner')}}</strong>
        </div>
    @endif
    @if(Session::has('deleted_guests'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{session('deleted_guests')}}</strong>
        </div>
    @endif
    <div class="body table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Owner Name</th>
                <th>Society Name</th>
                <th>Flat No.</th>
                <th>Phone No.</th>
                <th>Status</th>
                <th>Reason</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>
            @if($guests)
                @foreach($guests as $guest)
                    <tr>
                        <td>{{$guest->name}}</td>
                        <td>{{$guest->owner->user->name}}</td>
                        <td>{{$guest->owner->society->sname}}</td>
                        <td>{{$guest->owner->flat_no}}</td>
                        <td>{{$guest->phone_no}}</td>
                        <td>{{$guest->is_approved == 1 ? 'Approved' : 'Not Approved'}}</td>
                        <td>{{$guest->reason}}</td>
                        <td>{{$guest->created_at->diffForHumans()}}</td>
                        <td>{{$guest->updated_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@stop


@section('extra-scripts')


@stop