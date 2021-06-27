<div class="card-body contacts_body" wire:poll.100s>
    <ul class="contacts">
        @forelse ($users as $user)
            @if ($user->active == 1)
                <li class="active">
                    <a href="{{ url('chat',$user->id) }}">
                        <div class="d-flex bd-highlight">
                            <div class="img_cont">
                                @if ($user->gender == 1)
                                    <img src="{{ asset("images/male.jpg") }}" class="rounded-circle user_img">
                                @else
                                    <img src="{{ asset("images/female.jpg") }}" class="rounded-circle user_img">
                                @endif
                                {{-- <span class="rounded-circle user_img"></span> --}}
                                <span class="online_icon"></span>
                            </div>
                            <div class="user_info">
                                <span>{{ $user->name }}</span>
                                <p>{{ $user->name }} is online</p>
                            </div>
                        </div>
                    </a>
                </li>
            @else
                <li>
                    <a href="{{ url('chat',$user->id) }}">
                        <div class="d-flex bd-highlight">
                            <div class="img_cont">
                                @if ($user->gender == 1)
                                    <img src="{{ asset("images/male.jpg") }}" class="rounded-circle user_img">
                                @else
                                    <img src="{{ asset("images/female.jpg") }}" class="rounded-circle user_img">
                                @endif
                            </div>
                            <div class="user_info">
                                <span>{{ $user->name }}</span>
                                <p>{{ $user->name }} left 
                                    {{ \Carbon\Carbon::parse($user->logout_date)->diffForHumans() }}</p>
                            </div>
                        </div>
                    </a>
                </li>
            @endif
        @empty
            
        @endforelse
    </ul>
</div>
