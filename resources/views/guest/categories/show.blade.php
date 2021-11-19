
@extends('layouts.guest')

    @section('pageContent')
    

    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">
                From the Firehose
            </h3>
            
        </div>
        <article class="blog-post">
            <h1 class="blog-post-title">{{$category['name']}}</h1>
            <h2>Tutti i post associati</h2>
            <ul>
                @foreach ($category['posts'] as $post)
                <li style="list-style: none">
                    <h3><a href="{{route('posts.show', $post['slug'])}}" style="text-decoration: none;">{{$post['title']}}</a></h3>
                    <p>{{$post['content']}}</p>
                </li>
                @endforeach
            </ul>
        </article>
    </div>

    @endsection
