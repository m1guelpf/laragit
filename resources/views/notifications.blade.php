@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Notifications</div>

                <div class="panel-body">
                    @foreach ($notifications as $notification)
                    @if (($notification['subject'])['type'] == "Issue")
                    <span class="octicon octicon-issue-opened"></span>
                    @elseif (($notification['subject'])['type'] == "PullRequest")
                    <span class="octicon octicon-git-pull-request"></span>
                    @elseif (($notification['subject'])['type'] == "Commit")
                    <span class="octicon octicon-git-commit"></span>
                    @elseif (($notification['subject'])['type'] == "Release")
                    <span class="octicon octicon-tag"></span>
                    @endif
                    <a href="{{ url('notification/')."/".$notification['id'] }}" target="_blank">{{ ($notification['subject'])['title'] }}</a>
                    <br><br><br><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
