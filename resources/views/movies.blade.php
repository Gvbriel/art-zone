@extends('layouts.app')

@section('content')

    @foreach($movies as $movie)
    <div class="card m-4" style="width: 18rem;">
        <img class="card-img-top p-2" src="{{$movie->cover}}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{$movie->title}}</h5>
            <p class="card-text">{{$movie->brief_description}}</p>
            <form action="{{route('movie.show', $movie->title)}}" method="post">
                @csrf
                <input value="{{$movie->title}}" name="title" type="hidden"/>
                <button type="submit" class="btn btn-primary" >Show details</button>
            </form>
        </div>
    </div>
    <a href="sms:+48739057778&body=Hi%2520there%252C%2520I%2527d%2520like%2520to%2520place%2520an%2520order%2520for...">Click here to text us!</a>
    @endforeach

    <div class="w-50 m-4 h-50 bg-light p-3 rounded mx-auto">
        <form method="post" action="{{route('movies')}}">
            @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="cover">Cover link:</label>
                    <input type="text" class="form-control" id="cover" name="cover">
                </div>
                <div class="form-group">
                    <label for="brief_description">One sentence description:</label>
                    <input type="text" class="form-control" id="brief_description" name="brief_description">
                </div>
                <div class="form-group">
                    <label for="body">Description</label>
                    <textarea class="form-control" id="body" name="body" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>

@endsection
