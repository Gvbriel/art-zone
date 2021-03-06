@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex justify-content-center">
        <div class="rounded w-50 p-3 h-50 bg-white mt-2 ">
            Dashboard of {{auth()->user()->name}}
        </div>
    </div>
@endsection
