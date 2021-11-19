
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
            @if ($post['tags'])
            <p>
                @foreach ($post['tags'] as $tag)
                    <span class="badge badge-primary">{{$tag['name']}}</span>
                @endforeach
            </p>
            @endif

            @if ($post['category'])
            <p>
                <span>Categoria: <a href="{{route('categories.show', $post['category']['slug'])}}"><strong>{{$post['category']['name']}}</strong></a></span>
            </p>
            @endif
            <p>{{$post['content']}}</p>
        </article>
    </div>

    @endsection
