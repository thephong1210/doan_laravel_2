@extends('adminlte::page')
@section('title', 'Danh sach san pham')
@section('content')
    <h1>Danh sach san pham</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Desc</th>
            <th scope="col">Image</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php  $stt = 1;?>
        @forelse($products as $pr)
            <tr>
                <th scope="row">{{ $stt}}</th>
                <td> <a href="{{route('product.edit', ['id'=>$pr->id])}}">{{ $pr->name }}</a></td>
                <td>{{ $pr->price }}</td>
                <td>{{ $pr->desc }}</td>
                <td><img width="120" src="{{ asset('storage/'. str_replace('public', '', $pr->image))}}" /></td>
                <td>{{ $pr->category->name }}</td>
                <td><a href="{{ route('product.destroy', ['id' => $pr->id]) }}">Delete</a></td>
{{--                resfult--}}
            </tr>
            <?php $stt++;?>
        @empty
        @endforelse
        </tbody>
    </table>
@stop

