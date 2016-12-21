@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  {{ json_encode($pullRequest) }}
                  <br><br><br><br><br><br>
                    ID: {{ $pullRequest['id'] }}
                    <br>
                    State: {{ $pullRequest['state'] }}
                    <br>
                    URL: {{ $pullRequest['html_url'] }}
                    <br>
                    Title: {{ $pullRequest['title'] }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
