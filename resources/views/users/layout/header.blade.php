    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{'home'}}">
                        <!-- Logo icon -->
                         <b><img class="dark-logo" src="/images/logo.png" alt="logo" width="50" height="50"></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                         <span class="dark-logo"> Su Result</span> 
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                  <!-- Messages -->
                  <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-large"></i></a>
                      <div class="dropdown-menu animated zoomIn">
                          <ul class="mega-dropdown-menu row">

                          </ul>
                      </div>
                  </li>
                  <!-- End Messages -->
              </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0 pull-right">

                        <!-- Search -->
            
                        <!-- Comment -->
                        <li class="nav-item "> <a class="nav-link hidden-sm-down text-muted  "  href=""> Welcome {{ Auth::user()->firstname }} {{ Auth::user()->lastname}}</a> </li>
                                              <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/images/2.png" alt="user" class="profile-pic" /></a>

                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">

                                    
                                  
                                    <li><a href="{{route('profile')}}"><i class="ti-user"></i> Profile</a></li>
                                    <li><a href="{{route('profile','#settings')}}"><i class="ti-settings"></i> Setting</a></li>
                                    <li><a href="{{ route('user.logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
              
                                    
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a  href="{{ 'home'}}" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </a>        
                        </li>
                           
                               
                    
            <li class="nav-label">Apps</li>
            
            <li><a href="{{'profile' }}" aria-expanded="false"><i class="ti-user"></i><span class="hide-menu">    Profile</span></a></li>
            <li><a href="{{'wishlist'}}" aria-expanded="false"> <i class="fa fa-plus"></i><span class="hide-menu"> My Wishlist</span></a></li>
            <li><a href="{{'search'}}" aria-expanded="false"> <i class="fa fa-search"></i><span class="hide-menu"> Search</span></a></li>
            <li><a href="{{route('user.logout')}}" aria-expanded="false"><i class="fa fa-power-off"></i><span class="hide-menu"> Logout </span></a></li>
            
           
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->