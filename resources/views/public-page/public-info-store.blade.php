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


    <link href="{{ asset('preview/css.css') }}" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('home/images/favicon.png')}}" type="">
    <title>Store Information</title>
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
       
       
    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Store <span>Information</span>
                </h2>
            </div>
<div class="container" >
    
    <div class="row">
        
        <div class="col-md-12">
            @if (session()->has('messageRateing'))
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check-circle"></i>Success </h5>
                   The Store was Successfully Rated ...
                </div>
              @endif
              @if (session()->has('messageRateingUpdate'))
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check-circle"></i>Success </h5>
                   The store Rated was Successfully Updated ...
                </div>
              @endif
              
            <div class="panel panel-default">
                <div class="panel-body">






                    <form action="{{route('rates.store')}}" method="POST">  
                        @csrf             
                    <div class="card">
                        <div class="container-fliud">
                            <div class="wrapper row">
                              <div class="preview col-md-6">                                    
                                    <div class="preview-pic tab-content">
                                     <div class="tab-pane active" id="pic-1"><img src="{{$store->path}}" /></div>
                                    </div>
                                </div>
                                <div class="details col-md-6">
                                    <h3 class="product-title" style="color: #28a745">Rating & Details Store </h3>
                                    <div class="rating">
                                        <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="" data-size="xs">
                                        <input type="hidden" name="id" required="" value="{{$store->id}}">
                                        <span class="review-no">{{$store->ratings_number}} reviews</span>
                                        <br/>
                                        <button class="btn btn-success" >Submit Review</button>
                                    </div>
                                    <h4 class="price">Name : <span style="color: #f7444e">{{$store->name}}</span></h4>
                                    <h4 class="price">Category : <span style="color: #f7444e">{{$store->category->name}}</span></h4>
                                    <h4 class="price">Address : <span style="color: #f7444e">{{$store->title}}</span></h4>
                                    <h4 class="price">Mobile : <span style="color: #f7444e">{{$store->mobile}}</span></h4>
                                    <div class="action">
                                        <button class="add-to-cart btn btn-default" type="button">Add To Cart</button>
                                        <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
    <div class="action" style="float: right;">
    <a href="{{route('public.index')}}" class="add-to-cart btn btn-default" style="font-size: 13px;" type="button">Home Page</a>
    </div>
</div>



<script type="text/javascript">

    $("#input-id").rating();

</script>


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>

    <script type="text/javascript">

    $("#input-id").rating();

    </script>
</body>

</html>