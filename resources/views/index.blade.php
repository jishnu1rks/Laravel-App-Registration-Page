@extends('layouts.app')


@section('content')
<div class="text-center main-btns">
<a href="{{route('login')}}">
    <button class="btn btn-sm btn-success">Login</button>
</a>

<a href="{{route('register')}}">
    <button class="btn btn-sm btn-primary">Register</button>
</a>

</div>
@endsection