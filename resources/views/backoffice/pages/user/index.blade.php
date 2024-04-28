@extends('backoffice._layout.main',['data_table' => true])

@push('title',$title.' List')

@push('included-styles')
@endpush

@push('css')
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
                        @if($title == 'Admin')
                        <button class="btn btn-success btn-create btn-xs md-hidden" data-toggle="modal" data-target="#create">
                            <i class="fa fa-plus"></i> Create
                        </button>
                        @endif
                    </div>
                </div>
                <div class="col-md-2 sm-hidden">
                    {{-- <button class="btn btn-default btn-block btn-xs table-btn">
                        <i class="fa fa-filter"></i>&nbsp;Filter
                    </button> --}}
                </div>
                <div class="col-md-2 sm-hidden">
                    @if($title == 'Admin')
                    <button class="btn btn-success btn-create btn-block btn-xs table-btn" data-toggle="modal" data-target="#create">
                        <i class="fa fa-plus"></i>&nbsp;Create
                    </button>
                    @endif
                </div>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-hover table-condensed table-striped" id="condensedTable">
                <tbody>
                    <tr>
                        <td class="v-align-middle bold" width="5%">#</td>
                        <td class="v-align-middle bold" width="20%">Name</td>
                        <td class="v-align-middle bold" width="15%">Type</td>
                        <td class="v-align-middle bold" width="45%">Contact Details</td>
                        <td class="v-align-middle bold" width="20%">Created At</td>
                        @if($title == 'Tour Guide')
                        <td class="v-align-middle bold" width="25%">Featured</td>
                        @endif
                        @if($title == 'Admin')
                        <td class="v-align-middle bold text-right" width="15%">Actions</td>
                        @endif
                    </tr>
                    @forelse($users as $index => $user)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td class="v-align-middle">{{$user->fname}} {{$user->mname}} {{$user->lname}}</td>
                        <td class="v-align-middle">{{$user_types[$user->type]}}</td>
                        <td> <a href="mailto:{{$user->email}}">{{$user->email}}</a> | <a href="tel:{{$user->contact_number}}">{{$user->contact_number}}</a> </td>
                        <td class="v-align-middle">{{date('M d, Y @ h:s A',strtotime($user->created_at))}}</td>
                        @if($title == 'Tour Guide')
                        <td class="v-align-middle">
                            {{ $user->tourGuide->is_featured?'Yes':'No' }}
                            <a href="{{ route('backoffice.user.is_featured', $user->tourGuide->id) }}" class="btn btn-default btn-xs pull-right">Set to {{ $user->tourGuide->is_featured?'No':'Yes' }}</a>
                        </td>
                        @endif
                        @if($title == 'Admin')
                        <td class="text-right">
                            <!-- <a
                            class="btn btn-default btn-rounded btn-xs"
                            title="view" href="{{route('backoffice.user.view',$user->id)}}">
                                <i class="fa fa-eye"></i>
                            </a> -->
                            <button
                            class="btn btn-default btn-rounded btn-xs btn-edit"
                            title="Edit" data-id="{{$user->id}}"
                            data-toggle="modal"
                            data-target="#edit">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <button
                            class="btn btn-warning btn-rounded btn-xs btn-delete"
                            title="Delete"
                            data-url="{{route('backoffice.user.delete',$user->id)}}"
                            data-toggle="modal"
                            data-target="#delete">
                                <i class="fa fa-times"></i>
                            </button>
                        </td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="{{$title == 'Admin'?'6':'5'}}" class="text-center">
                            No {{Str::lower(Str::plural($title))}} data yet...
                        </td>
                    </tr>
                    @endforelse
                </tbody>
                @if($users->count() > 0)
                <tfoot>
                    <tr>
                        <th colspan="{{$title == 'Admin'?'6':'5'}}">
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
<form method="POST" action="" id="form-personal" enctype="multipart/form-data" role="form" autocomplete="off">
    @csrf
    @include('backoffice.pages.user._components.form')
    <div class="clearfix"></div>
    <button class="btn btn-success mr-2" type="submit">Create a new {{Str::lower($title)}}</button>
    <button class="btn btn-warning" data-dismiss="modal">Close</button>
</form>
@endpush

@push('modal-edit')
<form method="POST" action="{{route('backoffice.user.update')}}" enctype="multipart/form-data" id="" role="form" autocomplete="off">
    @csrf
    <input type="hidden" name="id" class="{{Str::lower($title)}}-id">
    @include('backoffice.pages.user._components.form')
    <div class="clearfix"></div>
    <button class="btn btn-success mr-2" type="submit">Save</button>
    <button class="btn btn-warning" data-dismiss="modal">Close</button>
</form>
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
@endpush

@push('js')
<script type="text/javascript">
$(function() {
    $(".btn-edit").on("click",function(){
        $(".load-modal").show();
        let id = $(this).data('id');
        $.ajax({
            type: "POST",
            url: "{{route('backoffice.user.edit')}}",
            data: { _id : id , _token : "{{csrf_token()}}" },
            dataType: "json",
            async: true,
            success: function(data){
                const {
                    id,
                    type,
                    fname,
                    mname,
                    lname,
                    email,
                    contact_number,
                } = data.datas;
                console.log(data.datas.id);
                $(".admin-id").val(id);
                $(".admin-type").val(type);
                $(".admin-fname").val(fname);
                // $(".admin-mname").val(mname);
                $(".admin-lname").val(lname);
                $(".admin-email").val(email);
                $(".admin-contact_number").val(contact_number);
                $(".load-modal").hide();
            },
            error: function(error){
                console.log(error);
            }
        });
    });
    $(".btn-create").on("click",function(){
        $(".admin-id").val('');
        $(".admin-type").val('');
        $(".admin-fname").val('');
        // $(".admin-mname").val('');
        $(".admin-lname").val('');
        $(".admin-email").val('');
        $(".admin-contact_number").val('');
        $(".load-modal").hide();
    });
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

