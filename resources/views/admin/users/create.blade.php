@extends('layouts.main')

@section('title', 'Admin | Create Users')

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
                Create User
            </h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Add User Details</h2>
                    </div>
                    <div class="body">
                        @include('includes.form_error')
                        {!! Form::open(['method' => 'POST', 'action' => 'AdminUsersController@store', 'files'=>true]) !!}

                        <div class="form-group">
                            <div class="form-line">
                                {!! Form::label('name', 'Name:') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                {!! Form::label('email', 'Email:') !!}
                                {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'pattern' =>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('role_id', 'Role:') !!}
                            {!! Form::select('role_id',[''=> 'Choose Options']+ $roles, 0, ['class' => 'form-control','id'=>'user_role', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group" id="phone_no">
                            <div class="form-line">
                                {!! Form::label('phone_no', 'Phone No.:') !!}
                                {!! Form::text('phone_no',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="society_id">
                            <div class="form-line">
                                {!! Form::label('society_id', 'Select Society') !!}
                                {!! Form::select('society_id',$society_list,null, ['class' => 'form-control', 'placeholder'=>'Select Society']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="flat_no">
                            <div class="form-line">
                                {!! Form::label('flat_no', 'Flat No.') !!}
                                {!! Form::text('flat_no',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('status', 'Status:') !!}
                            {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), 0, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('photo_id', 'Photo') !!}
                            {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('password', 'Password') !!}
                            {!! Form::password('password', ['class' => 'form-control', 'required' => 'required', 'pattern' =>'(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

@section('extra-scripts')
    <script>
        $(document).ready(function(e) {

            $('#phone_no').hide();
            $('#society_id').hide();
            $('#flat_no').hide();
            $('#user_role').on('change',function(){

                var selection = Number($(this).val());
                switch(selection)
                {
                    case 2:
                        $("#phone_no").show();
                        $("#society_id").show();
                        $('#flat_no').hide();
                        break;
                    case 3:
                        $("#phone_no").show();
                        $("#society_id").show();
                        $("#flat_no").show();
                        break;
                    default:
                        $("#phone_no").hide();
                        $("#society_id").hide();
                        $("#flat_no").hide();
                        break;
                }
            });


        });

    </script>
    <!-- Autosize Plugin Js -->
    <script src="{{ URL::asset('bsb/plugins/autosize/autosize.js')}}"></script>

    <!-- Moment Plugin Js -->
    <script src="{{ URL::asset('bsb/plugins/momentjs/moment.js')}}"></script>


@stop