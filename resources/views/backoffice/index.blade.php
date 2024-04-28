@extends('backoffice._layout.main',['data_table' => true])

@push('title','Dashboard')

@push('included-styles')
<style>
	.widget-2:after {
		background-image: url("{{asset('web/assets/images/PSU_dashboard.jpg')}}")!important;
	}
	.widget-1:after {
		background-image: url("{{asset('web/assets/images/PSU_graduates.jpg')}}")!important;
	}
	.card.full-height {
		height: unset!important;
	}
	.full-height {
		height: unset!important;
	}
	.m-t-3{
		margin-top: 3px;
	}
	#calendar{
		padding: 10px;
		background-color: #fff;
		border: 1px solid rgba(0,0,0,.125);
	}
</style>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
@endpush

@push('content')
<div class="content sm-gutter">
	<div class="container-fluid padding-25 sm-padding-10">
		<div class="row">
			<div class="col-md-6">
				<div id='calendar'></div>
				<a href="{{ route('index') }}" class="btn btn-default m-t-20"><i class="fa fa-home"></i> Go to Homepage</a>
			</div>
			<div class="col-md-6">
				<div class="row">
					@if(in_array(auth()->user()->type, ['admin', 'super_user']))
					<div class="col-md-6 text-center">
						<div class="card">
							<div class="card-header">
								<h4>No. of Registered Tour Guides</h4>
							</div>
							<div class="card-body">
								<h5>{{ $tourGuideCount }}</h5>
							</div>
						</div>
					</div>
					<div class="col-md-6 text-center">
						<div class="card">
							<div class="card-header">
								<i></i>
								<h4>No. of Registered Tourist</h4>
							</div>
							<div class="card-body">
								<h5>{{ $touristCount }}</h5>
							</div>
						</div>
					</div>
					@endif
				</div>
				<div class="p-3 bg-white b-1">
					<div class="row">
						<div class="col-md-8 col-xs-6">
							Bookings
						</div>
					</div>
				</div>
				<hr>
				<div class="table-responsive">
					<table class="table table-hover table-condensed table-striped" id="condensedTable">
						<tbody>
							<tr>
								<td class="v-align-middle bold" width="10%">#</td>
								<td class="v-align-middle bold" width="25%">Tourist Detail</td>
								<td class="v-align-middle bold" width="25%">Tour Name</td>
								<td class="v-align-middle bold" width="20%">Price</td>
								<td class="bold" width="20%">Status</td>
								<td class="v-align-middle bold text-right" width="15%">Actions</td>
							</tr>
							@forelse($bookings as $index => $book)
							<tr>
								<td>{{$index+1}}</td>
								<td class="v-align-middle">
									<strong>{{$book->fname}} {{$book->lname}}</strong><br>
									<a href="mailto:{{$book->email}}">{{$book->email}}</a><br>
									<a href="tel:{{$book->contact_number}}">{{$book->contact_number}}</a><br>
								</td>
								<td class="v-align-middle"><a href="{{ route('tour.detail', $book->tour->id) }}" target="_blank">{{ Str::limit($book->tour->name, 30) }}</a></td>
								<td class="v-align-middle">₱ {{number_format($book->tour->price, 2)}}</td>
								<td>{{$book->status}}</td>
								<td class="text-right">
									<a class="btn btn-default btn-rounded btn-xs btn-edit"
									title="Edit" href="{{ route('backoffice.booking.view', $book->id) }}">
										<i class="fa fa-pencil"></i>
									</a>
								</td>
							</tr>
							@empty
							<tr>
								<td colspan="6" class="text-center">
									No bookings yet...
								</td>
							</tr>
							@endforelse
						</tbody>
						@if($bookings->count() > 0)
						<tfoot>
							<tr>
								<th colspan="4">
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
	</div>
</div>
@endpush

@push('included-scripts')

<script>

	document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        
        var calendar = new FullCalendar.Calendar(calendarEl, {
            timeZone: 'Asia/Singapore',
            themeSystem: 'bootstrap5',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            dayMaxEvents: true, // allow "more" link when too many events
            events: {!! $calendar !!}
        });
        
        calendar.render();
    });

</script>
@endpush

@push('modal-delete')
<i class="pg pg-trash_line big-icon"></i>
<h5>You are about to <span class="semi-bold text-danger">delete</span> a <span class="semi-bold text-success">Loan Application</span>, do you want to proceed?</h5>
<br>
<a href="" class="btn btn-success btn-block continue-delete">Continue</a>
<button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel</button>
@endpush

@push('js')
<script type="text/javascript">
	$(function() {
		$(".page-load").hide();
	});
</script>
<script type="text/javascript">
$(function() {

	$(".btn-delete").on("click",function(){
        $(".continue-delete").attr("href",$(this).data('url'));
    });

});
</script>
@endpush
