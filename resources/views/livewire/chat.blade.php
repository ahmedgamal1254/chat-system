<div class="card-body msg_card_body" id="msg" wire:poll.1s>
    @foreach ($messages as $msg)
        @if (Auth::id() == $msg->user_send)
            <div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                    @if ($msg->gender == 1)
                        <img src="{{ asset("images/male.jpg") }}" class="rounded-circle user_img_msg">
                    @else
                        <img src="{{ asset("images/female.jpg") }}" class="rounded-circle user_img_msg">
                    @endif
                </div>
                <div class="msg_cotainer">
                    {{ $msg->text }}
                    @if ($msg->file != null)
                        @if (in_array(pathinfo($msg->file)['extension'],['png','jpg','jpeg']))
                            <img width="300" height="200" src="{{ asset('storage/uploads/'. $msg->file) }}" alt="">
                        @endif

                        @if (in_array(pathinfo($msg->file)['extension'],['mp4']))
                            <video width="300" height="200" src="{{ asset('storage/uploads/'. $msg->file) }}" controls></video>
                        @endif

                        @if (in_array(pathinfo($msg->file)['extension'],['pdf']))
                            <embed width="300" height="200" src="{{ asset('storage/uploads/'. $msg->file) }}" type="pdf">
                        @endif
                    @endif
                    <span class="msg_time">9:07 AM, Today</span>
                </div>
            </div>
        @else
            <div class="d-flex justify-content-end mb-4">
                <div class="msg_cotainer_send">
                    {{ $msg->text }}
                    @if ($msg->file != null)
                        @if (in_array(pathinfo($msg->file)['extension'],['png','jpg','jpeg']))
                            <img width="300" height="200" src="{{ asset('storage/uploads/'. $msg->file) }}" alt="">
                        @endif

                        @if (in_array(pathinfo($msg->file)['extension'],['mp4']))
                            <video width="300" height="200" src="{{ asset('storage/uploads/'. $msg->file) }}" controls></video>
                        @endif

                        @if (in_array(pathinfo($msg->file)['extension'],['pdf']))
                            <embed width="300" height="200" src="{{ asset('storage/uploads/'. $msg->file) }}">
                        @endif
                    @endif
                    <span class="msg_time_send">9:10 AM, Today</span>
                </div>
                <div class="img_cont_msg">
                    @if ($msg->gender == 1)
                        <img src="{{ asset("images/male.jpg") }}" class="rounded-circle user_img_msg">
                    @else
                        <img src="{{ asset("images/female.jpg") }}" class="rounded-circle user_img_msg">
                    @endif
                </div>
            </div>
        @endif
    @endforeach
</div>

