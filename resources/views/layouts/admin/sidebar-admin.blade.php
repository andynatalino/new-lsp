<?php
$ss = App\Setting::first();
?>
<aside class="main-sidebar">
    <section class="sidebar">        
        <div class="user-panel">
            <div class="pull-left">                                
                @if($ss->color_admin == 'skin-red-light') 
                <h4>{{ Auth::user()->name }}</h4>
                @elseif($ss->color_admin == 'skin-blue-light') 
                <h4>{{ Auth::user()->name }}</h4>
                @elseif($ss->color_admin == 'skin-yellow-light')
                <h4>{{ Auth::user()->name }}</h4>
                @elseif($ss->color_admin == 'skin-green-light')
                <h4>{{ Auth::user()->name }}</h4>
                @elseif($ss->color_admin == 'skin-purple-light')
                <h4>{{ Auth::user()->name }}</h4>
                @elseif($ss->color_admin == 'skin-black-light')
                <h4>{{ Auth::user()->name }}</h4>
                @else
                <h4 style="color: white;">{{ Auth::user()->name }}</h4>
                @endif
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>    
        </div>
        <ul class="sidebar-menu">
         <li class="active"><a href="{{ url('admin') }}"><i class="fa fa-circle-o"></i>Dashboard</a></li>
         <li><a href="{{ url('admin/user') }}"><i class="fa fa-user-circle"></i>Users</a></li>
         <li><a href="{{ url('admin/galeri') }}"><i class="fa fa-picture-o"></i>Galeri</a></li>
         <li><a href="{{ url('admin/kontak') }}"><i class="fa fa-address-book"></i>Kontak</a></li>
         <li><a href="{{ url('admin/tentang') }}"><i class="fa fa-newspaper-o"></i>Tentang</a></li>
         <li><a href="{{ url('admin/tentang') }}"><i class="fa fa-newspaper-o"></i>Footer</a></li>
         <li><a href="#"><i class="fa fa-file-pdf-o"></i>Laporan</a></li>
         <li><a href="{{ url('admin/settings') }}"><i class="fa fa-cog"></i>Settings</a></li>
         <li class="treeview">
            <a href="#"><span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="#">Link in level 2</a></li>
                <li><a href="#">Link in level 2</a></li>
            </ul>
        </li>
    </ul>
</section>
</aside>