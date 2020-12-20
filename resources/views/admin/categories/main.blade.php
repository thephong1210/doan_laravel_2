@extends('adminlte::page')
@section('title', 'Danh sach the loai')
@section('content')
    <h1>Danh sach the loai</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php  $stt = 1;?>
        @forelse($categories as $cate)
            <tr>
                <th scope="row">{{ $stt}}</th>
                <td> <a href="{{route('category.edit', ['id'=>$cate->id])}}">{{ $cate->name }}</a></td>
                <td><a href="{{ route('category.destroy', ['id' => $cate->id]) }}">Delete</a></td>
            </tr>
            <?php $stt++;?>
        @empty
        @endforelse
        </tbody>
    </table>
@stop

