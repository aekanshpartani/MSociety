@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="block-header">
            <h2>Register Your Society Here!</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12">
                <div class="body center-align">
                        @if(Session::has('registerd_society'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>{{session('registerd_society')}}</strong>
                            </div>
                        @endif
                    {!! Form::open(['method' => 'POST', 'action' => 'AdminSocietyController@store']) !!}

                    <div class="form-group">
                    {!! Form::label('Society Name', 'Society Name') !!}
                    {!! Form::text('sname', null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group">
                    {!! Form::label('Society Address', 'Society Address') !!}
                    {!! Form::text('address', null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group">
                    {!! Form::label('Manager Email:', 'Manager Email:') !!}
                    {!! Form::text('smanager', null, ['class' => 'form-control input-lg', 'required' => 'required', 'pattern' =>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$']) !!}
                    </div>

                    <div class="form-group">
                    {!! Form::submit('Register Society', ['class' => 'btn btn-primary btn-lg']) !!}
                    </div>

                    {!! Form::close() !!}

                </div>
        </div>
    </div>
</div>
@stop
