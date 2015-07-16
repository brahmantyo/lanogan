<?php 
    //$user = Auth::user();
?>
<header class="main-header">
    <!-- Logo -->
    <?php if(Auth::user()->level!='KONSUMEN'){
        $home = '/admin';
    }else{
        $home = '/konsumenpanel';
    }
    ?>

    <a href="{{ $home }}" class="logo">LANOGAN</a>
    <span style="top:33px;left:44px;position:inherit;display:block;z-index: 100;">Intgreted Back Office</span>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li><a href="/"><i class="fa fa-home"></i> Halaman Depan</a></li>
            </ul>
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" id="user-profile" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset($user->photo) }}" class="user-image" alt="User Image"/>
                    <span class="hidden-xs">{{ $user->first_name.' '.$user->last_name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset($user->photo) }}" class="img-circle" alt="User Image" />
                            <p>
                            {{ $user->first_name.' '.$user->last_name }} - {{ $user->level }}
                            <small>Member since {{ $user->created_at->format('d F Y h:ia') }}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
<!--                         <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li> -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
<!--                             <div class="pull-left">
                                <a href="/user/{{$user->id}}" class="btn btn-default btn-flat">Profile</a>
                            </div> -->
                            <div class="pull-right">
                                <a href="/auth/logout" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>