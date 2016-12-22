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
            return view('pullRequest')->with('pullRequest', $pullRequest);
        } elseif ($type == 'Issue') {
            $issue = $this->getIssue($user, $repo, $id);
            return view('issue')->with('issue', $issue);
        } elseif ($type == 'Commit'){
          $commit = $this->getCommit($user, $repo, $id);
          return view('commit')->with('commit', $commit);
        } else if ($type == 'Release'){
          $release = $this->getRelease($user, $repo, $id);
          return view('release')->with('release', $release);
        } else if ($type == 'RepositoryInvitation'){
          $RepositoryInvitation = $this->getRepositoryInvitation($user, $repo, $id);
          return view('RepositoryInvitation')->with('RepositoryInvitation', $RepositoryInvitation);
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
        $commit = Github::api('pull_request')->show($user, $repo, $id);

        return $commit;
    }

    public function getRelease($user, $repo, $id)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $release = Github::api('pull_request')->show($user, $repo, $id);

        return $release;
    }

    public function getRepositoryInvitation($user, $repo, $id)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $RepositoryInvitation = Github::api('pull_request')->show($user, $repo, $id);

        return $RepositoryInvitation;
    }
}
