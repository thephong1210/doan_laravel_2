@extends('public.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="items col-md-12" >
                <div class="table-responsive cart_info"  style="background-color: #FAFAFA">
                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td >Item</td>
                            <td></td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Total</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $total = 0;
                        @endphp

                        @forelse(\Cart::content() as $c)
                            @php
                                $total +=($c ->qty * $c->price)
                            @endphp
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img class="img" style="width: 100px;" src="{{asset('storage/'. str_replace('public/', '',\App\Product::find($c->id)->image))}}" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4 style="text-align: center;"><a class="name" style="margin-left: 65px;font-size: 15px;" href="">{{$c->name}}</a></h4>
                                </td>
                                <td class="cart_price">
                                    <p>{{number_format($c->price)}}VND</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <input class="cart_quantity_input" type="text" name="quantity" value="{{$c->qty}}" autocomplete="off" size="2">
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">{{number_format($c->qty * $c->price)}} VND</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="{{route('remove',['id'=>$c->rowId])}}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="total-price col-md-12" style="color: black">
                <div class="CartPrices__StyledCartPrices-yhdjkc-0 ENgjL">
                    <div class="prices" style="text-align: -webkit-right;">
                        <ul class="prices__items" style="background-color:#FAFAFA; list-style: none;">
                            <li class="prices__item">
                                    <span class="prices__text" style="font-weight: 300;
                                             color: rgb(51, 51, 51);
                                                display: inline-block;">Tổng cộng  :</span>
                                <span class="prices__value" style="">{{number_format($total)}} VND</span>
                            </li>
                            <h3 style="color: red;">Tổng tiền :{{number_format($total)}} VND </h3>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="check-out col-md-12">
                @foreach ($errors->all() as $message)
                 <li>{{$message}}</li>
                @endforeach
                <form method="post" action="{{ route('order_detail') }}">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="email">Name:</label>
                        <input type="text" class="form-control"  placeholder="Enter name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Phone:</label>
                        <input type="text" class="form-control"  placeholder="Enter phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Email:</label>
                        <input type="text" class="form-control"  placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Address:</label>
                        <input type="text" class="form-control"  placeholder="Enter address" name="address">
                    </div>
                    <div class="form-group form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember"> Remember me
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Xac nhan mua hang</button>
                </form>
            </div>
        </div>
    </div>
    </div>

@endsection
