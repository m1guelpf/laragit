@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Issue</div>

                <div class="panel-body">
                  {{ json_encode($issue) }}
                  <br><br><br><br><br><br><br>
                  <h3 style="text-align:center">{{ $issue['title'] }}</h3>
                <span class="state state-open">Open</span>
                    <a href="{{ ($issue['user'])['html_url'] }}" target="_blank"><span class="tooltipped tooltipped-s border p-2 mb-2 mr-2 left" aria-label="{{ ($issue['user'])['login'] }}"><img src="{{ ($issue['user'])['avatar_url'] }}" alt="{{ ($issue['user'])['login'] }}" style="width:50px; heigth:50px; border-radius:50%"></span></a>
                    <br>
                    Body: {!! $issue['body'] !!}
                    <br>
                    URL: {{ $issue['html_url'] }}
                    <br>
                    State: {{ $issue['state'] }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
