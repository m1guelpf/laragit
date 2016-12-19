<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Github;

class GithubController extends Controller
{
  public $github;
  public function __construct()
  {
      $this->middleware('auth');
      $github = app('github.factory')->make(['token' => Auth::user()->token, 'method' => 'token']);
  }
  public function getOrgs()
    {
      return $github->me()->organizations();
    }
}
