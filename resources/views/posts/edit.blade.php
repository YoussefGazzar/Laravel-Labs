@extends("layouts/app")

@section("title")
Posts - Edit
@endsection

@section("maincontent")
    <form class="form-control" action="{{route('posts.update', $row['id'])}}" method="POST">
        @method("PUT")
        @csrf
        <div class="mb-3">
            <label  class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value='{{$row->title}}'>
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <input type="text"  name="description" class="form-control" value='{{$row->description}}'>
        </div>
        <div class="mb-3">
            <label  class="form-label">Image URL</label>
            <input type="text"  name="image" class="form-control" value='{{$row->image}}'>
        </div>
        
        <div class="mb-3 text-center">
            <input type="submit" class="btn btn-success" value="Update">
        </div>
    </form>
@endsection