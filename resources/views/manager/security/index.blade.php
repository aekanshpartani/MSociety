@extends('layouts.main')

@section('title', 'Manager | Security Details')

@section('extra-css')

    <!-- JQuery DataTable Css -->
    <link href="{{ URL::asset('bsb/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet" />



@stop

@section('content')

<h1>Security</h1>

<div class="body table-responsive">
    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
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

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ URL::asset('bsb/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{ URL::asset('bsb/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{ URL::asset('bsb/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{ URL::asset('bsb/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{ URL::asset('bsb/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{ URL::asset('bsb/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{ URL::asset('bsb/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{ URL::asset('bsb/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{ URL::asset('bsb/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{ URL::asset('bsb/js/pages/tables/jquery-datatable.js')}}"></script>


@stop