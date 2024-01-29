@extends('layouts.frontend')

@section('content')
    <div class="jumbotron p-3 p-md-5 text-white rounded mt-4 mb-4" style="background: linear-gradient(140deg, rgba(2,0,36,1) 0%, rgba(60,7,169,1) 0%, rgba(154,149,255,1) 100%);">
        @foreach ($posts as $latestpost)
            <div class="col-md-6 px-0">
                <a href="{{ route('posts.show', $latestpost=DB::table('posts')->select('id')->orderBy('created_at', 'desc')->first()->id) }}"><h1 class="display-4 font-italic text-light">{{  $latestpost=DB::table('posts')->select('title')->orderBy('created_at', 'desc')->first()->title }}</h1></a>

                <p class="lead my-3">{{ Str::limit($latestpost=DB::table('posts')->select('description')->orderBy('created_at', 'desc')->first()->description, 150) }}</p>
                <p class="lead mb-0"><a href="{{ route('posts.show', $latestpost=DB::table('posts')->select('id')->orderBy('created_at', 'desc')->first()->id) }}"
                        class="text-white font-weight-bold">Continue reading...</a></p>
            </div>
        @break
    @endforeach

</div>

<div class="row mb-2">
    @foreach ($posts as $post)
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-auto pb-auto">
                <div class="card-body d-flex flex-column align-items-start">
                        <img src="{{ asset('image/'. $post->image)}}" alt="{{$post->image}}" width="400px" >
                    <h3 class="mb-0 mt-2">
                        <a class="text-dark" href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                    </h3>
                    <div class="mb-1 text-muted">{{ date('y-m-d', strtotime($post->created_at)) }}</div>
                    <p class="card-text mb-auto">{{ Str::limit($post->description, 150) }}</p>
                    <a href="{{ route('posts.show', $post->id) }}">Continue reading</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
