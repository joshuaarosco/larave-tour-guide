

<form id="form-personal" role="form" autocomplete="off" method="POST" action="" enctype="multipart/form-data">
    {{ csrf_field() }}
    @if($destination)
    <div class="row">
        <div class="col-md-12">
            <img src="{{$destination->thumbnail()}}" alt="" class="prod-img">
        </div>
    </div>
    <input type="hidden" name="id" value="{{ $destination->id }}">
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="form-group form-group-default required {{$errors->has('name')?'has-error':null}}">
                <label>Destination Name</label>
                <input type="text" class="form-control {{Str::lower($title)}}-name" name="name" value="{{ old('name', $destination?$destination->name: '') }}" id="name" placeholder="" maxlength="30" required>
            </div>
            @if($errors->has('name'))
            <label class="error" for="name">{{$errors->first('name')}}</label>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group form-group-default required {{$errors->has('details')?'has-error':null}}">
                <label>Details</label>
                <textarea name="details" class="{{Str::lower($title)}}-details editor">{{ old('details', $destination?$destination->details: '') }}</textarea>
            </div>
            @if($errors->has('details'))
            <label class="error" for="details">{{$errors->first('details')}}</label>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group form-group-default required {{$errors->has('thumbnail')?'has-error':null}}">
                <label>Thumbnail</label>
                <input type="file" class="form-control {{Str::lower($title)}}-thumbnail" name="thumbnail" value="{{ old('thumbnail', $destination?'': '') }}" id="thumbnail" placeholder="" maxlength="30" {{ $destination?'':'required' }}>
            </div>
            @if($errors->has('thumbnail'))
            <label class="error" for="thumbnail">{{$errors->first('thumbnail')}}</label>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-success mr-2" type="submit">Save {{Str::lower($title)}}</button>
            <a class="btn btn-warning" href="{{ route('backoffice.destination.index') }}">Cancel</a>
        </div>
    </div>
</form>