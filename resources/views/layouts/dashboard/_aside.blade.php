<?php $url= explode('/',$_SERVER['REQUEST_URI']); ?>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!--<ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" href="#"><i
                        class="zmdi zmdi-home m-r-5"></i>Films</a></li>
        <li class="nav-item">
		
		<a class="nav-link active" href="{{route('dashboard.admins.edit', auth()->guard('admin')->user())}}">
		<i class="zmdi zmdi-account-box m-r-5"></i>Profile</a>
        </li>
    </ul>-->
    <div class="tab-content">
        <div class="tab-pane stretchRight active">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info">
                            <div class="image"><a href="{{URL::to('/')}}"><img
                                            src="{{ URL::to('/') }}/public/admin_avatar/{{auth()->guard('admin')->user()->admin_avatar}}"
                                            alt="User"></a></div>
                            <div class="detail">
                                <h4>{{auth()->guard('admin')->user()->name}}</h4>
                                <!--<small>{{auth()->guard('admin')->user()->getRoles()[0]}}</small>-->
                            </div>
                        </div>
                    </li>
                    <!--<li class="header">MAIN <small>(6)</small></li>-->
                    <li class="<?php if(in_array('dashboard',$url)) { echo "active"; }?> open">
                        <a href="{{route('dashboard.home')}}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a>
                    </li>

                    @if(auth()->guard('admin')->user()->hasPermission('read_clients'))
                        <li class="<?php if(in_array('clients',$url)) { echo "active";}?>">
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-circle"></i><span>Clients</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?php if(in_array('clients',$url)) { echo "active";}?>"><a href="{{route('dashboard.clients.index')}}">All Clients</a></li>
                                <!--@if(auth()->guard('admin')->user()->hasPermission('create_clients'))-->
                                <!--    <li><a href="{{route('dashboard.clients.create')}}">Add Clients</a></li>-->
                                <!--@endif-->
                            </ul>
                        </li>
                    @endif
					
					@if(auth()->guard('admin')->user()->hasPermission('read_categories'))
                        <li class="<?php if(in_array('categories',$url)) { echo "active";}?>">
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-view-list"></i><span>Categories</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?php if(in_array('categories',$url)) { echo "active";}?>"><a href="{{route('dashboard.categories.index')}}">All Categories</a></li>
                                @if(auth()->guard('admin')->user()->hasPermission('create_categories'))
                                    <li class="<?php if(in_array('categories',$url)) { echo "active";}?>"><a href="{{route('dashboard.categories.create')}}">Add Categories</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
					
					
					@if(auth()->guard('admin')->user()->hasPermission('read_actors'))
                        <li class="<?php if(in_array('actors',$url)) { echo "active";}?>">
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-male"></i><span>Models</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?php if(in_array('actors',$url)) { echo "active";}?>"><a href="{{route('dashboard.actors.index')}}">All Models</a></li>
                                @if(auth()->guard('admin')->user()->hasPermission('create_actors'))
                                    <li class="<?php if(in_array('actors',$url)) { echo "active";}?>"><a href="{{route('dashboard.actors.create')}}">Add Models</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
					
					@if(auth()->guard('admin')->user()->hasPermission('read_films'))
                        <li class="<?php if(in_array('films',$url)) { echo "active";}?>">
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-movie"></i><span>Videos</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?php if(in_array('films',$url)) { echo "active";}?>"><a href="{{route('dashboard.films.index')}}">All Videos</a></li>
                                @if(auth()->guard('admin')->user()->hasPermission('create_films'))
                                    <li class="<?php if(in_array('films',$url)) { echo "active";}?>"><a href="{{route('dashboard.films.create')}}">Add Video</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
					
					
					
						<li class="<?php if(in_array('subscriptions',$url)) { echo "active";}?>">
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-movie"></i><span>Subscription Plan</span>
                            </a>
							 <ul class="ml-menu">
                                <li class="<?php if(in_array('subscriptions',$url)) { echo "active";}?>"><a href="{{route('dashboard.subscriptions.index')}}">Subscription Plans</a></li>
                                
                                <li class="<?php if(in_array('subscriptions',$url)) { echo "active";}?>"><a href="{{route('dashboard.subscriptions.create')}}">Add Subscription</a></li>
                                
                            </ul>
                            
                        </li>
						
						
						
						<li class="<?php if(in_array('paymentsettings',$url) || in_array('admins',$url) || in_array('sliders',$url)) { echo "active";}?>">
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-movie"></i><span>Settings</span>
                            </a>
							 <ul class="ml-menu">
                                <li class="<?php if(in_array('admins',$url)) { echo "active";}?>"><a href="{{route('dashboard.admins.edit', auth()->guard('admin')->user())}}">Profile Settings</a></li>
                                <li class="<?php if(in_array('paymentsettings',$url)) { echo "active";}?>"><a href="{{ route('dashboard.paymentsettings') }}">Payment Settings</a></li>
                                
                                <li class="<?php if(in_array('sliders',$url)) { echo "active";}?>"><a href="{{route('dashboard.sliders.index')}}">Footer Banner Settings</a></li>
                                <li class="<?php if(in_array('socials',$url)) { echo "active";}?>"><a href="{{route('dashboard.socials.index')}}">Footer Social Settings</a></li>
                                <li class="<?php if(in_array('menus',$url)) { echo "active";}?>"><a href="{{route('dashboard.menus.index')}}">Menu Settings</a></li>
                                <li class="<?php if(in_array('logos',$url)) { echo "active";}?>"><a href="{{route('dashboard.logos')}}">Upload Logo</a></li>
                                <!--<li class="<?php if(in_array('aboutus',$url)) { echo "active";}?>"><a href="{{route('dashboard.aboutus')}}">About Us</a></li>-->
                                
                            </ul>
                            
                        </li>
                        @if(auth()->guard('admin')->user()->hasPermission('read_messages'))
                        <li class="<?php if(in_array('messages',$url)) { echo "active";}?>">
                                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-email"></i><span>Messages</span>
                                </a>
                                <ul class="ml-menu">
                                    <li class="<?php if(in_array('messages',$url)) { echo "active";}?>"><a href="{{route('dashboard.messages.index')}}">All Messages</a></li>
                                </ul>
                            </li>
                        @endif
                        
                        
        <!--                <li>-->
        <!--                    <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-movie"></i><span>Pages</span>-->
        <!--                    </a>-->
							 <!--<ul class="ml-menu">-->
        <!--                        <li><a href="{{route('dashboard.subscriptions.index')}}">All Pages</a></li>-->
                                
        <!--                        <li><a href="{{route('dashboard.subscriptions.create')}}">Add Page</a></li>-->
                                
        <!--                    </ul>-->
                            
        <!--                </li>-->
					
                        
                

                    <!--  @if(auth()->guard('admin')->user()->hasPermission('read_admins'))
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Admins</span>
                            </a>
                            <ul class="ml-menu">
                                <li><a href="{{route('dashboard.admins.index')}}">All Admins</a></li>
                                @if(auth()->guard('admin')->user()->hasPermission('create_admins'))
                                    <li><a href="{{route('dashboard.admins.create')}}">Add Admins</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
					
					
					
					
					
					
					
					@if(auth()->guard('admin')->user()->hasPermission('read_clients'))
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-circle"></i><span>Clients</span>
                            </a>
                            <ul class="ml-menu">
                                <li><a href="{{route('dashboard.clients.index')}}">All Clients</a></li>
                                @if(auth()->guard('admin')->user()->hasPermission('create_clients'))
                                    <li><a href="{{route('dashboard.clients.create')}}">Add Clients</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    

                    

                    

                    <li class="header">CLIENTS INTERACTION <small>(3)</small></li>

                    @if(auth()->guard('admin')->user()->hasPermission('read_ratings'))
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-star"></i><span>Ratings</span>
                            </a>
                            <ul class="ml-menu">
                                <li><a href="{{route('dashboard.ratings.index')}}">All Ratings</a></li>
                            </ul>
                        </li>
                    @endif

                    @if(auth()->guard('admin')->user()->hasPermission('read_reviews'))
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-comment-list"></i><span>Reviews</span>
                            </a>
                            <ul class="ml-menu">
                                <li><a href="{{route('dashboard.reviews.index')}}">All Reviews</a></li>
                            </ul>
                        </li>
                    @endif

                    @if(auth()->guard('admin')->user()->hasPermission('read_messages'))
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-email"></i><span>Messages</span>
                            </a>
                            <ul class="ml-menu">
                                <li><a href="{{route('dashboard.messages.index')}}">All Messages</a></li>
                            </ul>
                        </li>
                    @endif
-->
                    <br>

                </ul>
            </div>
        </div>
    </div>
</aside>