<li>
    <img src="{{$user->gravatar()}}" alt="" class="gravatar">
    <a href="{{route('users.show',$user->id)}}" class="username">{{$user->name}}</a>
</li>