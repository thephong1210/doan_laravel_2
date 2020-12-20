@extends('public.layouts.app')
@section('content')
    <div class="container">
        <div class="cardd" style="width: 60%;">
            <div class="container-fliud" style="width: 170%;">
                <div class="wrapper row">
                    <div class="preview col-md-4">

                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1">
                                <img width="75%" src="{{asset('storage/'. str_replace('public', '', $product->image))}}" alt="">
                            </div>

                        </div>


                    </div>
                    <div class="details col-md-4">
                        <h3 class="product-title" style="font-size: 15px;">{{$product->name}}</h3>
                        <div class="rating">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                        <p class="product-description">{{$product->desc}}</p>
                        <h4 class="price">current price: <span> {{ number_format($product->price)}} vnd</span></h4>

                        <h5 class="colors">colors:
                            <span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
                            <span class="color green"></span>
                            <span class="color blue"></span>
                        </h5>
                        <div class="action">
                            <button class="add-to-cart btn btn-default" type="button"><a href="{{route('add-to-cart',['id'=>$product->id])}}">add to cart</a></button>
                            <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                        </div>
                    </div>
                    <div class="details col-md-4">
                        <div class="short__description medium bg--silver">Bảo hành phần cứng 12 tháng<br>
                            • Hỗ trợ:<br>
                            - Bảo dưỡng phần cứng<br>
                            - Cài đặt phần mềm<br>
                            - Xử lý các lỗi người dùng<br>
                            • Tặng bao da Store Thanh Danh trị giá 400k<br>
                            • Giảm giá 10 - 20% phụ kiện khi mua cùng máy<br>
                            • Tặng Voucher 200k cho lần mua máy tiếp theo<br></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
