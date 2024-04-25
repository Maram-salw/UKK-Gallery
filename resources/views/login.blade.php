@extends('layout')
@section('title', 'Login')
@section('content')
<div class="container">
    <div class="mt-5">
        @if($errors->any())
        <div class="col-12">
            @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        </div>
        @endif

    </div>
<form action="{{route('login.post')}}" method="POST" class="ms-auto me-auto mt-auto" style="width: 500px">
@csrf
<div class="container"><br>
        <div class="col-md-10 col-md-offset-10">
            <h2 class="text-center"><b>Gallery</b><br></h3>
            <hr>
  <div class="mb-3">
    <label class="form-label">Email address</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  <button type="submit" class="btn btn-primary col-md-12 col-md-offset-12" href="uploads">Login</button>
  <hr>
  <p class="text-center">Don't have an account yet? <a href="registration">sign up</a> now!</p>
</form>
</div>
@endsection