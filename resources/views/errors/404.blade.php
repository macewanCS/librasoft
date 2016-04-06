@extends('layouts.app')

@section('content')

<div class="col-md-1"></div>
<div class="col-md-10">
    <div class="error-content" style="padding: 10px;">
        <div class="col-md-3">
            <img src="{{ asset("/img/cam1.jpg") }}" class="prof" style="-webkit-animation-duration: 2.1s;"/>
            <br/>
            <img src="{{ asset("/img/nick.jpg") }}" class="prof" style="-webkit-animation-duration: 0.2s;"/>
            <br/>
            <img src="{{ asset("/img/cam2.jpg") }}" class="prof" style="-webkit-animation-duration: 2.5s;"/>
        </div>
        <div class="col-md-6">
            <h1 style="text-align: center;">404 Not Found</h1>
            <div class="embed-responsive embed-responsive-4by3 video-spin">
                <iframe width="1280" height="720" src="https://www.youtube.com/embed/fRh_vgS2dFE?autoplay=1;rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
            </div>
            <h1 style="text-align: center;">This is Professional</h1>
        </div>
        <div class="col-md-3">
            <img src="{{ asset("/img/cam2.jpg") }}" class="prof" style="-webkit-animation-duration: 2.5s;"/>
            <br/>
            <img src="{{ asset("/img/indratmo.jpg") }}" class="prof" style="-webkit-animation-duration: 5s;"/>
            <br/>
            <img src="{{ asset("/img/cam1.jpg") }}" class="prof" style="-webkit-animation-duration: 2.1s;"/>
        </div>
    </div>
</div>
<div class="col-md-1"></div>

@stop
