@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>{{ $data['login'] }}</h1>
                </div>

                <div class="panel-body">
                    <img src="{{ $data['avatar_url'] }}"> 
                    <a href="{{ action('GitHubController@getRepos', ['username' => $data['login']]) }}">REPOS {{ $data['public_repos'] }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
