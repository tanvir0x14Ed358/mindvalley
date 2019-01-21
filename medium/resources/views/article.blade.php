@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12" style="text-transform: uppercase;">
                <div style="float: left;margin-right: 10px;">
                    <strong><a href="{{route('front')}}">HOME</a></strong>
                </div>

            @foreach ($tags as $tag)
                    <div style="float: left;margin-right: 10px;">
                        <strong><a href="{{route('tag', ['id' => $tag->id])}}"> {{ $tag->name }}</a></strong>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row">

                <div class="col-md-8" style="margin-top: 10px;">
                    <div class="col-md-12"><strong>{{ $article->title }}</strong></div>
                    <div class="col-md-12">{{ $article->details }}</div>
                </div>

        </div>
    </div>
@endsection
