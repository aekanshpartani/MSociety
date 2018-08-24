@extends('layouts.main')

@section('title', 'Manager | Owners Details')

@section('extra-css')


@stop

@section('content')

<h1>Owners</h1>

<div class="body table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Flat No</th>
            <th>Phone No</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($owners)
            @foreach($owners as $owner)
                <tr>
                    <td>{{$owner->user->name}}</td>
                    <td>{{$owner->user->email}}</td>
                    <td>{{$owner->flat_no}}</td>
                    <td>{{$owner->phone_no}}</td>
                    <td>{{$owner->user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                    <td>{{$owner->created_at->diffForHumans()}}</td>
                    <td>{{$owner->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>

@stop

@section('extra-scripts')


@stop