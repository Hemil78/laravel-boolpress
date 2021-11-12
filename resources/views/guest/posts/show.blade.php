
@extends('layouts.guest')

    @section('pageContent')
    

    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">
                From the Firehose
            </h3>
            
        </div>
        <article class="blog-post">
            <h1 class="blog-post-title">{{$post['title']}}</h1>
            <p class="blog-post-meta">{{$post->created_at->diffforHumans()}} <a href="#">Chris</a></p>

            <p>{{$post['content']}}</p>
        </article>
    </div>

    @endsection
