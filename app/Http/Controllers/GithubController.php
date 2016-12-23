<?php

namespace App\Http\Controllers;

use Auth;
use GrahamCampbell\GitHub\Facades\GitHub;
use Log;

class GithubController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getNotifications()
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $notifications = GitHub::api('notification')->all();
        if ($notifications != null){
        return view('notifications')->with('notifications', $notifications);
      }
        return view('no-notifications');
    }

    public function getNotification($id)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $notification = GitHub::api('notification')->id($id);
        $type = ($notification['subject'])['type'];
        $url = ($notification['subject'])['url'];
        $processed_url = explode('/', $url);
        $user = $processed_url[4];
        $repo = $processed_url[5];
        $id = $processed_url[7];
        if ($type == 'PullRequest') {
            $pullRequest = $this->getPR($user, $repo, $id);

            return redirect($pullRequest['html_url']);
        } elseif ($type == 'Issue') {
            $issue = $this->getIssue($user, $repo, $id);

            return redirect($issue['html_url']);
        } elseif ($type == 'Commit') {
            $commit = $this->getCommit($user, $repo, $id);

            return redirect($commit['html_url']);
        } elseif ($type == 'Release') {
            $release = $this->getRelease($user, $repo, $id);

            return redirect($release['html_url']);
        } else {
            return redirect('wip');
        }
    }

    public function getIssue($user, $repo, $id)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $issue = Github::api('issue')->show($user, $repo, $id);

        return $issue;
    }

    public function getPR($user, $repo, $id)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $pullRequest = Github::api('pull_request')->show($user, $repo, $id);

        return $pullRequest;
    }

    public function getCommit($user, $repo, $id)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $commit = Github::api('repo')->commits()->show($user, $repo, $id);

        return $commit;
    }

    public function getRelease($user, $repo, $id)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $release = Github::api('repo')->releases()->show($user, $repo, $id);

        return $release;
    }

    public static function markAllRead(){
      Github::authenticate(Auth::user()->token, null, 'http_token');
        Github::api('notification')->markRead();
    }
}
