@extends('backoffice._layout.main',['data_table' => true])

@push('title',$title.' Creation')

@push('included-styles')
<link rel="stylesheet" href="{{asset('assets/plugins/text-editor/res/style.css')}}" />
<link rel="stylesheet" href="{{asset('assets/plugins/text-editor/richtexteditor/rte_theme_default.css')}}" />
<script type="text/javascript" src="{{asset('assets/plugins/text-editor/richtexteditor/rte.js')}}"></script>
<script>RTE_DefaultConfig.url_base="{{asset('assets/plugins/text-editor/richtexteditor')}}"</script>
<script type="text/javascript" src="{{asset('assets/plugins/text-editor/richtexteditor/plugins/all_plugins.js')}}"></script>
@endpush

@push('css')
<style>
    .add-tour-image{
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
    .editor-activity{
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
            <div class="col-md-8">
                <div class="card">
                    <!-- <div class="card-header ">
                        <div class="card-title">Create Destination</div>
                    </div> -->
                    <div class="card-body">
                        <h2 class="mw-80">{{ $tour? 'Update':'Create' }} Tour</h2>
                        <p class="fs-16 mw-80 m-b-40">Make an appealing content about the details of the tour. <br>
                        <i class="text-danger">* Please change the content based on tour details.</i>
                        </p>
                        @include('backoffice.pages.tour._components.form')
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

    var editor2cfg = {}
    editor2cfg.toolbar = "basic";
    var editor2 = new RichTextEditor(".editor-activity", editor2cfg);

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

