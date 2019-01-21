@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row text-center" style="overflow: hidden">
            <div class="col-md-12" style="text-transform: uppercase;">
                <span style="margin-right: 10px;">
                    <strong><a href="{{route('front')}}">HOME</a></strong>
                </span>

            @foreach ($tags as $tag)
                    <span style="margin-right: 15px;">
                        <strong><a href="{{route('tag', ['id' => $tag->id])}}"> {{ $tag->name }}</a></strong>
                    </span>
                @endforeach
            </div>
        </div>
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-md-4" style="margin-top: 10px;">
                    <div class="col-md-12"><strong><a href="{{route('article', ['id' => $article->id])}}">{{ $article->title }}</a></strong></div>
                    <div class="col-md-12">{{ $article->details }}</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
