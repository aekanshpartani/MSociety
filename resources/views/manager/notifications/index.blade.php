@extends('layouts.main')

@section('title', 'Notifications')

@section('extra-css')


@stop

@section('content')

    <div class="body table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>
            @if($notifications)
                @foreach($notifications as $notification)
                    <tr>
                        <td>{{$notification->title}}</td>
                        <td>{{$notification->description}}</td>
                        <td>{{$notification->created_at->diffForHumans()}}</td>
                        <td>{{$notification->updated_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

@stop

@section('extra-scripts')


@stop