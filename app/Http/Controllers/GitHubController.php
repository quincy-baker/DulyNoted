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
        // $user = str_replace(' ', '-', $username);
        // dd(json_encode($user));

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.github.com/users/quincy-baker');
        $data = json_decode($response->getBody()->getContents(), true);
    
        return view('github')->with(compact('data'));
    }

    public function getRepos($username)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.github.com/users/' . $username . '/repos');
        $data = json_decode($response->getBody()->getContents(), true);
        // $x = [
        //     'repo_count' => count($data),
        //     'most_stars' => array_reduce($data, function ($mostStars, $currentRepo) {
        //         return $currentRepo['stargazers_count'] > $mostStars ? $currentRepo['stargazers_count'] : $mostStars;
        //     }, 0),
        //     'repos' => $data
        // ];
        // $x = $data;
        // for ($i=0; $i < sizeof($x) ; $i++) { 
        //   $name = $x[$i]['name'];
        //   $issues_url = $x[$i]['issues_url'];
        // }
        return response()->json($data,200,[],JSON_PRETTY_PRINT);
        return view('details')->with(compact('data'));

    }
}
