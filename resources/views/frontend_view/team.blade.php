@extends('layouts_frontend._main')

@section('content')
<section class="premium-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title">
                    <h2>Our Team</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <p>In this case the website cannot stand alone without the developer contributing fully and
                    wholeheartedly developing this website. Therefore the following are the developers who contributed
                    to building this Dryas library website.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="premium-item">
                    <img src="{{ asset('assets/img/avatar/rdp77.png') }}" alt="">
                    <h4>Moh Ravi Dwi Putra</h4>
                    <p>1461800115</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="premium-item">
                    <img src="{{ asset('assets/img/avatar/axl.jpg') }}" alt="">
                    <h4>Deny Prasetyo</h4>
                    <p>1461800028</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="premium-item">
                    <img src="{{ asset('assets/img/avatar/default.svg') }}" alt="">
                    <h4>Abdul Rozaq N</h4>
                    <p>1461800196</p>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="premium-item">
                    <img src="{{ asset('assets/img/avatar/default.svg') }}" alt="">
                    <h4>Abdurrahman Hanif</h4>
                    <p>1461800175</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="premium-item">
                    <img src="{{ asset('assets/img/avatar/default.svg') }}" alt="">
                    <h4>Ahmad Rizal M</h4>
                    <p>1461800076</p>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection