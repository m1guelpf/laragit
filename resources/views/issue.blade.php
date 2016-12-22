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
                <button class="btn btn-primary" type="button">Primary button</button>
                    <a href="{{ ($issue['user'])['html_url'] }}" target="_blank"><img src="{{ ($issue['user'])['avatar_url'] }}" alt="{{ ($issue['user'])['login'] }}" title="{{ ($issue['user'])['login'] }}"style="width:50px; heigth:50px; border-radius:50%"></a>
                    ID: {{ $issue['id'] }}
                    <br>
                    Title: {{ $issue['title'] }}
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
