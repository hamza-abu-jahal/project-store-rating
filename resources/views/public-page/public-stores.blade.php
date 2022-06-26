<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{asset('home/images/favicon.png')}}" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
    <!-- font awesome style -->
    <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('LTE/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('LTE/dist/css/adminlte.min.css')}}">
    <!-- responsive style -->
    <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="index.html"><img width="250" src="{{asset('home/images/logo.png')}}"
                            alt="#" /></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('public.index')}}">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Categories <span
                                            class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach ($item as $items )
                                    <li><a href="{{route('public.stores.index' , ['category' => $items->id])}}">{{$items->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="product.html">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Contact</a>
                            </li>
                            <li>
                                <div class="input-group input-group-sm" style="width: 200px;">
                                    <input type="text" name="table_search" style="border-color: #f7444e "
                                        class="form-control float-right" placeholder="Search Store">
                                    <div class="input-group-append">
                                        <button type="submit" style="background-color: #f7444e; border-color: #f7444e"
                                            class="btn btn-default">
                                            <i class="fas fa-search" style="color: white"></i>
                                        </button>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </header>
       
    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Our <span>Stores</span>
                </h2>
            </div>
            <div class="row">
                @foreach ($item as $items)
                   <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{route('public.stores.info' , ['store' => $items->id ])}}" class="option1">
                                   Rating
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="{{$items->path}}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{$items->name}}
                            </h5>
                        </div>
                    </div>
                 </div>  
                @endforeach
            </div>
            <div class="btn-box" style="float: right">
            <a href="{{route('public.index')}}" class="btn1">
             Home Page
            </a>
           </div>
            {{-- {{$item->appends(request()->query())->links()}} --}}
            {{$item->appends($_GET)->links()}}
        </div>
        
    </section>
    <!-- end product section -->

    <!-- subscribe section -->

    <!-- footer end -->
    <div class="cpy_">
        <p>© 2021 All Rights Reserved By <a href="https://html.design/">Hamza</a></p>
    </div>
    <!-- jQery -->
    <script src="{{asset('home/js/jquery-3.4.1.min.js')}}"></script>
    <!-- popper js -->
    <script src="{{asset('home/js/popper.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('home/js/bootstrap.js')}}"></script>
    <!-- custom js -->
    <script src="{{asset('home/js/custom.js')}}"></script>
</body>

</html>