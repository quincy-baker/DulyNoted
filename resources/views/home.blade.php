@extends('layouts.app')

@section('content')
<div id="home">
    <div class="container-fluid">
        <div class="row">
            <div id="LeftPanel">
                <div class="panel-wrapper">
                    <div class="row">
                        <div class="col-xs-4 col-xs-offset-4">
                            <pre><h1><a href="{{ url('note') }}">notes</a></h1></pre>
                        </div>
                    </div>
                </div>
            </div>
            <div id="RightPanel">
                <div class="panel-wrapper">
                    <div class="row">
                        <div class="col-xs-4 col-xs-offset-4">
                            <pre><h1><a href="{{ url('github') }}">github</a></h1></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
