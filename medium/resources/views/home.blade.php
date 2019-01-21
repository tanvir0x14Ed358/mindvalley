@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-md-12" style="text-transform: uppercase;">
        <div style="float: left;margin-right: 10px;">
            <strong><a href="{{route('front')}}">HOME</a></strong>
        </div>

    @foreach ($tags as $tag)
            <div style="float: left;margin-right: 15px;">
                <strong>{{ $tag->name }}</strong>
            </div>
        @endforeach
    </div>
    </div>
    <div class="row">
    @foreach ($articles as $article)
        <div class="col-md-4" style="margin-top: 10px;">
            <div class="col-md-12"><strong>{{ $article->title }}</strong></div>
            <div class="col-md-12">{{ $article->details }}</div>
        </div>
    @endforeach
    </div>
</div>
@endsection
