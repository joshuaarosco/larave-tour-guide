<input type="hidden" name="id" value="" class="id" >
<div class="row">
    <div class="col-md-12">
        <div class="form-group form-group-default required {{$errors->has('validity-date')?'has-error':null}}">
            <label>Validity Date</label>
            <input type="date" class="form-control validity-date" name="validity-date" value="{{old('validity-date')}}" id="validity-date" placeholder="" maxlength="30" required>
        </div>
        @if($errors->has('validity-date'))
        <label class="error" for="validity-date">{{$errors->first('validity-date')}}</label>
        @endif
    </div>
</div>
