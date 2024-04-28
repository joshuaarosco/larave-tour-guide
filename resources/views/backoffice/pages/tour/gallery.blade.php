@extends('backoffice._layout.main',['data_table' => true])

@push('title',$title.' Gallery')

@push('included-styles')
<link rel="stylesheet" href="{{asset('assets/plugins/text-editor/res/style.css')}}" />
<link rel="stylesheet" href="{{asset('assets/plugins/text-editor/richtexteditor/rte_theme_default.css')}}" />
<script type="text/javascript" src="{{asset('assets/plugins/text-editor/richtexteditor/rte.js')}}"></script>
<script>RTE_DefaultConfig.url_base="{{asset('assets/plugins/text-editor/richtexteditor')}}"</script>
<script type="text/javascript" src="{{asset('assets/plugins/text-editor/richtexteditor/plugins/all_plugins.js')}}"></script>
@endpush

@push('css')
<link href="{{asset('assets/plugins/dropzone/css/dropzone.css')}}" rel="stylesheet" type="text/css" />
<style>
    .pic-upload{
        border: 1px dashed gray;
        width: 100%;
        height: 150px;
        opacity: 0;
        padding: 20px;
    }
    .dropzone{
        min-height: 100px;
    }
    .upload-zone{
        border: 1px dashed gray;
        width: 100%;
        height: 150px;
    }
    .choose-pic{
        position: relative;
        width: 100%;
        text-align: center;
    }
    .choose-pic > span{
        position: absolute;
        top: 65px;
        width: 100%;
    }
    .img-preview {
        /* display: none;  */
        width: 100%;   
        margin-bottom: 20px;
        border: 1px dashed gray;
        height: auto; 
    }
    .img-preview img {  
        width: 100%;
        height: auto; 
        display: block;   
    }
    .gallery-pic{
        width: 100%;   
        margin-bottom: 20px;
        border: 1px solid gray;
        height: auto; 
    }
    .gallery-pic img{  
        width: 100%;
        height: auto; 
        display: block;   
    }
    .x-btn{
        position: absolute;
        right: 10px;
        top: 10px; 
    }
</style>
@endpush

@push('content')
<div class="content sm-gutter">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('backoffice.index')}}">Home</a></li>
            <li class="breadcrumb-item active">{{Str::title($title)}} Gallery</li>
        </ol>
        <div class="row" id="gallery-img">
            <div class="col-lg-3 col-lg-4 col-sm-6">
                <div class="card card-default">
                    <div class="card-header ">
                        <div class="card-title">
                            <p class="mw-80"><strong>{{ $tour->name }}</strong> <br>Tour Gallery</p>
                        </div>
                    </div>
                    <div class="card-body no-scroll no-padding">
                        <form action="" class="dropzone no-margin" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="upload-zone">
                                        <div class="choose-pic">
                                            <span>+ Choose Pictures</span>
                                            <input name="pic[]" type="file" id="choose-file" class="pic-upload" multiple required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-default m-t-20" type="Submit">Upload</button>
                            <div class="m-t-20">
                                <i class="text-danger">* Make sure to press the upload button everytime you select images...</i><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @foreach($pictures as $index => $pic)
            <div class="col-lg-3 col-lg-4 col-sm-6">
                <a href="#" 
                    class="btn btn-xs x-btn btn-rounded btn-danger btn-delete"
                    data-url="{{route('backoffice.tour.gallery_delete',[$tour->id, $pic->id])}}"
                    data-toggle="modal"
                    data-target="#delete">
                    <i class="fa fa-times"></i>
                </a>
                <img class="gallery-pic" src="{{ asset($pic->thumbnail()) }}" />
            </div>
            @endforeach
        </div>
    </div>
</div>
@endpush

@push('modal-delete')
<i class="pg pg-trash_line big-icon"></i>
<h5>You are about to <span class="semi-bold text-danger">delete</span> a <span class="semi-bold text-success">gallery picture</span>, do you want to proceed?</h5>
<br>
<a href="" class="btn btn-success btn-block continue-delete">Continue</a>
<button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel</button>
@endpush

@push('included-scripts')

@endpush

@push('js')
<script type="text/javascript" src="{{ asset('assets/plugins/dropzone/dropzone.min.js') }}"></script>
<script>
    const chooseFile = document.getElementById("choose-file");
    chooseFile.addEventListener("change", function () {
        getImgData();
    });

    function getImgData() {
        const files = chooseFile.files;
        console.log(files);
        $.each( files, function( index, file ){
            console.log("value ==>> "+ file);

            const fileReader = new FileReader();
            fileReader.readAsDataURL(file);
            fileReader.addEventListener("load", function () {
                $("#gallery-img").append('<div class="col-lg-3 col-lg-4 col-sm-6"><img class="img-preview" src="'+this.result+'" /></div>');
                console.log(this.result);
            });
        });
    }

    $(".btn-delete").on("click",function(){
        $(".continue-delete").attr("href",$(this).data('url'));
    });

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

