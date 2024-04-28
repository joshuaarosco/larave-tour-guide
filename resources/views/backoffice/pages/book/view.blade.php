@extends('backoffice._layout.main',['data_table' => true])

@push('title',$title.' Detail')

@push('included-styles')
<link rel="stylesheet" href="{{asset('assets/plugins/text-editor/res/style.css')}}" />
<link rel="stylesheet" href="{{asset('assets/plugins/text-editor/richtexteditor/rte_theme_default.css')}}" />
<script type="text/javascript" src="{{asset('assets/plugins/text-editor/richtexteditor/rte.js')}}"></script>
<script>RTE_DefaultConfig.url_base="{{asset('assets/plugins/text-editor/richtexteditor')}}"</script>
<script type="text/javascript" src="{{asset('assets/plugins/text-editor/richtexteditor/plugins/all_plugins.js')}}"></script>
@endpush

@push('css')
<style>
    .add-booking-image{
        width: 100%;
        border: 1px dashed #ccc;
        background: transparent;
    }
    .prod-img{
        /* width: 100px; */
        height: 200px;
        margin: 10px;
        margin-top: -10px;
        margin-left: -5px;
    }
    .editor{
        margin-bottom: 10px;
        height: 350px;
    }
    .editor-edit{
        margin-bottom: 10px;
        height: 350px;
    }
</style>
@endpush

@push('content')
<div class="content sm-gutter">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('backoffice.index')}}">Home</a></li>
            <li class="breadcrumb-item active">{{Str::title($title)}} Details</li>
        </ol>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="mw-80">Booking Detail</h2>
                        <form id="form-personal" role="form" autocomplete="off" method="POST" action="" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required {{$errors->has('tname')?'has-error':null}}">
                                        <label>Tour Name</label>
                                        <input type="text" class="form-control" value="{{ old('tname', $booking?$booking->tour->name: '') }}" id="tname" placeholder="" readonly>
                                    </div>
                                    @if($errors->has('tname'))
                                    <label class="error" for="tname">{{$errors->first('name')}}</label>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required {{$errors->has('name')?'has-error':null}}">
                                        <label>Tourist Name</label>
                                        <input type="text" class="form-control" value="{{ old('name', $booking?$booking->fname.' '.$booking->lname: '') }}" id="name" placeholder="" readonly>
                                    </div>
                                    @if($errors->has('name'))
                                    <label class="error" for="name">{{$errors->first('name')}}</label>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required {{$errors->has('contact')?'has-error':null}}">
                                        <label>Contact Number</label>
                                        <input type="text" class="form-control" value="{{ old('contact', $booking?$booking->contact_number: '') }}" id="contact" placeholder="" readonly>
                                    </div>
                                    @if($errors->has('contact'))
                                    <label class="error" for="contact">{{$errors->first('contact')}}</label>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required {{$errors->has('email')?'has-error':null}}">
                                        <label>Contact Number</label>
                                        <input type="email" class="form-control" value="{{ old('email', $booking?$booking->email: '') }}" id="email" placeholder="" readonly>
                                    </div>
                                    @if($errors->has('email'))
                                    <label class="error" for="email">{{$errors->first('email')}}</label>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required {{$errors->has('date')?'has-error':null}}">
                                        <label>Preferred Date</label>
                                        <input type="date" class="form-control" value="{{ old('date', $booking?$booking->date: '') }}" name="date" id="date" placeholder="">
                                    </div>
                                    @if($errors->has('date'))
                                    <label class="error" for="date">{{$errors->first('date')}}</label>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required {{$errors->has('start')?'has-error':null}}">
                                        <label>Start</label>
                                        <input type="datetime-local" class="form-control" value="{{ old('start', $booking?$booking->start: '') }}" name="start" id="start" placeholder="" required>
                                    </div>
                                    @if($errors->has('start'))
                                    <label class="error" for="start">{{$errors->first('start')}}</label>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required {{$errors->has('end')?'has-error':null}}">
                                        <label>End</label>
                                        <input type="datetime-local" class="form-control" value="{{ old('end', $booking?$booking->end: '') }}" name="end" id="end" placeholder="" required>
                                    </div>
                                    @if($errors->has('end'))
                                    <label class="error" for="end">{{$errors->first('end')}}</label>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required {{$errors->has('end')?'has-error':null}}">
                                        <label>Status</label>
                                        <select name="status" class="form-control" id="">
                                            @foreach($statuses as $status)
                                            <option value="{{$status}}" {{ $status == $booking->status?'selected':null }}>{{$status}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @if($errors->has('end'))
                                <label class="error" for="end">{{$errors->first('end')}}</label>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-success mr-2" type="submit">Save</button>
                                    <a class="btn btn-warning" href="{{ route('backoffice.booking.index') }}">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endpush

@push('included-scripts')

<script>
    var editor1cfg = {}
    editor1cfg.toolbar = "basic";
    var editor1 = new RichTextEditor(".editor", editor1cfg);

</script>
@endpush

@push('js')
<script src="{{ asset('assets/plugins/text-editor/res/patch.js') }}"></script>
<script>
    $(".page-load").hide();
</script>
@endpush

@push('css')
<style>
    .avatar{
        height: 70px;
        width: 70px;
    }
</style>
@endpush

