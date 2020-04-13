@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <head>
                    <title>Hello cruel world!!!</title>
                    <title>View Books Records.</title>
                </head>

                <body>
                    <table border = 1>
                        <tr>
                            <td>ISBN</td>
                            <td>Name</td>
                            <td>Author</td>
                        </tr>
                        @foreach ($books as $key)
                        <tr>
                            <td>{{ $key->isbn }}</td>
                            <td>{{ $key->title }}</td>
                            <td>{{ $key->author }}</td>
                        </tr>
                        @endforeach
                    </table>
                </body>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection