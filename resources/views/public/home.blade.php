@extends('public.layouts.app')
@section('content')
    <div class="slide">
        <div class="container-fluid">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="img/biastd.jpg" alt="First slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div> <!-- slide -->


    <div class="container-fluid">
        <a href="https://www.facebook.com/">
            <div class="sologan" style="text-align: center; background: #f0f0f2;">
                <h1 style="font-family: fantasy;">Back To School <br> Buy a Mac or iPad for college. Get AirPods.</h1>
            </div>
            <div class="video_data" style="margin-top: -10px;" >
                <video width="100%" autoplay loop>
                    <source
                        src="img/video_back_to_school.mp4" type="video/mp4">

                </video>
            </div>
        </a>
    </div>


    <div class="grid-container container" style="grid-gap: 20px 20px ">
        <div class="grid-item" >
            <h1>iPhone</h1>
            <h2><a href=""> Lear more > Buy > </a></h2>
            <img id="img_2" src="img/wwdc_ipv_tn.png" alt="">
        </div>
        <div class="grid-item">
            <h1>Macbook</h1>
            <h2><a href=""> Lear more > Buy > </a></h2>
            <img id="img_2" src="img/wwdc_mac_tn.png" alt="">

        </div>
        <!-- <div class="grid-item">3</div>   -->
        <div class="grid-item">
            <h1>iPad</h1>
            <h2><a href=""> Lear more > Buy > </a></h2>
            <img id="img_2" src="img/wwdc-ipad_tn.png" alt="">

        </div>
        <div class="grid-item">
            <h1>Watch</h1>
            <h2><a href=""> Lear more > Buy > </a></h2>
            <img id="img_2" src="img/watchos7-tn.png" alt="">
        </div>
    </div>

    <div class="container-fluid">
        @foreach($category as $ct)
            <h2 class="w3-animate-left title_under h3 brand-font" id="h3" style="animation: animateleft 15.0s">
                {{$ct->name}}
                    </h2>

    </div> <!-- container -->

    <div class="container-fluid">
        <div class="row pr">

            @forelse($ct->products as $pr)
                <div class="col-md-3">
                    <div class="card">
                        <a href="{{ route('product.detail', ['id' => $pr->id]) }}">
                            <img width=75% class="pic-1" src="{{asset('storage/'. str_replace('public', '', $pr->image))}}">
                        </a>
                        <div class="products-name">
                            <h4><a href="{{ route('product.detail', ['id' => $pr->id]) }}">{{ $pr->name }}</a></h4>
                        </div>
                        <div class="red t--c h5 font__brand strong"> <span>{{ number_format($pr->price) }} vnd</span></div>
                        <p>
                            <button><a href="{{route('add-to-cart',['id'=>$pr->id])}}"> Add to Cart </a></button>
                        </p>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
        @endforeach

        <center>
            {{$category->links()}}
        </center>
    </div>

    <div class="container">
        <h2 class="w3-animate-left title_under h3 brand-font" id="h3" style="animation:  my-fancy-animation 5s 1;">
            RẤT NHIỀU NGUỜI ĐÃ TIN TƯỞNG STORE THANH DANH, CÒN BẠN THÌ SAO ?
        </h2>
        <div class="container " style="display: block; margin-left: auto; margin-right: auto;">
            <!-- Photo Grid -->
            <div class="row">
                <div class="column">
                    <img src="img/done2.jpg" style="width:100%">
                    <img src="img/done3.jpg" style="width:100%">
                    <img src="img/done_13.jpg" style="width:100%">

                </div>
                <div class="column">
                    <img src="img/done-15.jpg" style="width:100%">
                    <img src="img/done_5.jpg" style="width:100%">
                    <img src="img/done_x.png" style=" width:83%">
                </div>
                <div class="column">
                    <img src="img/done_11.jpg" style="width:100%">
                    <img src="img/done_6.jpg" style="width:100%">
                    <img src="img/done_8.jpg" style="width:100%">
                </div>
                <div class="column">
                    <img src="img/done_13.jpg" style="width:100%">
                    <img src="img/done_9.jpg" style="width:100%">
                    <img src="img/done_10.jpg" style="width:100%">
                </div>
            </div>
        </div> <!-- photo_gird -->

    </div> <!-- container -->
@endsection





