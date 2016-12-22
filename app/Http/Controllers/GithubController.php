<?php

namespace App\Http\Controllers;

use Auth;
use GrahamCampbell\GitHub\Facades\GitHub;

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

        return view('notifications')->with('notifications', $notifications);
    }

    public function getNotification($name)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $notification = GitHub::api('notification')->id($name);
        $type = ($notification['subject'])['type'];
        $url = ($notification['subject'])['url'];
        $processed_url = explode('/', $url);
        $user = $processed_url[4];
        $repo = $processed_url[5];
        $name = $processed_url[7];
        if ($type == 'PullRequest') {
            $pullRequest = $this->getPR($user, $repo, $name);

            return view('pullRequest')->with('pullRequest', $pullRequest);
        } elseif ($type == 'Issue') {
            $issue = $this->getIssue($user, $repo, $name);

            return view('issue')->with('issue', $issue);
        } elseif ($type == 'Commit') {
            $commit = $this->getCommit($user, $repo, $name);

            return view('commit')->with('commit', $commit);
        } elseif ($type == 'Release') {
            $release = $this->getRelease($user, $repo, $name);

            return view('release')->with('release', $release);
        } else {
            return redirect('wip');
        }
    }

    public function getIssue($user, $repo, $name)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $issue = Github::api('issue')->show($user, $repo, $name);

        return $issue;
    }

    public function getPR($user, $repo, $name)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $pullRequest = Github::api('pull_request')->show($user, $repo, $name);

        return $pullRequest;
    }

    public function getCommit($user, $repo, $name)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $commit = Github::api('repo')->commits()->show($user, $repo, $name);

        return $commit;
    }

    public function getRelease($user, $repo, $name)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $release = Github::api('repo')->releases()->show($user, $repo, $name);

        return $release;
    }
}
