@extends('adminlte::page')
@section('title', 'Quan ly don hang')
@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Number</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        @forelse($order_detail as $o)
            <tr>
                <td scope="col">{{ $o->id }}</td>
                <td scope="col"><a href="{{ route('management_order.products', ['id' => $o->id]) }}">{{ $o->name }}</a></td>
                <td scope="col">{{ $o->address }}</td>
                <td scope="col">{{ $o->phone }}</td>
                <td scope="col">{{ ($o->status === \App\User::ORDER) ? "Dang mua hang" : "Da thanh toan" }}</td>
            </tr>
        @empty
        @endforelse
        </tbody>
    </table>
@endsection
