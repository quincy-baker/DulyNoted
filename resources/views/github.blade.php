@extends('layouts.app')

@section('content')
<div class="container">
        <div class="col-xs-12">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                            <h1>{{ $data[0]['owner']['login'] }}'s repositories</h1>
                            </div>
                            <div class="panel-body"> 
                            @foreach ($data as $d)
                            <h1>{{ $d['name'] }}</h1>
                                @if($d['open_issues'] != 0)
                                    @for ($i = 1; $i <= $d['open_issues']; $i++)
                                        <a class="btn btn-primary btn-sm" href="{{ action('GitHubController@getIssues', ['repo' => $d['name'], 'issue_count' => $i]) }}">open issues</a>
                                    @endfor
                                @else
                                    <code>no open issues</code>
                                @endif
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>      
@endsection
