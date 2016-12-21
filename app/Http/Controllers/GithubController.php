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
        if ($type == "PullRequest"){
          $pullRequest = $this->getPR($user, $repo, $id);
          return view('pullRequest')->with('pullRequest', $pullRequest);
        } else if ($type == "Issue"){
          $issue = $this->getIssue($user, $repo, $id);
          return view('issue')->with('issue', $issue);
        } else{
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

}
