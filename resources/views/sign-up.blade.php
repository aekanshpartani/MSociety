@extends('layouts.examples')

@section('title', 'MySoceity - Sign Up')

@section('extra-css')

    <!-- Wait Me Css -->
    <link href="{{ URL::asset('bsb/plugins/waitme/waitMe.css')}}" rel="stylesheet" />



    <!-- Bootstrap Select Css -->
    <link href="{{ URL::asset('bsb/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

@stop

@section('content')

    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">
                <i class="material-icons md-48">home</i>My<b>Society</b></a>
            <small>Visitor Management System</small>
        </div>
        <div class="card">
            <div class="body">
                @include('includes.form_error')
                @if(Session::has('created_owner'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{session('created_owner')}}</strong>
                    </div>
                @endif
                @if(Session::has('new_owner'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{session('new_owner')}}</strong>
                    </div>
                @endif

                {!! Form::open(['method' => 'POST', 'action' => 'OwnerController@store']) !!}
                <div class="msg">Register a new membership</div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                    <div class="form-line">
                        {!! Form::text('name', null, ['class' => 'form-control', 'required', 'autofocus', 'placeholder'=>'Name Surname']) !!}
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                    <div class="form-line">
                        {!! Form::email('email', null, ['class' => 'form-control', 'required', 'autofocus', 'placeholder'=>'Email Address']) !!}
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">phone</i>
                        </span>
                    <div class="form-line">
                        {!! Form::text('phone_no', null, ['class' => 'form-control', 'required', 'autofocus', 'placeholder'=>'Mobile No.', 'pattern'=>'[6789][0-9]{9}']) !!}
                    </div>
                </div>

                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">home</i>
                        </span>
                    <div class="form-line">
                        {!! Form::select('society_id', $society_list, null, ['class' => 'form-control', 'required', 'autofocus', 'placeholder'=>'Select Society']) !!}
                    </div>
                </div>

                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">home</i>
                        </span>
                    <div class="form-line">
                        {!! Form::text('flat_no', null, ['class' => 'form-control', 'required', 'autofocus', 'placeholder'=>'Flat No.']) !!}
                    </div>
                </div>

                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line">
                        {!! Form::password('password', ['class' => 'form-control', 'required', 'placeholder'=>'Password','pattern' =>'(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}', 'minlength'=>8]) !!}

                    </div>
                    <span>Password must contain a capital letter, a number and a special character ( 8 digits minimum).</span>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line">
                        {!! Form::password('confirm_password', ['class' => 'form-control', 'required', 'placeholder'=>'Confirm Password', 'minlength'=>8]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink" required>
                    <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                </div>

                {!! Form::submit('SIGN UP', ['class' => 'btn btn-block btn-lg bg-pink waves-effect']) !!}

                {!! Form::close() !!}

                <div class="m-t-25 m-b--5 align-center">
                    <a href="{{ route('login') }}">You already have a membership?</a>
                </div>
                </form>
            </div>
        </div>
    </div>

@stop

@section('extra-scripts')
    <script>
        $(function () {
            $('body').addClass('signup-page');
        });
    </script>

    <!-- Autosize Plugin Js -->
    <script src="{{ URL::asset('bsb/plugins/autosize/autosize.js')}}"></script>

    <!-- Moment Plugin Js -->
    <script src="{{ URL::asset('bsb/plugins/momentjs/moment.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{ URL::asset('bsb/js/pages/forms/basic-form-elements.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{ URL::asset('bsb/js/pages/examples/sign-up.js')}}"></script>
@stop