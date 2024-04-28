<div class="row row-same-height">
    <div class="col-md-12">
        <div class="mb-4 sm-padding-5">
            <h2>Disbursement Details</h2>
        </div>
    </div>
    <div class="col-md-6">
        <div class="sm-padding-5">
            <!-- <form role="form"> -->
                <div class="form-group-attached">
                    <div class="form-group form-group-default">
                        <label>Account Name</label>
                        <input type="text" class="form-control" name="oath_3" value="{{$loan?$loan->oath_3:old('oath_3')}}" {{$loan?"readonly":""}}>
                    </div>
                    <div class="form-group form-group-default">
                        <label>Account Number</label>
                        <input type="text" class="form-control" name="oath_4" value="{{$loan?$loan->oath_4:old('oath_4')}}" {{$loan?"readonly":""}}>
                    </div>
                    <div class="form-group form-group-default">
                        <label>Disbursement Method</label>
                        <select name="oath_7" value="{{$loan?$loan->oath_7:old('oath_7')}}" class="form-control" class="" {{$loan?"readonly":""}}>
                            <option value="">---</option>
                            @foreach($paymentMethods as $index => $paymentMethod)
                            @if(old('oath_7') ==$index || ($loan AND $index == $loan->oath_7 ))
                            <option value="{{$index}}" selected>{{$paymentMethod}}</option>
                            @else
                            <option value="{{$index}}">{{$paymentMethod}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            <!-- </form> -->
        </div>
    </div>
</div>