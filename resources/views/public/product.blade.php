@extends ('public.layouts.app')
@section('content')
    @include('public.layouts.slider')

    <h1 style='text-align:center;margin-bottom:20px; padding-top:15px;'><strong> {{ $category->name }}</strong></h1>
<div class="container">
<div class="row">
        @forelse($products as $p)
                        <div class="col-md-3">
                <div class="card">
                    <a href="{{ route('product.detail', ['id' => $p->id]) }}">
                            <img width="75%" class="pic-1" src="{{asset('storage/'. str_replace('public', '', $p->image))}}">
                    </a>
                    <div class="products-name">
	                    <h4 ><a href="{{ route('product.detail', ['id' => $p->id]) }}" >{{ $p->name }}</a></h4>
                    </div>
                    <div class="red t--c h5 font__brand strong"> <span>{{ number_format($p->price) }} vnd</span></div>
                    <div class="add-to-cartt">
                        <button><a href="{{route('add-to-cart',['id'=>$p->id])}}"> Add to Cart </a></button>
                    </div>

                </div>
            </div>

                @empty
                <h1>No data</h1>
     @endforelse
    </div>
</div>
@endsection






