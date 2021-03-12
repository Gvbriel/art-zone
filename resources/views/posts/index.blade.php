@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex justify-content-center">
            <div class="rounded w-50 p-3 h-50 bg-white mt-2 mb-2">
                <form class="mb-4" method="post" action="{{route('forum')}}">
                    @csrf
                    <div class="input-group mb-2">
                        <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" aria-label="With textarea" placeholder="What's on your mind?"></textarea>
                    </div>
                    <input type="submit" class="btn btn-sm btn-primary" value="Submit">
                    <input type="reset" class="btn btn-secondary btn-sm" value="Clear">
                </form>
                <div class="mb-2">
                    @if (!$posts->count())
                        <p>No posts to show</p>
                    @else
                        @foreach($posts as $post)
                            <div class="mb-4">
                            <div class="">
                                <h5 class="list-inline-item">{{$post->user->name}}</h5>
                                <span class="list-inline-item font-weight-light">{{$post->created_at->diffForHumans()}}</span>
                                <p>{{$post->body}}</p>
                            </div>
                                @auth
                        @if(!$post->likedBy(auth()->user()))
                            <div class="flex">
                                <form class="mr-1 list-inline-item" method="post" action="{{route('forum.likes', $post)}}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Like</button>
                                </form>
                                @else
                                <form class="mr-1 list-inline-item" method="post" action="{{route('forum.likes', $post)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning">Unlike</button>
                                </form>

                                @endif
                                @endauth
                                @if($post->ownedBy(auth()->user()))
                                <form class="mr-1 list-inline-item" method="post" action="{{route('forum.destroy', $post)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                @endif

                                <span>{{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}</span>
                            </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>



@endsection

