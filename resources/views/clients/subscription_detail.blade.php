@extends('layouts.home.app')
@section('content')

        <div class="page-single mt-3">
        <div class="container">
            <div class="row ipad-width">
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="user-information">
                        <div style="margin: 0" class="user-img">
                            <a href="#">                                
                            @if(auth()->user()->avatar)
                            <img src="{{ URL::to('/') }}/public/client_avatars/{{auth()->user()->avatar}}" style="width: 150px; height: 150px; border-radius: 50%">&ensp;
                            @else
                            <img src="{{ URL::to('/') }}/public/images/default.png" style="width: 150px; height: 150px; border-radius: 50%">&ensp;
                            @endif
                               
                               
                                
                                <br></a>
                        </div>
                        <div class="user-fav">
                            <p>Account Details</p>
                            <ul>
                                <li class="active"><span class="prof-det">{{$user->username}}</span></li>
                                <li class="active"><span class="prof-det">{{$user->email}}</span></li>
                                <!--<li><a href="{{url('user/favorites')}}">Favorite movies</a></li>-->
                                <!--<li><a href="{{url('user/ratings')}}">Rated movies</a></li>-->
                                <!--<li><a href="{{url('user/reviews')}}">Reviewed movies</a></li>-->
                            </ul>
                        </div>
                        <div class="user-fav">
                            <p>Others</p>
                            <ul>
                                <li><a href="{{url('user/change_password/')}}">Change password</a></li>
                                <li><a href="{{url('user/subscription_detail/')}}">Subscription Detail</a></li>
                                <li><a href="{{route('logout')}}">Log out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div action="#" class="form-style-1 user-pro">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th class="text-white">Plan Name</th>
                                 <td class="text-white">{{$usersubdetail->plan_name}}</td>
                              </tr>
                              <tr>
                                 <th class="text-white">Plan Price</th>
                                 <td class="text-white">${{$usersubdetail->plan_price}}</td>
                              </tr>
                              <tr>
                                 <th class="text-white">Plan Start date</th>
                                 <td class="text-white">{{date('d-m-Y', strtotime($usersubdetail->created_at))}}</td>
                              </tr>
                              <tr>
                                 <th class="text-white">Status</th>
                                 <td class="text-white">{{$usersubdetail->status}}</td>
                              </tr>
                              <tr>
                                 <th class="text-white">Action</th>
                                 @if($usersubdetail->status == 'canceled')
                                 <td><a href="{{url('user/activesubscription')}}/{{base64_encode($usersubdetail->subscription_id)}}">Active Subscription</a></td>
                                 <!--<td>Cancelled Subscription</td>-->
                                 @else
                                 <td><a href="{{url('user/cancelsubscription')}}/{{base64_encode($usersubdetail->subscription_id)}}">Cancel Subscription</a></td>
                                 @endif
                              </tr>
                           </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection