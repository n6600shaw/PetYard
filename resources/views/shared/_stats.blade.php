<div class="stats">
    <a href="{{route('users.followings',$user->id)}}">
        <strong class="stat" id="following">
            {{count($user->followings)}}
        </strong>
        Followings


    </a>
    <a href="{{route('users.followers',$user->id)}}">
        <strong class="stat" id="follower">
            {{count($user->followers)}}
        </strong>
        Followers


    </a>
    <a href="{{route('users.show',$user->id)}}">
        <strong class="stat" id="statuses">
        {{count($user->statuses)}}
        </strong>
        Statuses
        
        
        </a>




</div>