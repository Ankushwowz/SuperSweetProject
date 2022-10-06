@extends('layouts.home.app')
@section('content')

       
 <div class="hero common-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                       
                        <ul class="breadcumb">
                            <li class="active"><a href="#">Home</a></li>
                            <li><span class="ion-ios-arrow-right"></span>Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="contact-cls">
 <div class="page-single-contact ">
        <!--<div class="col-md-2 col-sm-12 col-xs-12">-->
            <!--<div class="flex-parent-ft">-->
            <!--    <div class="flex-child-ft item1" style="display:block;">-->
                    <!--<a href=""><img alt="" class="logo" src="{{asset('public/web_files/images/sweetlogo.png')}}"></a>-->
            <!--    </div>-->
            <!--</div>-->
        <!--</div>-->
 
        <div class="main-contact-form">
                <div class="flex-child-ft item1">
                    <div class="blog-detail-ct">
                        <div class="comment-form">
                            <h4 class="contacts-us">Contact us <i class="ion-paper-airplane"></i></h4>
                            <form action="{{url('message')}}" method="POST" enctype="multipart/form-data">
                               @csrf
                                @error('email')
                                <span class="invalid-feedback" style="color: red; font-size: 12px" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <input name="email" placeholder="Email" type="email" value="{{ old('email', '') }}">

                                @error('title')
                                <span class="invalid-feedback" style="color: red; font-size: 12px" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <input name="title" placeholder="Title" type="text" value="{{ old('title', '') }}">

                                @error('message')
                                <span class="invalid-feedback" style="color: red; font-size: 12px" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <textarea name="message" id="" placeholder="Message" style="margin: 0px 0px 30px; resize: none">{{ old('message', '') }}</textarea>
                                
                                
                                <div class="g-recaptcha" data-sitekey="6Ld2VpwhAAAAADXfbXoPlDYdZAR7CAid_xcmKDdC"></div>
                                

                                <button class="submit-contact" type="submit"> Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
