<!doctype html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

@extends('layouts.app')

@section('content')
    <div class="container">
        <h4 class="mt-3 mb-0">{{ Auth::user()->name }} logged in!</h4>
        <div class="row">
            <!-- Add New Country Form -->
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        Add New Country
                    </div>
                    <div class="card-body">
                        <form action="{{ route('insert') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="country_name" class="form-label">Country Name</label>
                                <input type="text" class="form-control" id="country_name" name="country_name"
                                       placeholder="Enter country name">
                            </div>
                            <div class="mb-3">
                                <label for="iso-code" class="form-label">ISO Code</label>
                                <input type="text" class="form-control" id="iso_code" name="iso_code"
                                       placeholder="Enter ISO code">
                            </div>
                            <button type="submit" class="btn" style="
                            float: right;
                             color: #fff;
                            background-color: black;">SAVE
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- List of Countries -->
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        List of countries
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">ISO</th>
                                    <th scope="col">Delete</th>
                                    <th scope="col">Edit</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($states as $state)
                                    <tr>
                                        <td scope="row">{{ $state->id }}</td>
                                        <td>{{ $state->country_name }}</td>
                                        <td>{{ $state->iso_code }}</td>
                                        <td>
                                            <a href="delete/{{$state->id}}">
                                                <button class="btn btn-danger">Delete</button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="edit/{{$state->id}}">
                                                <button class="btn btn-primary">Edit</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
</body>
</html>
