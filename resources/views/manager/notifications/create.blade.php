@extends('layouts.main')

@section('title', 'Add Notifications')

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
                Add Notification
            </h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Details</h2>
                    </div>
                    <div class="body">
                        @include('includes.form_error')
                        {!! Form::open(['method' => 'POST', 'action' => 'SocietyNotificationsController@store']) !!}

                        <div class="form-group">
                            <div class="form-line">
                                {!! Form::label('title', 'Title:') !!}
                                {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                {!! Form::label('description', 'Description:') !!}
                                {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required', 'max:255']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Add Notification', ['class' => 'btn btn-primary']) !!}
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


@stop