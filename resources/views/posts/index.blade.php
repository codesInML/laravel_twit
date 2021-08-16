@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-2/3 mb-4 bg-white p-6 rounded-lg">
        <form action="{{ route('posts') }}" method="post" class="mb-4">
            @csrf
            <div class="mb-4">
                <label for="body" class="sr-body"></label>
                <textarea name="body" id="body" cols="30" rows="10" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post something"></textarea>

                @error('body')
                <div class="text-red-500 mt-2 text-sm">
                    {{ message }}
                </div>
                @enderror

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Post</button>
                </div>
            </div>
        </form>

        @if($posts->count())
        @foreach($posts as $post)
        <div class="mb-4 bg-gray-300 p-6 rounded-lg w-full">
            <a href="" class="font-bold">{{ $post->user->name }}</a> <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
            <p class="mb-2">{{ $post->body }}</p>

            <div class="flex items-center">
                @if(!$post->likedBy(auth()->user()))
                <form action="{{ route('post.likes', $post) }}" method="post" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                </form>
                @else
                <form action="{{ route('post.likes', $post) }}" method="post" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Unike</button>
                </form>
                @endif
                <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
            </div>

        </div>
        @endforeach
        {{$posts->links()}}
        @else
        <p>There are no posts.</p>
        @endif
    </div>
</div>
@endsection