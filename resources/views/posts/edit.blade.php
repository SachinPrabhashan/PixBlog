@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Post') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('errorstatus'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('errorstatus') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('posts.update', $post->id) }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="posttitle" class="form-label">Post Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $post->title}}" id="posttitle"
                                    placeholder="Enter Post Title Here" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="postdescription" class="form-label">Post Description</label>
                                <textarea class="form-control" name="description"  id="postdescription" placeholder="Enter Post Description Here"
                                    rows="10" required>{{ $post->description}}</textarea>
                            </div>

                            </textarea>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
