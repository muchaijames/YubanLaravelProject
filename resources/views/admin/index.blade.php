@extends('layouts.admin')

@section('title', 'admin')

@section('content')

<div class="page-wrapper">

    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12 mt-5">
                    <div class="card" style="border-radius: 5px !important;">
                        <div class="card-header">



                            <h4 class="card-title">Welcome Back, Admin, {{ Auth::user()->name }}
                                <div class="datetime float-right" style="display: flex !important;  flex-direction:horizontal!important; padding-left: 4px !important;">
                                    <div class="date">
                                        <span id="dayname">Day</span>,
                                        <span id="month">Month</span>
                                        <span id="daynum">00</span>,
                                        <span id="year">Year</span>
                                    </div>
                                    <div class="time"><span id="hour"></span></div>
                                    <!--<div class="time">

                                        <span id="hour">00</span>:
                                        <span id="minutes">00</span>:
                                        <span id="seconds">00</span>
                                        <span id="period">AM</span>
                                    </div>-->

                                </div>

                            </h4>
                        </div>
                    </div>
                    <!-- <h3 class="page-title mt-3">Good Morning, Sub-County Director Quality Assurance, {{ Auth::user()->fullnames }}!</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>-->
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card board1 fill">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <div>
                            <h3 class="card_widget_header">{{ $driversCount }} <span style="font-size: 12px;">Drivers</span></h3>
                                <h6 class="text-muted">Yuban Drivers</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted float-right">
                                    <i class="fa fa-building" aria-hidden="true"></i>
                                </span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card board1 fill">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <div>
                                <h3 class="card_widget_header">{{ $customersCount }}<span style="font-size: 12px;">Customers</span></h3>
                                <h6 class="text-muted">Yuban Customers</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted float-right"><i class="fa fa-building" aria-hidden="true"></i></span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card board1 fill">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <div>
                                <h3 class="card_widget_header">20<span style="font-size: 12px;">Completed Rides</span></h3>
                                <h6 class="text-muted">Yuban Completed Rides</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted float-right">
                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                                </span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card board1 fill">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <div>
                                <h3 class="card_widget_header">40<span style="font-size: 12px;">Pending Rides</span></h3>
                                <h6 class="text-muted">Yuban Pending Rides</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted float-right">
                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                                </span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection