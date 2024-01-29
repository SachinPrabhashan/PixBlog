@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

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

                        Hello {{ auth()->user()->name }}!!!

                    </div>
                </div>
                <div class="d-flex flex-nowrap">
                    <div class="mt-4">
                        <a href="{{ route('admin.usermanagement') }}" class="tilelink">
                            <div class="card" style="width: 15rem; background-color:rgb(210, 208, 255);">
                                <div class="card-body">
                                    <h3 class="card-title">Users</h3>
                                    <h1><strong>{{ auth()->user()->count() }}</strong></h1>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mt-4 ms-2">
                        <a href="{{ route('admin.allpost') }}" class="tilelink">
                            <div class="card" style="width: 15rem; background-color: rgb(255, 243, 224)">
                                <div class="card-body">
                                    <h3 class="card-title">Posts</h3>
                                    <h1><strong>{{ DB::table('posts')->count() }}</strong></h1>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
