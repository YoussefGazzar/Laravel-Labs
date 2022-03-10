@extends("layouts/app")

@section("title")
Posts - {{$row->title}}
@endsection

@section("maincontent")
<div class="card bg-light" style="width: 18rem;">
  <img src="{{$row->image}}" class="card-img-top" alt="...">
  <div class="card-body">
        <h5 class="card-title">{{$row->title}}</h5>
    <p class="card-text">{{$row->id}}- {{$row->description}}</p>
    <p class="card-text">User: {{$row->user->name}}</p>
    <p class="card-text">Created at: {{$row->created_at}}</p>
    <p class="card-text">Updated at: {{ \Carbon\Carbon::parse($row->updated_at)->format('d/m/Y')}}</p>
    <a href="{{route('posts.index')}}" class="btn btn-primary">Go Back</a>
  </div>
</div>
@endsection