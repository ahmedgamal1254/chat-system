@extends('layouts.layout')
@section('content')
    <div class="container-fluid h-100">
        <div class="row justify-content-center h-100">
            <div class="col-md-4 col-xl-3 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">
                <div class="card-header">
                    <div class="input-group">
                        <input type="text" placeholder="Search..." name="" class="form-control search">
                        <div class="input-group-prepend">
                            <span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                </div>
                @livewire('freind')
                <div class="card-footer"></div>
            </div></div>
            <div class="col-md-8 col-xl-6 chat">
                <div class="card">
                    @livewire('freind-chat', ['user' => $user,'user_id' => $user_id])
                    @livewire('chat',  ['user_id' => $user_id]))
                    <div class="card-footer">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                            </div>
                            <textarea name="" class="form-control type_msg" placeholder="Type your message..."></textarea>
                            <div class="input-group-append">
                                <span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function gotoBottom(id){
            var element = document.getElementById(id);
            element.scrollTop = element.scrollHeight - element.clientHeight;
        }

        gotoBottom('msg')
    </script>
@endsection