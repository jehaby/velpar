@extends('layout')


@section('content')

    <div class="container">

        <table class="table-stripped">

            <thead>

            <tr>
                <th>Паттерн</th>
                <th>Секции</th>
                <th>Префиксы</th>
                <th>Новых тем за день</th>

            </tr>

            </thead>


            <tbody>
            @foreach($patterns as $pattern)
                <tr>
                    <td>{{ $pattern->regex }}</td>
                    <td>{{ $pattern->sections }}</td>
                    <td>{{ $pattern->prefixes }}</td>
                    <td> TODO </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection