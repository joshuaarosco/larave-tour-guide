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
                        <td class="v-align-middle bold" width="20%">Tour</td>
                        <td class="v-align-middle bold" width="20%">Tourist</td>
                        <td class="v-align-middle bold" width="30%">Contact Details</td>
                        <td class="v-align-middle bold" width="20%">Preferred Date</td>
                        <td class="v-align-middle bold" width="30%">Start - End</td>
                        <td class="v-align-middle bold" width="15%">Status</td>
                        <td class="v-align-middle bold text-right" width="15%">Action</td>
                    </tr>
                    @forelse($bookings as $index => $booking)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td class="v-align-middle"><a href="{{ route('tour.detail', $booking->tour->id) }}" target="_blank">{{ Str::limit($booking->tour->name, 35) }}</a></td>
                        <td class="v-align-middle">{{$booking->fname}} {{$booking->mname}} {{$booking->lname}}</td>
                        <td> <a href="mailto:{{$booking->email}}">{{$booking->email}}</a> | <a href="tel:{{$booking->contact_number}}">{{$booking->contact_number}}</a> </td>
                        <td class="v-align-middle">{{date('M d, Y @ h:s A',strtotime($booking->date))}}</td>
                        <td class="v-align-middle">
                            Start @ {{ $booking->start?date('M d, Y @ h:s A',strtotime($booking->start)):'--- --, ---- @ --:-- -'}} <br>
                            End @ {{ $booking->end? date('M d, Y @ h:s A',strtotime($booking->end)):'--- --, ---- @ --:-- -'}}</td>
                        <td class="v-align-middle">{{$booking->status}}</td>
                        <td class="text-right">
                            <a
                            class="btn btn-default btn-rounded btn-xs btn-edit"
                            title="Edit" href="{{ route('backoffice.booking.view', $booking->id) }}">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">
                            No {{Str::lower(Str::plural($title))}} data yet...
                        </td>
                    </tr>
                    @endforelse
                </tbody>
                @if($bookings->count() > 0)
                <tfoot>
                    <tr>
                        <th colspan="8">
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
@endpush

@push('js')
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

