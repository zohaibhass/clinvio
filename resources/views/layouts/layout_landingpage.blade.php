<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/css/styles.css">

    <title>@yield('title')</title>
</head>

<body>


    <div  style="min-height: 100vh; display: flex; flex-direction: column; justify-content: space-between">
        <div>
            <nav id='header' class="navbar navbar-expand-lg  ">
               <a href="{{route('home')}}"><img style="height: 50px; width:50px;" src="{{asset('images/clinvio2-03.png')}}" alt=""></a> 
                <a class="navbar-brand col-lg-4 col-md-12 text-light" href="{{route('home')}}">Clinvio</a>
                <button class="navbar-toggler" style="background-color: white" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fa-solid fa-bars" style="color:black;"></i></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center " id="navbarNav">
                    <ul class="navbar-nav ml-auto  ">
                        <li class="nav-item active">
                            <a class="nav-link text-light" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{route('cnic_phone')}}">My Appointments</a>
                        </li>
                    </ul>
                </div>
                <div class="mx-2"> 
                    <a href="{{route('reg_dept')}}" class="signup-button">Sign Up</a>
                </div>
                <!-- Add the search field -->
                <form class="form-inline my-2 my-lg-0 ml-auto" action="{{ route('search.doctors') }}" method="GET">
                    <div class="input-group">
                        <input style="height: 50px" class="form-control" name="search" type="search" placeholder="Search" aria-label="Search">
                        <button class="buttons signup-button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                          </svg>  </button>
                    </div>
                </form>
            </nav>


            <!-- body  content -->


            <main>
                @yield('content')
            </main>

        </div>



        <div style="background-color: #FC6600">    
            <div class="container">
            <footer class="py-5">
              <div class="row">
                <div class="col-2">

              </div>
          
              <div class="d-flex justify-content-between py-4 my-4 border-top">
                <p>© 2023 Clinvio. All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                  <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
                  <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
                  <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
                </ul>
              </div>
            </footer>
          </div>
    </div></div>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>
