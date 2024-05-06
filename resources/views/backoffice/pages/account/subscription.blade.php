@extends('backoffice._layout.main',['data_table' => true])

@push('title',$title.' Subscription')

@push('included-styles')
<link href="{{asset('assets/plugins/dropzone/css/dropzone.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{asset('assets/plugins/text-editor/res/style.css')}}" />
<link rel="stylesheet" href="{{asset('assets/plugins/text-editor/richtexteditor/rte_theme_default.css')}}" />
<script type="text/javascript" src="{{asset('assets/plugins/text-editor/richtexteditor/rte.js')}}"></script>
<script>RTE_DefaultConfig.url_base="{{asset('assets/plugins/text-editor/richtexteditor')}}"</script>
<script type="text/javascript" src="{{asset('assets/plugins/text-editor/richtexteditor/plugins/all_plugins.js')}}"></script>
@endpush

@push('css')
<style>
    .profile-img-wrapper{
        height: 150px!important;
        width: 150px!important;
    }
    .center{
        display: flex!important;
        justify-content: center!important;
    }
    .m-t-50{
        margin-top: 50px;
    }
    .avatar-upload{
        border: 1px solid rgba(0, 0, 0, 0.07);
        border-radius: 3px;
        padding: 15px;
    }
    .editor{
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
            <li class="breadcrumb-item active">Subscription</li>
        </ol>
        <div class="row">
            <div class="col-md-5">
                <div class="card card-transparent">
                    <div class="card-body no-padding">
                        <div id="card-advance" class="card card-default">
                            <div class="card-header  ">
                                <div class="card-title">
                                @if(auth()->user()->validity_date < date('Y-m-d'))
                                <span class="text-danger">You are not Subscribe : {{auth()->user()->validity_date}}</span>
                                @else
                                <span class="text-success">Thank you for your subscription : {{auth()->user()->validity_date}}</span>
                                @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <h3>
                                    <span class="semi-bold">Subscription</span> Detail
                                    <br>
                                    <h5>
                                        <ul>
                                            <li>
                                                200 PHP for Monthly Subscrpition
                                            </li>
                                            <li>
                                                2400 PHP for Yearly Subscrpition
                                            </li>
                                        </ul>
                                    </h5>
                                    Please settle your payment here on GCASH # 09163052933
                                </h3>
                                <br>
                                <br>
                                <hr>
                                <br>
                                <p>Please upload your proof of payment to subcribe.</p>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                </div>
                                                <div class="col-md-4">
                                                </div>
                                            </div>
                                            <hr class="m-t-20">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3></h3>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="file" name="file" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button class="btn btn-success pull-right m-t-20" type="submit">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
    <script src="{{asset('assets/plugins/bootstrap-form-wizard/js/jquery.bootstrap.wizard.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{asset('assets/js/form_wizard.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/dropzone/dropzone.min.js')}}"></script>
    <script src="{{asset('assets/js/form_elements.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/form_layouts.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/text-editor/res/patch.js') }}"></script>
    <script type="text/javascript">
        
        $(function() {
            $(".page-load").hide();
        });
    </script>
@endpush
