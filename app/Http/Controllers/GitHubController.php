<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GitHubController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $username = $request->user();
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.github.com/users/' . $username['name'] . '/repos');
        $data = json_decode($response->getBody()->getContents(), true);
        
        // return response()->json($data, 200, [], JSON_PRETTY_PRINT);
        return view('github')->with(compact('data'));
    }

    public function getRepos($username)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.github.com/users/' . $username . '/repos');
        $data = json_decode($response->getBody()->getContents(), true);

        // $name = $data['login'];
        // $avatar = $data['avatar_url'];
        // $issues = $data['issues_url'];

        // return response()->json($data,200,[],JSON_PRETTY_PRINT);

        return view('details')->with(compact('data'));

    }

    public function getIssues($repo, $issue_count)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.github.com/repos/quincy-baker/' . $repo . '/issues/' . $issue_count);
        $data = json_decode($response->getBody()->getContents(), true);

        // $y = [];
        // for ($i=0; $i < sizeof($x) ; $i++) { 
        //   array_push($y, $x[$i]['name']);
        //   array_push($y, $x[$i]['issues_url']);
        // }
        // dd($data);
        // return response()->json($data,200,[],JSON_PRETTY_PRINT);

        return view('issues')->with(compact('data'));

    }
}
