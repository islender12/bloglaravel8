@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card my-4 shadow">
                    <div class="card-body">
                        @if ($post->imagen)
                            <img src="{{ $post->get_imagen }}" alt="{{ $post->title }}" class="card-img-top img-thumbnail">
                        @endif
                        @if ($post->iframe)
                            <div class="ratio ratio-16x9 mx-auto">
                                {!! $post->iframe !!}
                            </div>
                        @endif
                        <h5 class="card-title fw-bolder my-2">{{ $post->title }}</h5>
                        <p class="card-text">
                            {{ $post->body }}
                        </p>
                        <p class="text-muted mb-0">
                            <em>
                                &ndash; {{ $post->user->name }}
                            </em>
                            {{ $post->created_at->format('d M Y') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
