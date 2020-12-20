@extends('adminlte::page')
@section('title', 'Tao san pham moi')
@section('content')
    <h1>Tao san pham moi</h1>
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

    <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" value="{{ old('name') }}" name="name" class="form-control"  aria-describedby="emailHelp" placeholder="ENTER NAME">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="number" value="{{ old('price') }}" name="price" class="form-control" placeholder="Price">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Desc</label>
            <input type="text" value="{{ old('desc') }}" name="desc" class="form-control" id="" placeholder="Desc">
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Image</label>
            <input type="file" value="{{ old('image') }}" name="image" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">The loai san pham</label>
            <select name="categories_id" class="form-control">
                @forelse($categories as $ca)
                <option value="{{ $ca->id }}">{{ $ca->name }}</option>
                @empty
                    <option>Rong</option>
                @endforelse
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop

