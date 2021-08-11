@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-2/3 bg-white p-6 rounded-lg">
        <form action="{{ route('posts') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="body" class="sr-body">Body</label>
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
    </div>
</div>
@endsection