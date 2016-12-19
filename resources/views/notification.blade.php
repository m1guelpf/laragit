@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    {{ json_encode($notification) }}
                    <br><br><br><br>
                    ID: {{ $notification['id'] }}
                    <br>
                    Title: {{ ($notification['subject'])['title'] }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
