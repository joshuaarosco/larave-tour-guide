@extends('backoffice._layout.main',['data_table' => true])

@push('title',$title.' List')

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
        height: 100px;
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
            <li class="breadcrumb-item active">{{Str::title($title)}} List</li>
        </ol>
        <div class="p-3 bg-white b-1">
            <div class="row">
                <div class="col-md-8 col-xs-6">
                    {{Str::upper($title)}} LIST
                    <div class="pull-right table-btn">
                        {{-- <button class="btn btn-default btn-xs md-hidden mr-1">
                            <i class="fa fa-filter"></i> Filter
                        </button> --}}
                        <a class="btn btn-success btn-create btn-xs md-hidden" href="{{ route('backoffice.tour.create') }}">
                            <i class="fa fa-plus"></i> Create
                        </a>
                    </div>
                </div>
                <div class="col-md-2 sm-hidden">
                    {{-- <button class="btn btn-default btn-block btn-xs table-btn">
                        <i class="fa fa-filter"></i>&nbsp;Filter
                    </button> --}}
                </div>
                <div class="col-md-2 sm-hidden">
                    <a class="btn btn-success btn-create btn-block btn-xs table-btn" href="{{ route('backoffice.tour.create') }}">
                        <i class="fa fa-plus"></i>&nbsp;Create
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-hover table-condensed table-striped" id="condensedTable">
                <tbody>
                    <tr>
                        <td class="v-align-middle bold" width="5%">#</td>
                        <td class="v-align-middle bold" width="15%">Thumbnail</td>
                        <td class="v-align-middle bold" width="20%">Name</td>
                        <td class="v-align-middle bold" width="20%">Destination</td>
                        <td class="v-align-middle bold" width="20%">Price</td>
                        <td class="v-align-middle bold text-right" width="15%">Actions</td>
                    </tr>
                    @forelse($tours as $index => $tour)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td class="v-align-middle"><img src="{{$tour->thumbnail()}}" alt="" class="prod-img"></td>
                        <td class="v-align-middle">{{$tour->name}}</td>
                        <td class="v-align-middle">{{$tour->destination->name}}</td>
                        <td class="v-align-middle">₱ {{number_format($tour->price, 2)}}</td>
                        <td class="text-right">
                            <a
                            class="btn btn-default btn-rounded"
                            title="view" href="{{route('backoffice.tour.gallery',$tour->id)}}">
                                <i class="fa fa-image"></i> &nbsp; Gallery
                            </a>
                            <a
                            class="btn btn-default btn-rounded btn-edit btn-xs"
                            title="Edit" href="{{ route('backoffice.tour.edit', $tour->id) }}">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <button
                            class="btn btn-warning btn-rounded btn-delete btn-xs"
                            title="Delete"
                            data-url="{{route('backoffice.tour.delete',$tour->id)}}"
                            data-toggle="modal"
                            data-target="#delete">
                                <i class="fa fa-times"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            No {{Str::lower(Str::plural($title))}} data yet...
                        </td>
                    </tr>
                    @endforelse
                </tbody>
                @if($tours->count() > 0)
                <tfoot>
                    <tr>
                        <th colspan="6">
                            <div class="row">
                                <div class="col-md-12">

                                </div>
                            </div>
                        </th>
                    </tr>
                </tfoot>
                @endif
            </table>
        </div>
    </div>
</div>
@endpush

@push('modal-create')
@endpush

@push('modal-edit')
@endpush

@push('modal-view')
@endpush


@push('modal-delete')
<i class="pg pg-trash_line big-icon"></i>
<h5>You are about to <span class="semi-bold text-danger">delete</span> a <span class="semi-bold text-success">{{Str::lower($title)}}</span>, do you want to proceed?</h5>
<br>
<a href="" class="btn btn-success btn-block continue-delete">Continue</a>
<button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel</button>
@endpush

@push('included-scripts')

<script>
    var editor1cfg = {}
    editor1cfg.toolbar = "basic";
    var editor1 = new RichTextEditor(".editor", editor1cfg);

    
    var editor1cfg_edit = {}
    editor1cfg_edit.toolbar = "basic";
    var editor1_edit = new RichTextEditor(".editor-edit", editor1cfg_edit);
</script>
@endpush

@push('js')
<script src="{{ asset('assets/plugins/text-editor/res/patch.js') }}"></script>
<script type="text/javascript">
$(function() {
    $(".btn-delete").on("click",function(){
        $(".continue-delete").attr("href",$(this).data('url'));
    });
    $(".page-load").hide();
});
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

