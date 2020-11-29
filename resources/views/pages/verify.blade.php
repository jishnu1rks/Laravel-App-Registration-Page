@extends('layouts.app')


@section('content')
<h4 class="text-center text-uppercase my-5">OTP Verification</h4>
<div class="login-box">

<form action="{{route('account.verify')}}" method="post" class="form-inline">
    @csrf
    <input type="hidden" name="id" value="{{$id}}">
    <div class="row">
    <div class="col">
        <input type="text" placeholder="Enter OTP here" class="form-control form-control-sm" name="otp">
        <small>please check your email.</small>
    </div>
    <div class="col">
    <button type="submit" class="btn btn-warning btn-sm">Verify</button>
    </div>
 
    </div>
</form>
<form action="{{route('resendotp', ['id' => $id ] )}}" >
    @csrf
    <button type="submit" class="btn-danger btn-sm btn mt-3">Resend</button>
</form>



</div>

@endsection