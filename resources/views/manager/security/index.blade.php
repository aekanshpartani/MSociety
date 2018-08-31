@extends('layouts.main')

@section('title', 'Manager | Security Details')

@section('extra-css')


@stop

@section('content')

<h1>Security</h1>

<div class="body table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone No</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($securities)
            @foreach($securities as $security)
                <tr>
                    <td><a href="{{route('manager.security.edit', $security->user_id)}}">{{$security->user->name}}</td>
                    <td>{{$security->user->email}}</td>
                    <td>{{$security->phone_no}}</td>
                    <td>{{$security->user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                    <td>{{$security->created_at->diffForHumans()}}</td>
                    <td>{{$security->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>

@stop

@section('extra-scripts')


@stop