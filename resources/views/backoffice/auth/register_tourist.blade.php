@extends('backoffice.auth._layout.main')

@push('title','Tourist Registration')

@push('css')
<style>
  .login-wrapper {
    background: url('{!! asset("web/assets/images/banner/banner-2-img-2.png")!!}');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: bottom;
  }
</style>
@endpush

@push('content')
  <div class="login-wrapper">
    <div class="bg-pic">
        <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
            <h2 class="semi-bold text-white">{{config('app.name')}}</h2>
            <p class="small"></p>
        </div>
    </div>
    <div class="login-container bg-white">
      <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
        <h3>Tourist Registration</h3>
        @if(session()->has('notification-status'))
        <div class="m-t-35 alert alert-{{session()->get('notification-status')}}" role="alert">
            <button class="close" data-dismiss="alert"></button>
            <strong>{{Str::title(session()->get('notification-status'))}}: </strong> {{session()->get('notification-msg')}}
        </div>
        @endif
        <form action="" method="POST" class="p-t-15" id="form-login" name="form-login" role="form">
          {{csrf_field()}}
          <input type="hidden" name="type" value="tourist">
          <div class="row">
            <div class="col-md-6">
                <div class="form-group form-group-default required {{$errors->has('fname')?'has-error':null}}">
                    <label>First Name</label>
                    <div class="controls">
                    <input class="form-control" name="fname" value="{{ old('fname') }}" placeholder="First Name" required="" type="text">
                    </div>
                </div>
                @if($errors->has('fname'))
                <label class="error" for="fname">{{$errors->first('fname')}}</label>
                @endif
            </div>
            <div class="col-md-6">
                <div class="form-group form-group-default required {{$errors->has('lname')?'has-error':null}}">
                    <label>Last Name</label>
                    <div class="controls">
                    <input class="form-control" name="lname" value="{{ old('lname') }}" placeholder="Last Name" required="" type="text">
                    </div>
                </div>
                @if($errors->has('lname'))
                <label class="error" for="lname">{{$errors->first('lname')}}</label>
                @endif
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
                <div class="form-group form-group-default required {{$errors->has('contact_number')?'has-error':null}}">
                    <label>Contact Number</label>
                    <div class="controls">
                    <input class="form-control" name="contact_number" value="{{ old('contact_number') }}" placeholder="Contact Number" required="" type="text">
                    </div>
                </div>
                @if($errors->has('contact_number'))
                <label class="error" for="contact_number">{{$errors->first('contact_number')}}</label>
                @endif
            </div>
            <div class="col-md-6">
                <div class="form-group form-group-default required {{$errors->has('email')?'has-error':null}}">
                    <label>Email</label>
                    <div class="controls">
                    <input class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required="" type="email">
                    </div>
                </div>
                @if($errors->has('email'))
                <label class="error" for="email">{{$errors->first('email')}}</label>
                @endif
            </div>
          </div>
          <div class="form-group form-group-default required {{$errors->has('password')?'has-error':null}}">
            <label>Password</label>
            <div class="controls">
              <input class="form-control" name="password" placeholder="Password" required="" type="password">
            </div>
          </div>
        @if($errors->has('password'))
        <label class="error" for="password">{{$errors->first('password')}}</label>
        @endif
          <div class="form-group form-group-default required {{$errors->has('password')?'has-error':null}}">
            <label>Confirm Password</label>
            <div class="controls">
              <input class="form-control" name="password_confirmation" placeholder="Confirm Password" required="" type="password">
            </div>
          </div>
            @if($errors->has('password_confirmation'))
            <label class="error" for="password_confirmation">{{$errors->first('password_confirmation')}}</label>
            @endif
          <button class="btn btn-success btn-cons m-t-10 btn-block" type="submit">Register</button><br>
        </form>
        <div class="m-t-10">
          <a href="{{ route('backoffice.auth.login') }}" class="normal">Already have an account?</a>
        </div>
      </div>
    </div>
  </div>
@endpush
