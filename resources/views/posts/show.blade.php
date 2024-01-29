@extends('layouts.postshowfrontend')

@section('content')
    <div class="mt-4">
        <div class="card flex-md-row mb-4 box-shadow h-md-auto pb-auto">
            <!--
            <div class="card-header">
                {{ $post->id }}
            </div>
        -->
            <div class="card-body d-flex flex-column align-items-start">
                <h3 class="card-title">{{ $post->title }}</h3>
                <p class="card-text">{{ $post->description }}</p>

                <p>Date : {{ date('y-m-d', strtotime($post->created_at)) }}</p>
            </div>
            <div class="card-body ">
                <img src="{{ asset('image/' . $post->image) }}" alt="{{ $post->image }}" width="400px">
            </div>
            <!--
    <div class="card-footer text-muted">
        {{ date('y-m-d', strtotime($post->created_at)) }}
    </div>
    -->

        </div>
    </div>
@endsection
