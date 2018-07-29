@extends('layouts.default') 
@section('title','Home') 
@section('content') 

@if (Auth::check())

<div class="row">
  <div class="col-md-8">
    <section class="status_form">
  @include('shared._status_form')
    </section>
    <h3>Posts list</h3>   
    @include('shared._feed')
  </div>
  <aside class="col-md-4">
    <section class="user_infor">
  @include('shared._user_info',['user'=>Auth::user()])
    </section>
    <section class="stats">
      
      @include('shared._stats', ['user'=>Auth::user()])
      <section>
  </aside>

</div>
@else
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
@endif 
@stop