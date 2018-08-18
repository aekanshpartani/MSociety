@extends('layouts.main')

@section('title', 'Admin | Add Guest')

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
                        <h2>Add a Guest</h2>
                    </div>
                    <div class="body">
                        @include('includes.form_error')
                        {!! Form::open(['method' => 'POST', 'action' => 'AdminGuestsController@store']) !!}

                        <div class="form-group">
                            <div class="form-line">
                                {!! Form::label('name', 'Name:') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="phone_no">
                            <div class="form-line">
                                {!! Form::label('phone_no', 'Phone No.:') !!}
                                {!! Form::text('phone_no',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="society_id">
                            <div class="form-line">
                                {!! Form::label('flat_no', 'Select Flat') !!}
                                {!! Form::select('flat_no',$flats_list,null, ['class' => 'form-control', 'placeholder'=>'Select Flat']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="flat_no">
                            <div class="form-line">
                                {!! Form::label('reason', 'Reason') !!}
                                {!! Form::text('reason',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Add Guest', ['class' => 'btn btn-primary']) !!}
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