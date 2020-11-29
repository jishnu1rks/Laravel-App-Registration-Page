@extends('layouts.app')


@section('content')
    <h4 class="text-center text-uppercase my-5">Profile</h4>
    <div id="profile-box">
    <div class="text-right d-flex justify-content-between">
        <h5>Hi, <span class="text-capitalize">{{$user->username}}</span></h5>
        <div class="d-flex">
        <button class="btn btn-outline-primary mr-2 edit-btn" onclick="edit()">Edit</button>
            <form action="{{route('login')}}">
                <button class="btn btn-outline-danger">Logout</button>
            </form>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('profile.update', ['id' => $user->details->id])}}" method="POST" class="m-auto">
        @csrf
        <div class="form-row">
            <div class="col">
            <label for="" class="col-form-label" class="col-form-label">Name</label>
       <input type="text" class="form-control form-control-sm" name="name" placeholder="Enter name" value="{{$user->details->name}}" disabled required>
            </div>
            <div class="col">
            <label for="" class="col-form-label" >Email</label>
       <input type="email" class="form-control form-control-sm" name="email" placeholder="Enter email" value="{{$user->details->email}}" disabled required>
            </div>
        </div>
        <input type="hidden" name="username" value="{{$user->username}}">
        <div class="form-row">
            <div class="col">
            <label for="" class="col-form-label" >Date of Birth</label>
       <input type="date" class="form-control form-control-sm" name="dob" value="{{$user->details->dob}}" disabled required>
            </div>
            <div class="col">
            <label for="" class="col-form-label" >City</label>
       <input type="text" class="form-control form-control-sm" name="city" placeholder="Enter City" value="{{$user->details->city}}" disabled required>
            </div>
        </div>
        <!-- <div class="form-row">
            <div class="col">
       <label for="" class="col-form-label" >Username</label>
       <input type="text" class="form-control form-control-sm" name="username" value="{{}}" disabled placeholder="Enter Username" required>
       </div>
       </div> -->
       <!-- <div class="form-row">
            <div class="col">
            <label for="" class="col-form-label" >Password</label>
       <input type="password" class="form-control form-control-sm" name="password" placeholder="Enter Password" required>
            </div>
            <div class="col">
            <label for="" class="col-form-label" >Confirm Password</label>
       <input type="password" class="form-control form-control-sm" name="confirm_password" placeholder="Confirm Password" required>
            </div>
        </div> -->
       <div class="form-group text-center my-3">
       <input type="submit" value="Update" class="btn btn-sm btn-success d-none update-btn" >
       </div>
    </form>

    


</div>

<script>

    function edit(){
        document.querySelector('.update-btn').classList.remove('d-none');
        document.querySelector('.edit-btn').classList.add('d-none');
        var inputs = document.querySelectorAll('.form-control');

        inputs.forEach(inp=>{
            inp.removeAttribute('disabled');
        })
    }
</script>


@endsection