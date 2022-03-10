@extends("layouts/app")

@section("title")
Posts - Deleted
@endsection

@section("maincontent")
    <table class="table">
        <tr>
            <th> ID </th>
            <th> Title </th>
            <th> Description </th>
            <th> Action </th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td><a href="{{route('posts.restore', $post['id'])}}" class="btn btn-success">Restore </a></td>
            </tr>
        @endforeach
    </table>
    <a href="{{route('posts.index')}}" class="btn btn-primary">Go Back</a>
@endsection
