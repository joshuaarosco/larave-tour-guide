@extends('backoffice.auth._layout.main')

@push('title','Membership Application')

@push('css')
<style>
  .card .card-header{
    padding: 17px 20px 7px;
  }
  .checkbox {
    margin-bottom: 0px;
    margin-top: 0px;
  }
</style>
@endpush

@push('content')
    <div class="register-container full-height sm-p-t-30">
      <div class="d-flex justify-content-center flex-column full-height ">
        <h3>Tour Guide Membership Application</h3>
        <form id="form-register" class="p-t-15" role="form" action="" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="row">
            <div class="col-md-4">
              <div class="form-group form-group-default required {{$errors->has('fname')?'has-error':null}}">
                <label>First Name</label>
                <input type="text" name="fname" value="{{old('fname')}}" placeholder="Juan" class="form-control" required>
              </div>
              @if($errors->has('fname'))
              <label class="error" for="fname">{{$errors->first('fname')}}</label>
              @endif
            </div>
            <div class="col-md-4">
              <div class="form-group form-group-default required {{$errors->has('lname')?'has-error':null}}">
                <label>Last Name</label>
                <input type="text" name="lname" value="{{old('lname')}}" placeholder="Dela Cruz" class="form-control" required>
              </div>
            </div>
              @if($errors->has('lname'))
              <label class="error" for="lname">{{$errors->first('lname')}}</label>
              @endif
              <div class="col-md-4">
                <div class="form-group form-group-default required {{$errors->has('nickname')?'has-error':null}}">
                  <label>Nickname</label>
                  <input type="text" name="nickname" value="{{old('nickname')}}" placeholder="Kuya Juan" class="form-control" required>
                </div>
              </div>
              @if($errors->has('nickname'))
              <label class="error" for="nickname">{{$errors->first('nickname')}}</label>
              @endif
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group form-group-default required {{$errors->has('contact_number')?'has-error':null}}">
                <label>Contact Number</label>
                <input type="tel" name="contact_number" value="{{old('contact_number')}}" placeholder="09123456789" class="form-control" required>
              </div>
              @if($errors->has('contact_number'))
              <label class="error" for="contact_number">{{$errors->first('contact_number')}}</label>
              @endif
            </div>
            <div class="col-md-6">
              <div class="form-group form-group-default required {{$errors->has('email')?'has-error':null}}">
                <label>Email</label>
                <input type="email" name="email" value="{{old('email')}}" placeholder="We will send loging details to you" class="form-control" required>
              </div>
              @if($errors->has('email'))
              <label class="error" for="email">{{$errors->first('email')}}</label>
              @endif
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group form-group-default required {{$errors->has('password_confirmation')?'has-error':null}}">
                <label>Password</label>
                <input type="password" name="password_confirmation" placeholder="Minimum of 8 Charactors" class="form-control" required>
              </div>
              @if($errors->has('password_confirmation'))
              <label class="error" for="password_confirmation">{{$errors->first('password_confirmation')}}</label>
              @endif
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group form-group-default required {{$errors->has('password')?'has-error':null}}">
                <label>Confirm Password</label>
                <input type="password" name="password" placeholder="Minimum of 8 Charactors" class="form-control" required>
              </div>
              @if($errors->has('password'))
              <label class="error" for="password">{{$errors->first('password')}}</label>
              @endif
            </div>
          </div>
          <!-- <div class="row">
            <div class="col-md-6">
              <div class="form-group form-group-default required {{$errors->has('bc')?'has-error':null}}">
                <label>Copy of Birth Certificate</label>
                <input type="file" name="bc" class="form-control" required>
              </div>
              @if($errors->has('bc'))
              <label class="error" for="bc">{{$errors->first('bc')}}</label>
              @endif
            </div>
            <div class="col-md-6">
              <div class="form-group form-group-default required {{$errors->has('id')?'has-error':null}}">
                <label>2"x2" ID picture</label>
                <input type="file" name="id" class="form-control" required>
              </div>
              @if($errors->has('id'))
              <label class="error" for="id">{{$errors->first('id')}}</label>
              @endif
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group form-group-default required {{$errors->has('coe')?'has-error':null}}">
                <label>Certificate of Employment</label>
                <input type="file" name="coe" class="form-control" required>
              </div>
              @if($errors->has('coe'))
              <label class="error" for="coe">{{$errors->first('coe')}}</label>
              @endif
            </div>
            <div class="col-md-6">
              <div class="form-group form-group-default required {{$errors->has('lp')?'has-error':null}}">
                <label>Copy of Latest Payslip</label>
                <input type="file" name="lp" class="form-control" required>
              </div>
              @if($errors->has('lp'))
              <label class="error" for="lp">{{$errors->first('lp')}}</label>
              @endif
            </div>
          </div> -->
          <div class="row">
            <div class="col-md-12 no-padding sm-p-l-10">
              <div class="checkbox">
                <input name="agree" id="agree" type="checkbox" value="1" required> 
                <label for="agree">
                  <p>
                    <small>I agree to the 
                      <a href="#" target="_blank" class="text-info">Terms and Regulations</a>.
                    </small>
                  </p>
                </label>
              </div>
            </div>
          </div>
          <button aria-label="" class="btn btn-success btn-cons m-t-10" type="submit">Register</button>
          <div class="m-t-10">
            <a href="{{ route('backoffice.auth.login') }}" class="normal">Already a Tour Guide? Login now.</a>
          </div>
        </form>
      </div>
    </div>
@endpush