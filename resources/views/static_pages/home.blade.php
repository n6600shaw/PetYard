@extends('layouts.default')
@section('title','Home')
@section('content')
<div class="jumbotron">
  <h1>Welcome to PetieYard</h1>
  <p class="lead">
    <a href="#"></a>

  </p>
  <p>
    Build a home for you and your pet here
  </p>
<a class="btn btn-lg btn-success" href="{{route('signup')}}" role="button">Register</a>
</div>

@stop