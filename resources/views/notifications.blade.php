@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Notifications</div>

                <div class="panel-body">
                    @foreach ($notifications as $notification)
                    <a href="{{ url('notification/')."/".$notification['id'] }}" target="_blank">{{ ($notification['subject'])['title'] }}</a>
                    <br><br><br><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
