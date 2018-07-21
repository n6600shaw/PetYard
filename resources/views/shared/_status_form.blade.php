<form action="{{route('statuses.store')}}" method="POST">

@include('shared._errors')
{{csrf_field()}}
<textarea name="content" placeholder="Wonderful day!" rows="3" class="form-control"></textarea>
<button type="submit" class="btn btn-primary pull-right">Post</button>
</form>
