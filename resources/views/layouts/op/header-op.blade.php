<?php
$ss = App\Setting::first();
?>
<header class="main-header">
    <a href="{{ url('/operator')}}" class="logo"><img src="@if(!$ss->logo) {{ url('assets/logo/logo.png') }} @else {{ url('assets/logo/'.$ss->logo) }} @endif" style="height: 38px; display: inline-block; margin-right: 10px;"></a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">                    
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">                        
                        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image"/>
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">                        
                        <li class="user-header">
                            <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
                            <p>
                                {{ Auth::user()->name }}
                                <small>Operator</small>
                            </p>
                        </li>                    
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">                        
                                <a href="{{ url('logout') }}" >   <button type="submit" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Logout</button></a>
                            </div>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </li>
                  </ul>
              </li>
          </ul>
      </div>
  </nav>
</header>