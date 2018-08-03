@extends('layouts.main')

@section('title', 'Admin | Edit Users')

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
                        {!! Form::model($society, ['method' => 'PATCH', 'action' => ['AdminSocietyController@update', $society->id]]) !!}

                        <div class="form-group">
                            {!! Form::label('Society Name', 'Society Name') !!}
                            {!! Form::text('sname', null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Society Address', 'Society Address') !!}
                            {!! Form::text('address', null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('is_approved', 'Status:') !!}
                            {!! Form::select('is_approved', array(1 => 'Approved', 0=> 'Not Approved'), null , ['class'=>'form-control'])!!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Manager Email:', 'Manager Email:') !!}
                            {!! Form::text('smanager', null, ['class' => 'form-control input-lg', 'required' => 'required', 'pattern' =>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Update Society', ['class' => 'btn btn-primary waves-effect btn-large']) !!}
                        </div>

                        {!! Form::close() !!}


                        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminSocietyController@destroy', $society->id], 'class'=>'']) !!}

                        <div class="form-group">
                            {!! Form::submit('Delete Society', ['class' => 'btn btn-danger']) !!}
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

@section('extra-scripts')

    <!-- Autosize Plugin Js -->
    <script src="{{ URL::asset('bsb/plugins/autosize/autosize.js')}}"></script>

    <!-- Moment Plugin Js -->
    <script src="{{ URL::asset('bsb/plugins/momentjs/moment.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{ URL::asset('bsb/js/pages/forms/basic-form-elements.js')}}"></script>

@stop
