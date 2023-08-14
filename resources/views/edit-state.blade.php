<!doctype html>
<html lang="en">
<head>
  <title>Update-Form</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
  <header >
    <h1 class="text-center"> Edit Form </h1>
    <br>
  </header>
@extends('layouts.app')

@section('content')
  <div class="container">
    <h4 class="mt-3 mb-0">{{ Auth::user()->name }} logged in!</h4>
    <div class="row">
      <!-- Add New Country Form -->
      <div class="col-md-6">
        <div class="card mb-3">
          <div class="card-header">
            Edit Country Details
          </div>
          <div class="card-body">
            <form action="../update/{{$result->id}}" method="post">
              @csrf
              <div class="mb-3">
                <label for="country_name" class="form-label">Country Name</label>
                <input type="text" class="form-control" id="country_name" name="country_name" placeholder="Enter country name" value="{{$result->country_name}}">
              </div>
              <div class="mb-3">
                <label for="iso-code" class="form-label">ISO Code</label>
                <input type="text" class="form-control" id="iso_code" name="iso_code" placeholder="Enter ISO code" value="{{$result->iso_code}}">
              </div>
              <button type="submit" class="btn btn-primary">Update Country</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
</body>
</html>