@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($posts as $post)
                    <div class="card my-4 shadow">
                        <div class="card-body">
                            {{-- @dd($post->imagen) --}}
                            @if ($post->imagen)
                                <img src="{{ $post->imagen }}" alt="{{ $post->title }}"
                                    class="card-img-top img-thumbnail">
                            @endif
                            @if ($post->iframe)
                                <div class="ratio ratio-16x9 mx-auto">
                                    {!! $post->iframe !!}
                                </div>
                            @endif
                            <h5 class="card-title fw-bolder mt-4">{{ $post->title }}</h5>
                            <p class="card-text">
                                {{ $post->get_excerpt }}
                                <a class="d-block" href="{{ route('post', $post) }}"> Leer Más</a>
                            </p>
                            <p class="text-muted mb-0">
                                <em>
                                    &ndash; {{ $post->user->name }}
                                </em>
                                {{ $post->created_at->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                @endforeach
                {{ $posts->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
