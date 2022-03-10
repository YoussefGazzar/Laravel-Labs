@extends("layouts/app")

@section("title")
Posts - Create
@endsection

@section("maincontent")
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form-control" action="{{route('posts.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label  class="form-label">Title</label>
            <input type="text" name="title" class="form-control" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <input type="text"  name="description" class="form-control" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Image URL</label>
            <input type="text"  name="image" class="form-control" >
        </div>
        <div class="mb-3">
            <label  class="form-label">User</label>
            <select name="user_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 text-center">
            <input type="submit" class="btn btn-success">
        </div>
    </form>
@endsection