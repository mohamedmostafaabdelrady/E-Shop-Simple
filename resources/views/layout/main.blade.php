<!doctype html>
<html class="no-js" lang="en" dir="ltr">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="x-ua-compatible" content="ie=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>
         @yield('title','E-shop Site')
        </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('dist/css/foundation.css')}}"/>
        <link rel="stylesheet" href="{{asset('dist/css/app.css')}}"/>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">
        <style type="text/css">
            .dropdown-item{
                color:#000 !important;
             }
        </style>

    </head>
    <body>
        <div  class="top-bar">
            <div style="color:white" class="top-bar-left">
                <h4 class="brand-title">
                    <a href="/">
                        <i class="fa fa-home fa-lg" aria-hidden="true">
                        </i>
                       My Store
                    </a>
                </h4>
            </div>
            <div class="top-bar-right">
                <ol class="menu">
                    <li class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        Categories
                      </button>
                      <div class="dropdown-menu">
                        @foreach(\App\Category::all() as $cat)
                        <a class="dropdown-item" href="/category/{{$cat->id}}/products">{{$cat->name}}</a>
                         @endforeach
                      </div>
                    </li>
                    <li>
                        <a href="{{route('home')}}">
                            Admin
                        </a>
                    </li>
                    <li>
                        <a href="{{route('cart.index')}}">
                            <i class="fa fa-shopping-cart fa-2x" aria-hidden="true">
                            </i>
                            CART
                            <span class="alert badge">
                              {{Cart::getTotalQuantity()}}
                            </span>
                        </a>
                    </li>
                </ol>
            </div>
        </div>
      <div style="min-height:500px ">
       @yield('content')
     </div>
<footer class="footer">
  <div class="row full-width">
    <div class="small-12 medium-4 large-4 columns">
      <i class="fi-laptop"></i>
      <p>Coded by Mohamed Mostafa Abdelrady</p>
    </div>
    <div class="small-12 medium-4 large-4 columns">
      <i class="fi-html5"></i>
      <p>That is an E-commerce site help users to buy their needs easily</p>
    </div>
    
    <div class="small-6 medium-4 large-4 columns">
      <h4>Follow Us</h4>
      <ul class="footer-links">
        <li><a href="https://github.com">GitHub</a></li>
        <li><a href="https://facebook.com">Facebook</a></li>
        <li><a href="https://twitter.com">Twitter</a></li>
      <ul>
    </div>
  </div>
</footer>

    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="{{asset('dist/js/app.js')}}"></script>
    </body>
</html>
