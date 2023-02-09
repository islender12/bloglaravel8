@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <section class="card">
                    <div class="card-header lh-lg">
                        Articulos
                        <a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary float-end">Crear Articulos</a>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    -{{ $error }} <br>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="" class="form-label">Titulo*</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder=""
                                    aria-describedby="helpId" value="{{ old('title', $post->title) }}">
                                <small id="helpId" class="text-muted">Titulo del Post</small>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Insertar Imagen</label>
                                <input type="file" class="form-control" name="imagen" id="imagen" placeholder=""
                                    aria-describedby="fileHelpId">
                                <div id="fileHelpId" class="form-text">Imagen del Post</div>
                            </div>
                            <div class="mb-3">
                                <label for="body" class="form-label">Contenido</label>
                                <textarea class="form-control" name="body" id="body" rows="6">{{ old('body', $post->body) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Contenido Embebido</label>
                                <input type="text" name="iframe" id="iframe" class="form-control" placeholder=""
                                    aria-describedby="helpId" value="{{ old('iframe', $post->iframe) }}">
                                <small id="helpId" class="text-muted">Iframe</small>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>

                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
