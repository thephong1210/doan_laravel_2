<div class="container-fluid">
    @include('public.layouts.logo')
    <div class=" border border-dange col-md-9" id="sp">
        <div class="row">
            <li class="mac">
                <a  class="nav-link" href="{{route('home')}}"> Home</a>
            </li>
        @php($categories = \App\Category::all())
        @forelse($categories as $ca)
            <!-- <li id="mac">
                    <a href="{{route('home')}}"> Home</a>
                </li> -->
                <li class="mac" >
                    <a class="nav-link" href="{{ route('category', ['id' => $ca->id]) }}">{{ $ca->name }} <span class="sr-only"></span></a>
                </li>
            @empty
            @endforelse

            <li class="mac">
                <a class="nav-link" href="{{route('login')}}"> Login</a>
            </li>
            <a href="{{route('shop')}}">
                <i class="fa fa-cart-plus" style="font-size:48px;color:#ff0000"></i>
                <span>{{\Cart::count()}}</span>
            </a>
        </div>
    </div>
</div>
