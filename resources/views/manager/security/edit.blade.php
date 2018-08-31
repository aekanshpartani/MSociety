@extends('layouts.main')

@section('title', 'Manager | Edit Security')

@section('extra-css')


    <!-- Wait Me Css -->
    <link href="{{ URL::asset('bsb/plugins/waitme/waitMe.css')}}" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="{{ URL::asset('bsb/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />




@stop

@section('content')

    <div class="container-fluid">
        <div class="block-header">
            <h2>
                Edit User
            </h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Details</h2>
                    </div>
                    <div class="body">
                        {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['ManagerSecurityController@update', $user->id], 'onsubmit' => 'return ConfirmDelete()']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Name:') !!}
                            {!! Form::text('name', null, ['class'=>'form-control'])!!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Email:') !!}
                            {!! Form::email('email', null, ['class'=>'form-control'])!!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('phone_no', 'Phone No.:') !!}
                            {!! Form::text('phone_no', ( isset($security->phone_no) ? $security->phone_no : null ), array('class'=>'form-control' )) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('is_active', 'Status:') !!}
                            {!! Form::select('is_active', array(1 => 'Active', 0=> 'Not Active'), null , ['class'=>'form-control'])!!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('password', 'Password:') !!}
                            {!! Form::password('password', ['class'=>'form-control'])!!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Update Security', ['class'=>'btn btn-primary waves-effect btn-large']) !!}
                        </div>

                        {!! Form::close() !!}

                        {!! Form::open(['method' => 'DELETE', 'action' => ['ManagerSecurityController@destroy', $user->id],'onsubmit' => 'return ConfirmDelete()', 'class'=>'']) !!}

                        <div class="form-group">
                            {!! Form::submit('Delete Security', ['class' => 'btn btn-danger']) !!}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

@section('extra-scripts')
    @include('layouts.partials.confirmdelete')

    <!-- Autosize Plugin Js -->
    <script src="{{ URL::asset('bsb/plugins/autosize/autosize.js')}}"></script>

    <!-- Moment Plugin Js -->
    <script src="{{ URL::asset('bsb/plugins/momentjs/moment.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{ URL::asset('bsb/js/pages/forms/basic-form-elements.js')}}"></script>

@stop