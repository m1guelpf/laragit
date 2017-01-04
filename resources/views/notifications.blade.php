@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Notifications<span style="float:right" onclick="window.location='{{ url('sync') }}'" class="octicon octicon-sync"></span></div>
                <div class="panel-body">
                  @foreach ($repos as $repo)
                  <div class="panel panel-default">
                      <div class="panel-heading">{{ $repo->full_name }}</div>
                      <div class="panel-body">
                        <table>
                          <tbody>
                            @foreach ($notifications as $notification)
                            @if ($notification['repoid'] == $repo['id'])
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
                        @elseif ($notification['type'] == "RepositoryInvitation")
                        <span class="octicon octicon-mail-read"></span>
                        @endif
                        <a href="{{ url('notification/')."/".$notification['id'] }}" target="_blank" onclick="readnotif({{ $notification['id'] }})">{{ $notification['title'] }}</a>
                      </td>
                      <td>
                        <div id="{{ $notification['id'] }}" class="notification">
                        @if ($notification['reason'] == "subscribed")
                        <span class="label label-default">Subscribed</span>
                        @elseif ($notification['reason'] == "mention")
                        <span class="label label-warning">Mention</span>
                        @elseif ($notification['reason'] == "comment")
                        <span class="label label-primary">Comment</span>
                        @elseif ($notification['reason'] == "author")
                        <span class="label label-success">Author</span>
                        @elseif ($notification['reason'] == "team_mention")
                        <span class="label label-default">Team mention</span>
                        @elseif ($notification['reason'] == "manual")
                        <span class="label label-default">Manual</span>
                        @elseif ($notification['reason'] == "assign")
                        <span class="label label-danger">Assign</span>
                        @endif
                        </div>
                      </td>
                      </tr>
                      @endif
                      @endforeach
                    </tbody>
                  </table>
                      </div>
                  </div>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
