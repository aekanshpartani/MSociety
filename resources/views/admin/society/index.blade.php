@extends('layouts.main')

@section('title', 'Admin | Societies')
@section('extra-css')

    <!-- JQuery DataTable Css -->
    <link href="{{ URL::asset('bsb/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet" />


@stop

@section('content')

    <h1>Societies</h1>

    @if(Session::has('edited_society'))
    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{session('edited_society')}}</strong>
    </div>
    @endif
    @if(Session::has('deleted_society'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{session('deleted_society')}}</strong>
        </div>
    @endif
    <div class="body table-responsive">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Manager Email</th>
                    <th>Status</th>
                    <th>Address</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
                </thead>
                <tbody>
                @if($societies)
                    @foreach($societies as $society)
                        <tr>
                            <td>{{$society->id}}</td>
                            <td><a href="{{route('admin.society.edit', $society->id)}}">{{$society->sname}}</a></td>
                            <td>{{$society->smanager}}</td>
                            <td>{{$society->is_approved == 1 ? 'Approved' : 'Not Approved'}}</td>
                            <td>{{$society->address}}</td>
                            <td>{{$society->created_at->diffForHumans()}}</td>
                            <td>{{$society->updated_at->diffForHumans()}}</td>
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
