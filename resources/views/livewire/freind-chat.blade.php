<div class="card-header msg_head">
    <div class="d-flex bd-highlight">
        <div class="img_cont">
            @if ($user->gender == 1)
                <img src="{{ asset("images/male.jpg") }}" class="rounded-circle user_img">
            @else
                <img src="{{ asset("images/female.jpg") }}" class="rounded-circle user_img">
            @endif

            @if ($user->active == 1)
                <span class="online_icon"></span>
            @endif
        </div>
        <div class="user_info">
            <span>Chat with {{ $user->name }}</span>
            <p>{{ $count }} messages</p>

        </div>
        <div class="video_cam">
            <span><i class="fas fa-video"></i></span>
            <span><i class="fas fa-phone"></i></span>
        </div>
    </div>
    <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
    <div class="action_menu">
        <ul>
            <li><i class="fas fa-user-circle"></i> View profile</li>
            <li><i class="fas fa-ban"></i> Block</li>
        </ul>
    </div>
</div>