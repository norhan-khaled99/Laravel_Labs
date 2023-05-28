@extends('layouts.app');
@section('title')
    ALL Posts from Database
@endsection

{{--@dd($posts);--}}
@auth()
     <h1>welcome {{Auth::user()->name}}</h1>
@endauth
@section('content');
<div class="container">
<h1 class="text-center">All posts</h1>

<table class="table">
    <tr>
        <td> id</td> <td> Title</td>   <td>Slug</td>  <td>posted by</td> <td> created At</td>,<td>image</td> <td>show</td>  <td>edit</td> <td>delete</td>
        @foreach($posts as $post)
            <tr>
                <td>
                    {{$post->id}}
                </td>
                <td>
                    {{$post->title}}
                </td>
                <td>{{ $post->slug }}</td>
                <td>
                    {{$post->postedby}}
                </td>
                <td>
{{--                    {{$post->created_at}}--}}
{{--                    {{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d')}}--}}
                </td>
{{--                <td>{{$post->image}}</td>--}}
                <td> <img width="100" height="100" src="{{asset('images/posts/'.$post->image)}}"></td>

                <td><a  href="{{route('post.show',$post->id)}}" class="btn btn-info">show</a></td>
                <td><a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning">Edit</a></td>
                <td>
               <form method="POST" action="{{ route('post.destroy', $post) }}" onsubmit="return confirm('Are you sure you want to delete this post?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                </td>
            </tr>
        @endforeach

    </tr>

</table>
    <div class="d-flex justify-content-center">
        <div class="pagination">
            {{ $posts->links('pagination::bootstrap-5') }}

        </div>
    </div>
    <div class="d-flex justify-content-center">
        <td><a href="{{route('post.create')}}" class="btn btn-primary"> create post</a></td>
    </div>

</div>
@endsection
