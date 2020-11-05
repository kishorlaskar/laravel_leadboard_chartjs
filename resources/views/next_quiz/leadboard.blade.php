@extends('layouts.app')
@section('content')
        <table class="table">
            <thead>
            <tr>

                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Score</th>
            </tr>
            </thead>
            <tbody>
            @foreach($leads as $l)
            <tr>

                <td>{{ $l->name }}</td>
                <td>{{ $l->email }}</td>
                <td>{{ $l->score }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
@endsection
