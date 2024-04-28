@extends('frontend.web._layouts.main',['header' => false])
@push('title', 'Messages')

@push('css')
<link rel="stylesheet" href="{{asset('assets/css/messages.css')}}">
<style>
    #preloader{
        display: none;
    }
    .profile-img{
        height: 40px;
        width: 40px;
        border-radius: 50%;
        background: url("{{asset('assets/img/profiles/avatar.jpg')}}") no-repeat center;
        background-size: contain;
    }
    .back{
        display:none;
    }
    .msg_history::-webkit-scrollbar {
        display: none;
    }
    .msg_history {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }
    .inbox_chat::-webkit-scrollbar {
        display: none;
    }
    .inbox_chat {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }
    .mesgs{
        padding-left: 0px;
        padding-right: 0px;
    }
    .msg_history{
        padding-left: 15px;
        padding-right: 15px;
    }
    .msg_send_btn{
        margin-right: 15px;
    }
    @media screen and (max-width: 500px) {
        .inbox_people,
        .mesgs {
            width: 100%;
        }
        .back{
            display:block;
            padding: 20px;
            border-bottom: 1px solid #c4c4c4;
        }
        .mesgs {
            padding-top: 0px;
        }
    }
</style>
@if($message)
<style>
    @media screen and (max-width: 500px) {
        .inbox_people{
            display:none;
        }
        .incoming_msg_img{
            width: 10%;
        }
        .received_msg{
            width: 80%;
        }
    }
</style>
@else
<style>
    @media screen and (max-width: 500px) {
        .placeholder-msg{
            display: none;
        }
    }
</style>
@endif
@endpush

@push('content')
<!-- Body main wrapper start -->
<main>
    <section class="bd-tour-grid-area section-space fix flash-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="messaging">
                        <div class="inbox_msg bg-white">
                            <div class="inbox_people">
                                <div class="headind_srch">
                                    <div class="recent_heading">
                                        <h4>Recent Messages</h4>
                                    </div>
                                </div>
                                <div class="inbox_chat">
                                    @forelse($messages as $index => $msg)
                                    <a href="{{ route('messages.thread', $msg->id) }}">
                                    <div class="chat_list {{ $message? ($message->id == $msg->id?'active_chat':''):''  }}">
                                        <div class="chat_people">
                                            <div class="chat_img">
                                                <div class="profile-img">
                                                </div>
                                            </div>
                                            <div class="chat_ib">
                                                @if(auth()->user()->type == 'tourist')
                                                <h5>{{ $msg->tourGuide->fname }} {{ $msg->tourGuide->lname }} <span class="chat_date"> {{ date('h:i A',strtotime($msg->updated_at)) }} | {{ Logic::isToday($msg->updated_at, 'M d') }}</span></h5> 
                                                @else
                                                <h5>{{ $msg->tourist->fname }} {{ $msg->tourist->lname }} <span class="chat_date">{{ date('h:i A',strtotime($msg->updated_at)) }} | {{ Logic::isToday($msg->updated_at, 'M d') }}</span></h5> 
                                                @endif
                                                <p>{{$msg->threadRecent()?Str::limit($msg->threadRecent()->message, 80):'...'}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                    @empty
                                    <div style="padding: 20px; height: 100%; text-align: center;">
                                        <p>~ No Messages Yet ~</p>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                            @if($message)
                            <div class="back">
                                <a href="{{ route('messages.index') }}"><i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                            <div class="mesgs">
                                <div class="msg_history">
                                    @if($message->thread)
                                    @foreach($message->thread as $index => $msg_content)
                                    @if($msg_content->sender_id == auth()->user()->id)
                                    <div class="outgoing_msg">
                                        <div class="sent_msg">
                                        <p>{{ $msg_content->message }}</p>
                                        <span class="time_date"> {{ date('h:i A',strtotime($msg_content->created_at)) }} | {{ Logic::isToday($msg_content->created_at, 'M d, Y') }}</span> </div>
                                    </div>
                                    @else
                                    <div class="incoming_msg">
                                        <div class="incoming_msg_img"> 
                                            <div class="profile-img">
                                            </div>
                                        </div>
                                        <div class="received_msg">
                                            <div class="received_withd_msg">
                                                <p>{{ $msg_content->message }}</p>
                                                <span class="time_date"> {{ date('h:i A',strtotime($msg_content->created_at)) }} | {{ Logic::isToday($msg_content->created_at, 'M d, Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    @endif
                                    </div>
                                    <div class="type_msg">
                                        <div class="input_msg_write">
                                            <form action="" method="POST">
                                                {{ csrf_field() }}
                                                <input type="text" name="message" class="write_msg" placeholder="Type a message" required/>
                                                <button class="msg_send_btn" type="submit">
                                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="placeholder-msg" style="padding: 20px; height: 100%; text-align: center; margin-top: 200px;">
                                <p>~ Select a Message Thread ~</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- Body main wrapper end -->
@endpush