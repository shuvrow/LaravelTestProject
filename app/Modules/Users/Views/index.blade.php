@extends('layouts.master')

@section('content')
    @if((session('msg')))
        <b>{!! session('msg') !!}</b>

    @endif
@endsection
@section('script')
    <script type="text/javascript">

        var messages='{!!$messages->count()!!}';
        var notifications='{!! $notifications->count() !!}';

        setInterval(function() {
            var active_user_info=$.get('{!!url("updatedUserProfile")!!}',{user_id:"{!!session('active_user_id')!!}"});
            active_user_info.done(function(data){

                if(messages<data['messages'])
                {

                    $('.messageCount').html(data['messages']);

                    for (var count = messages-1, len = data['messageList'].length; count < len; count++) {

                        $('.showMessage').append('<li><a href="#">' +
                        '<div class="pull-left"><img class="img-circle" alt="User Image" src='+'{!! asset("dist/img/user5-128x128.jpg")!!}'+'></div>' +
                        '<p>'+data['messageList'][count]+'</p></a></li>')

                    }

                }
                messages=data['messages'];
            });
            active_user_info.fail(function(){
                alert('IQ over -200  !!!');
            });
        }, 5000);

    </script>
    @endsection
