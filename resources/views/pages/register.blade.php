@extends('layouts.app')


@section('content')
    <h4 class="text-center text-uppercase my-5">Register</h4>
<div class="register-box">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('register.store')}}" method="POST" class="m-auto">
        @csrf
        <div class="form-row">
            <div class="col">
            <label for="" class="col-form-label" class="col-form-label">Name</label>
       <input type="text" class="form-control form-control-sm" name="name" placeholder="Enter name" required>
            </div>
            <div class="col">
            <label for="" class="col-form-label" >Email</label>
       <input type="email" class="form-control form-control-sm" name="email" placeholder="Enter email" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
            <label for="" class="col-form-label" >Date of Birth</label>
       <input type="date" class="form-control form-control-sm" name="dob" required>
            </div>
            <div class="col">
            <label for="" class="col-form-label" >City</label>
       <input type="text" class="form-control form-control-sm" name="city" placeholder="Enter City" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
       <label for="" class="col-form-label" >Username</label>
       <input type="text" class="form-control form-control-sm" name="username" placeholder="Enter Username" required>
       </div>
       </div>
       <div class="form-row">
            <div class="col">
            <label for="" class="col-form-label" >Password</label>
       <input type="password" class="form-control form-control-sm" name="password" placeholder="Enter Password" required>
            </div>
            <div class="col">
            <label for="" class="col-form-label" >Confirm Password</label>
       <input type="password" class="form-control form-control-sm" name="confirm_password" placeholder="Confirm Password" required>
            </div>
        </div>
       <div class="form-group my-3">
       <input type="submit" value="Register" class="btn btn-outline-dark">
       </div>
    </form>

    
<p >
If you already registered. Please 
<a href="{{route('login')}}">
    click here
</a> 
</p>

</div>




@endsection