@extends("layouts/app")

@section("title")
Posts - Index
@endsection

@section("maincontent")
    <div class="text-center">
        <a href="{{route('posts.create')}}" class="btn btn-success">Add New Post </a>
        <a href="{{route('posts.deleted')}}" class="btn btn-danger">Deleted Posts </a>
    </div>
    <table class="table">
        <tr>
            <th> ID </th>
            <th> Title </th>
            <th> Slug </th>
            <th> Description </th>
            <th> View </th>
            <th> Edit </th>
            <th> Action </th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->info}}</td>
                <td>{{$post->description}}</td>
                <td><a href="{{route('posts.show', $post['id'])}}" class="btn btn-info">View </a></td>
                <td><a href="{{route('posts.edit', $post['id'])}}" class="btn btn-warning">Edit </a></td>
                <td>
                    <form action="{{route('posts.destroy', $post['id'])}}" method="POST">
                        @method("DELETE")
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        
    </table>
    <span>{{$posts->links()}}</span>

@endsection
