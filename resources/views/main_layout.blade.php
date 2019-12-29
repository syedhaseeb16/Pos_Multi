<!DOCTYPE html>
<html lang="en">

<head>
    @section('header')
    <link rel="stylesheet" href="{{ asset('css/main_layout.css') }}" type="text/css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>The Fashion House - @yield('title')</title>
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="shortcut icon" href="title.png">
    @show
</head>

<body style="background: url('main_bg.jpg') no-repeat center center fixed;
-webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!------------------------------------MENU BAR--------------------------->
    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper" style="background-color:#343957">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#">Menu</a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>General</span>
                        </li>
                        <li class="sidebar">
                            <a href="/">
                                <i class="fa fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>

                        </li>
                        <li class="header-menu">
                            <span>View</span>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-shopping-bag"></i>
                                <span>Boutique</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="/boutique/add/purchase">Add Purchases</a>
                                    </li>
                                    <li>
                                        <a href="/boutique/add/products">Add Products</a>
                                    </li>
                                    <li>
                                        <a href="/boutique/view/products">View Products</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-dumbbell"></i>
                                <span>Gym</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="/gym/add/member">Add Member</a>
                                    </li>
                                    <li>
                                        <a href="/gym/view/member">View Member</a>
                                    </li>
                                    <li>
                                        <a href="/gym/notify/members">Notify Member</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-hotel"></i>
                                <span>Parlor</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="/parlor/add/appointment">Add Apointment</a>
                                    </li>
                                    <li>
                                        <a href="/parlor/view/bookings">View Bookings</a>
                                    </li>
                                </ul>
                            </div>
                        <li class="header-menu">
                            <span>Extra</span>
                        </li>
                        <li>
                            <a href="#creditsModal" data-toggle="modal" data-target="#creditsModal">
                                <i class="fas fa-allergies"></i>
                                <span>Credits</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fas fa-cross"></i>
                                <span>Logout</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                <!-- sidebar-menu  -->
            </div>

        </nav>
        <!-- sidebar-wrapper  -->




        <!----------------------------------MENU BAR ENDED----------------------------------------------->


        <!-----------------------MAIN PAGE CONTENT-->
        <main class="page-content">
            <div class="container-fluid">
                <h2>The Fashion House - @yield('page_description')</h2>
                <hr>
                @section('dashboard_content')

                @show
            </div>

        </main>

        <!------------Main Page-->
    </div>

    <!-- The Modal -->
  <div class="modal fade" id="creditsModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header bg-info darken-3 ">
          <h4 class="modal-title" style="color:white"><strong>Scripting Language - Project Credits<strong></h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>

        <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

          <!-- Accordion card -->
          <div class="card"style="">

            <!-- Card header -->
            <div class="card-header" role="tab" id="headingOne1">
              <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                <h5 class="mb-0">
                  Made By <i class="fas fa-angle-down rotate-icon"></i>
                </h5>
              </a>
            </div>

            <!-- Card body -->
            <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
              <div class="card-body">
                <strong> 1- Jumshaid Khan (FA17-BSE-004) </strong> <img src="jumshaid.jpg" class="rounded-circle" alt="jumshaid" width="100" height="100">
                <hr>
                <strong>2- Syeda Shane Zahra (FA17-BSE-043)</strong> <img src="shane.jpg" class="rounded-circle" alt="shane" width="100" height="100">
              </div>


            </div>
            <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
              <!-- Accordion card -->
              <div class="card">

                <!-- Card header -->
                <div class="card-header" role="tab" id="headingTwo2">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                    <h5 class="mb-0">
                      Special Thanks To <i class="fas fa-angle-down rotate-icon"></i>
                    </h5>
                  </a>
                </div>

                <!-- Card body -->
                <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2" data-parent="#accordionEx">
                  <div class="card-body">
                    <strong>1- Mr. Syed Haseeb </strong> <img src="haseeb.jpg" class="rounded-circle" alt="haseeb" width="100" height="100">
                    <hr>
                    <strong>2- Mr. Kashif </strong> <img src="kashif.jpg" class="rounded-circle" alt="kashif" width="100" height="100">
                  </div>
                </div>
              </div>
            </div>


            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>

      <!-- page-wrapper -->

    <!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/main_layout.js') }}"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    @yield('scriptFiles')



</body>






</html>

<!----
<h5 class="text-center" style="font-family: Poppins, sans-serif;font-weight: bold;">
                        <small style="font-family: Poppins, sans-serif;font-weight: bold;">Visited</small>
                        24
                    </h5>