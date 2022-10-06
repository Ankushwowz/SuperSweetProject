@extends('layouts.home.app')
@section('content')

<section class="contact-form mt-3" style="background-image: url({{url('/')}}/public/home_files/img/GP2127.jpg);">
         <div class="container">
            <div class="row">
               <div class="card  p-3 card-details">
                  <!--<div style="margin-bottom: 20px;text-align: center;">-->
                  <!--   <span class="close-buttons"> <a href="{{url('/')}}">-->
                  <!--   <i class="fa fa-times" aria-hidden="true"></i>-->
                  <!--   </a>-->
                  <!--   </span>-->
                  <!--   <a href="{{url('/')}}">-->
                        <!--<img alt="Logo" src="assets/img/sweetlogo.png" style="width: 250px;">-->
                  <!--   </a>-->
                  <!--</div>-->
                  <h2 class="text-center fw-normal">Contact Us <i class="fa-sharp fa-solid fa-paper-plane"></i></h2>
                  
                  <form action="{{url('message')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="form-row">
                     <div class="form-group col-md-12">
                        <label for="inputEmail">EMAIL <span>*</span></label>
                        <input type="email" class="form-control" id="inputEmail" name="email" value="{{ old('email', '') }}">
                        @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-row">
                     <div class="form-group col-md-12 first">
                        <label for="inputLastName">Title <span>*</span></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', '') }}">
                        @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group mt-0">
                     <label for="exampleFormControlTextarea1">MESSAGE <span>*</span></label>
                     <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message">{{ old('message', '') }}</textarea>
                      @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                      @enderror
                  </div>
                  <div class="form-button contacts-form">
                     <button type="submit" class="btn btn-primary  btn-md contacts-btn" value="Register" name="register"><span>SEND</span></button>
                  </div>

                  </form>

               </div>
            </div>
         </div>
      </section>

@endsection
