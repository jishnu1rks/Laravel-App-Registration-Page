@extends('layouts.app')


@section('content')
    <h4 class="text-center text-uppercase my-5">Login</h4>
<div class="login-box">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('form.login')}}" method="POST" class="m-auto">
        @csrf
        <div class="form-row">
            <div class="col">
            <label for="" class="col-form-label" >Username</label>
            <input type="text" class="form-control form-control-sm" name="username" placeholder="Enter username" required>
            </div>
       </div>
       <div class="form-row">
            <div class="col">
            <label for="" class="col-form-label" >Password</label>
            <input type="password" class="form-control form-control-sm" name="password" placeholder="Enter password" required>
            </div>
        </div>
       <div class="form-group my-3">
       <input type="submit" value="Login" class="btn btn btn-outline-dark">
       </div>
    </form>

    
<p >
If you are not registered. Please 
<a href="{{route('register')}}">
   click here
</a> 
</p>

</div>




@endsection