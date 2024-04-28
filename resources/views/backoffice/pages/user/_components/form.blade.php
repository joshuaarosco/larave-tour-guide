<input type="hidden" name="type" value="admin" class="{{Str::lower($title)}}-type" >
<input type="hidden" name="id" value="" class="{{Str::lower($title)}}-id" >
<div class="row">
    <div class="col-md-6">
        <div class="form-group form-group-default required {{$errors->has('fname')?'has-error':null}}">
            <label>First Name</label>
            <input type="text" class="form-control {{Str::lower($title)}}-fname" name="fname" value="{{old('fname')}}" id="fname" placeholder="" maxlength="30" required>
        </div>
        @if($errors->has('fname'))
        <label class="error" for="fname">{{$errors->first('fname')}}</label>
        @endif
    </div>
    <div class="col-md-6">
        <div class="form-group form-group-default required {{$errors->has('lname')?'has-error':null}}">
            <label>Last Name</label>
            <input type="text" class="form-control {{Str::lower($title)}}-lname" name="lname" value="{{old('lname')}}" id="lname" placeholder="" maxlength="30" required>
        </div>
        @if($errors->has('lname'))
        <label class="error" for="lname">{{$errors->first('lname')}}</label>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group form-group-default required {{$errors->has('email')?'has-error':null}}">
            <label>Email</label>
            <input type="email" class="form-control {{Str::lower($title)}}-email" name="email" value="{{old('email')}}" id="email" placeholder="" maxlength="30" required>
            @if($errors->has('email'))
            <label class="error" for="email">{{$errors->first('email')}}</label>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group form-group-default">
            <label>Contact Number</label>
            <input type="text" class="form-control {{Str::lower($title)}}-contact_number" name="contact_number" value="{{old('contact_number')}}" placeholder="" maxlength="30">
        </div>
    </div>
</div>