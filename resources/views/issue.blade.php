@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  {{ json_encode($issue) }}
                  <br><br><br><br><br><br><br>
                    ID: {{ $issue['id'] }}
                    <br>
                    Title: {{ ($issue['subject'])['title'] }}
                    <br>
                    URL: {{ ($issue['subject'])['url'] }}
                    <br>
                    Type: {{ ($issue['subject'])['type'] }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
