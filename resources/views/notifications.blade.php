@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Notifications<span style="float:right" onclick="window.location='{{ url('sync') }}'" class="octicon octicon-sync"></span></div>

                <div class="panel-body">
                  <table>
                    <tbody>
                    @foreach ($notifications as $notification)
                    <tr>
                      <td>
                    <div id="{{ $notification['id'] }}" class="notification">
                    @if ($notification['type'] == "Issue")
                    <span class="octicon octicon-issue-opened"></span>
                    @elseif ($notification['type'] == "PullRequest")
                    <span class="octicon octicon-git-pull-request"></span>
                    @elseif ($notification['type'] == "Commit")
                    <span class="octicon octicon-git-commit"></span>
                    @elseif ($notification['type'] == "Release")
                    <span class="octicon octicon-tag"></span>
                    @endif
                    <a href="{{ url('notification/')."/".$notification['id'] }}" target="_blank" onclick="hidenotif({{ $notification['id'] }})">{{ $notification['title'] }}</a>
                  </td><td><span class="octicon octicon-check"></span></td>
                    </div>
                  </tr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
