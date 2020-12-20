@extends('admin.layouts.app')
@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
        </tr>
        </thead>
        <tbody>

        @forelse($categories as $ca)
            <tr>
                <th scope="row">{{ $ca->id }}</th>
                <td>{{ $ca->name }}</td>
            </tr>
        @empty
        @endforelse
        </tbody>
    </table>
@endsection
