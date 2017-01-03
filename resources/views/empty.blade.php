@extends('layouts.app')

@section('content')
<script type="text/javascript" language="javascript">
function markAllRead(){
}
</script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Notifications<span style="float:right" onclick="window.location='{{ url('notifications/read') }}'" class="octicon octicon-check"></span></div>

                <div class="panel-body">
                  <table>
                    <tbody>
                      <div class="blankslate">
                        <span class="mega-octicon octicon-git-commit blankslate-icon"></span>
                        <span class="mega-octicon octicon-tag blankslate-icon"></span>
                        <span class="mega-octicon octicon-git-branch blankslate-icon"></span>
                        <h3>You haven't got any notifications</h3>
                        <p>Go and get some!.</p>
  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection