@extends('layouts.web.app')
@section('content')
    @push('style')
        <style rel="stylesheet">
            li.active{
                color: yellow;
            }
        </style>
    @endpush

    <div class="hero common-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <!--<h1>model <span> {{request()->search ? ' : ' . request()->search . ' ' : ''}}</span></h1>-->
                        <ul class="breadcumb">
                            <li class="active"><a href="/">Home</a></li>
                            <li> <span class="ion-ios-arrow-right"></span> model listing <span>({{$actors->count()}} models)</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- celebrity grid v1 section-->
    <div class="page-single">
        <div class="container">
            <div class="row ipad-width2">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <!--<div class="topbar-filter">-->
                    <!--    <p>Found <span>{{$actors->count()}} models</span> in total</p>-->
                    <!--</div>-->
                    <div class="celebrity-items">
                        @foreach($actors as $actor)
                            <div class="ceb-item col-md-3">
                                <a href="{{url('models/' . $actor->name)}}">
                                    @if(!empty($actor->avatar1))
                                    <img src="{{ URL::to('/') }}/actor_avatars/{{$actor->avatar1}}" style="height: 240px;" alt="">
                                    @else
                                    <img src="{{ URL::to('/') }}/images/dummyimage.png" alt="" style="height: 240px;" alt="">
                                    @endif
                                    </a>
                                <div class="ceb-infor">
                                    <h2><a href="{{url('models/' . $actor->name)}}">{{$actor->name}}</a> <span><span class="ion-ios-videocam"></span> {{$actor->connections}}</span></h2>
                                    
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{$actors->appends(request()->query())->links()}}
                </div>
            </div>
        </div>
    </div>
    <!--end of celebrity grid v1 section-->

@endsection