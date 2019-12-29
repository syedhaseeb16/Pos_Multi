<!---------Mylogin!----->

</html>
<!DOCTYPE html>
<html lang="en">

<head>



    <link rel="stylesheet" href="{{ asset('css/login.css') }}" type="text/css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>The Fashion House - Login</title>

    <link rel="shortcut icon" href="title.png">
</head>

<body style="background-image: url(log.jpg);">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <div class="row">
        <div class="col-sm-7">
            <div id="demo" class="carousel slide " data-ride="carousel" data-interval="2000">
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img1.png') }}" alt="image not found" width="1100" height="500">
                        <div class="carousel-caption">
                            <h3>Manage your work</h3>
                            <p>Anywhere, anytime, any device!</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img2.jpg') }}" width="1100" height="500">
                        <div class="carousel-caption">
                            <h3>One click summaries</h3>
                            <p>See reports, and do much more!</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img3.jpg') }}" width="1100" height="500">
                        <div class="carousel-caption">
                            <h3>Happier clients</h3>
                            <p>Generate all sale receipts in seconds!</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>

        </div>



        <div class="col-sm-5">
            <br>
            <div class="container">

                <p style="text-align: center;margin-top: 20%;font-family:Arial, Helvetica, sans-serif;
                font-size: 1.5rem;color: #3A3A3A;">
                    Login to continue</p>
                <br>

                <!----LOGIN FORM BEGINS HERE-->
                <form class="form-signin" method="post" action="{{ route('login') }}">
                    @csrf
                    <div class="form-label-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label class="text-muted" for="email">Email address</label>

                    </div>

                    <div class="form-label-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label class="text-muted" for="password">Password</label>

                    </div>
                    <br>
                    <button class="btn btn-primary" type="submit">Login</button>

                </form>
                <!---------------------------------------------------------------------->

                <br>
                <p style="text-align: center;margin-top: 20%;font-family:Arial, Helvetica, sans-serif;
                font-size: 1.5rem;color: #3A3A3A;">
                    We make your work easy!</p>

            </div>

        </div>
    </div>

</body>

</html>