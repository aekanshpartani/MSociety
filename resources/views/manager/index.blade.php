@extends('layouts.main')

@section('title', 'Manager | Dashboard')

@section('extra-css')


@stop

@section('content')

<h2>Welcome! {{$society_name}}.</h2>

    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box-4">
                <div class="icon">
                    <i class="material-icons col-teal">face</i>
                </div>
                <div class="content">
                    <div class="text">Total Owners</div>
                    <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">{{$total_owners}}</div>
                </div>
            </div>
        </div>



        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box-4">
                <div class="icon">
                    <i class="material-icons col-teal">face</i>
                </div>
                <div class="content">
                    <div class="text">Total Guests</div>
                    <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">{{$total_guests}}</div>
                </div>
            </div>
        </div>


        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box-4">
                <div class="icon">
                    <i class="material-icons col-teal">face</i>
                </div>
                <div class="content">
                    <div class="text">Total Vehicles</div>
                    <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">125</div>
                </div>
            </div>
        </div>



        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box-4">
                <div class="icon">
                    <i class="material-icons col-teal">face</i>
                </div>
                <div class="content">
                    <div class="text">Total Workers</div>
                    <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">125</div>
                </div>
            </div>
        </div>

    </div>


@stop

@section('extra-scripts')


@stop