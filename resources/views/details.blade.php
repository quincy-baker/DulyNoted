@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h1>Repos</h1>
                </div>
                <div class="panel-body"> 
                @foreach ($data as $d)
                <p>{{ $d['name'] }}</p>
                <p>{{ $d['issues_url'] }}</p>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
