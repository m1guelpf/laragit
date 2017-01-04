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
                      <div class="blankslate">
                        <span class="mega-octicon octicon-issue-opened blankslate-icon"></span>
                        <span class="mega-octicon octicon-git-pull-request blankslate-icon"></span>
                        <span class="mega-octicon octicon-git-commit blankslate-icon"></span>
                        <span class="mega-octicon octicon-tag blankslate-icon"></span>
                        <h3>You haven't got any notifications</h3>
                        <p>You may have to <a href="{{ url('sync') }}">sync</a> them...</p>
  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
