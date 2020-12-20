@extends('adminlte::page')
@section('title', 'Quan ly don hang')
@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Qty</th>
            <th scope="col">Image</th>
        </tr>
        </thead>
        <tbody>
        @php
            $total = 0;
        @endphp
        @forelse($order_products as $o)
            @php
                $total +=($o ->qty * $o->price)
             @endphp
            <tr>
                <td scope="col">{{ $o->id }}</td>
                <td scope="col">{{ $o->name }}</td>
                <td scope="col">{{ $o->price }}</td>
                <td scope="col">{{ $o->qty }}</td>
                <td><img width="120" src="{{ asset('storage/'. str_replace('public', '', $o->image))}}" /></td>
            </tr>
        @empty
        @endforelse
        <tr>
            <th>Total: {{ number_format($total) }} vnd</th>
        </tr>
        </tbody>
    </table>
@endsection
