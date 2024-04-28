

<form id="form-personal" role="form" autocomplete="off" method="POST" action="" enctype="multipart/form-data">
    {{ csrf_field() }}
    @if($tour)
    <div class="row">
        <div class="col-md-12">
            <img src="{{$tour->thumbnail()}}" alt="" class="prod-img">
        </div>
    </div>
    <input type="hidden" name="id" value="{{ $tour->id }}">
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="form-group form-group-default required {{$errors->has('destination_id')?'has-error':null}}">
                <label>Destination</label>
                <select name="destination_id" id="" class="form-control" required>
                    <option value="">-- Choose a Destination --</option>
                    @foreach($destinations as $index => $destination)
                    @if($tour AND $destination->id == $tour->destination->id)
                    <option value="{{ $destination->id }}" selected>{{ $destination->name }}</option>
                    @else
                    <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            @if($errors->has('destination_id'))
            <label class="error" for="destination_id">{{$errors->first('destination_id')}}</label>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group form-group-default required {{$errors->has('name')?'has-error':null}}">
                <label>Tour Name</label>
                <input type="text" class="form-control {{Str::lower($title)}}-name" name="name" value="{{ old('name', $tour?$tour->name: '') }}" id="name" placeholder="" required>
            </div>
            @if($errors->has('name'))
            <label class="error" for="name">{{$errors->first('name')}}</label>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group form-group-default required {{$errors->has('details')?'has-error':null}}">
                <label>Details & Amenities</label>
                <textarea name="details" class="{{Str::lower($title)}}-details editor">{{ old('details', $tour?$tour->details: '
                    <p>
                    A trip to Pangasinan would not be complete without a visit to the Cape Bolinao Lighthouse, which offers breathtaking panoramic views of the West Philippine Sea. 
                    Built in 1905, this historic lighthouse stands atop Punta Piedra Point in the town of Bolinao.
                    </p>
                    <strong>Amenities</strong>
                    <ul>
                        <li>Fully Air-Conditioned Transient House good for 20 pax</li>
                        <li>Overlooking view of the bay</li>
                        <li>Karaoke and Board Games</li>
                        <li>etc...</li>
                    </ul>
                    ') }}</textarea>
            </div>
            @if($errors->has('details'))
            <label class="error" for="details">{{$errors->first('details')}}</label>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group form-group-default required {{$errors->has('activities')?'has-error':null}}">
                <label>Activity</label>
                <textarea name="activities" class="{{Str::lower($title)}}-activities editor-activity">{!! old('activities', $tour?$tour->activities: '
                    <strong>Activities</strong>
                    <ul>
                        <li>Surfing and Bodyboarding (8:00 am – 9:00 am)</li>
                        <li>Snorkeling (9:30 am – 10:00 am)</li>
                        <li>Kayaking and Canoeing (10:00 am – 11:00 am)</li>
                        <li>etc...</li>
                    </ul>
                    ') !!}</textarea>
            </div>
            @if($errors->has('activities'))
            <label class="error" for="activities">{{$errors->first('activities')}}</label>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group form-group-default required {{$errors->has('price')?'has-error':null}}">
                <label>Price</label>
                <input type="text" class="form-control {{Str::lower($title)}}-price" name="price" placeholder="0.00" value="{{ old('price', $tour?$tour->price: '') }}" id="price" placeholder="" maxlength="30" required>
            </div>
            @if($errors->has('price'))
            <label class="error" for="price">{{$errors->first('price')}}</label>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group form-group-default required {{$errors->has('thumbnail')?'has-error':null}}">
                <label>Thumbnail</label>
                <input type="file" class="form-control {{Str::lower($title)}}-thumbnail" name="thumbnail" value="{{ old('thumbnail', $tour?'': '') }}" id="thumbnail" placeholder="" maxlength="30" {{ $tour?'':'required' }}>
            </div>
            @if($errors->has('thumbnail'))
            <label class="error" for="thumbnail">{{$errors->first('thumbnail')}}</label>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-success mr-2" type="submit">Save {{Str::lower($title)}}</button>
            <a class="btn btn-warning" href="{{ route('backoffice.tour.index') }}">Cancel</a>
        </div>
    </div>
</form>