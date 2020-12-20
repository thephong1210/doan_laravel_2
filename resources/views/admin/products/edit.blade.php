@extends('adminlte::page')
@section('title', 'Edit Product')
@section('content')
    <h1>Edit Product</h1>
    <h1>{{ (session('message') ? session('message') : " ") }}</h1>
    <div class="error">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <form method="post" action="{{ route('product.update', ['id'=>$products->id])}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" value="{{$products->name}}"  name="name" class="form-control"  aria-describedby="emailHelp" placeholder="ENTER NAME">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="text" value="{{$products->price}}" name="price" class="form-control" placeholder="Price">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Desc</label>
            <input type="text" value="{{$products->desc}}" name="desc" class="form-control" id="" placeholder="Desc">
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Image</label>
            <input type="file" name="image" class="form-control-file">
            <div>
                <img width="120" src="{{ asset('storage/'. str_replace('public', '', $products->image))}}" />>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">The loai san pham</label>
            <select name="categories_id" class="form-control">
            @forelse($categories as $ca)
                    <option @if($ca->id === $products->category->id) selected @else  @endif value="{{ $ca->id }}">{{ $ca->name }}</option>
                @empty
                    <option>Rong</option>
                @endforelse
            </select>
        </div>
        <button type="submit" class="btn btn-primary">UPDATE</button>
    </form>
@stop

