@extends('layouts.default') @section('title','Edit personal profile') @section('content')

<div class="col-md-offset-2 col-md-8">
    <div class="panel panel-defualt">

        <div class="panel-heading">

            <h5>Edit personal profile</h5>

        </div>
        <div class="panel-boddy">



            @include('shared._errors')
            <div class="gravatar_edit">
                <a href='http://gravatar.com/emails' target='_blank'> <img src="{{$user->gravatar('200')}}" alt="{{$user->name}}" class="gravatar"/>
                </a>
            </div>

            <form method="POST" action="{{route('users.update',$user->id)}}">
                {{ method_field('PATCH') }} {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control" value="{{$user->name}}">

                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" class="form-control" disabled>

                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="text" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password_confirm">Confirm password</label>
                    <input type="text" name="password_confirm" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        </div>




    </div>
</div>
@stop
