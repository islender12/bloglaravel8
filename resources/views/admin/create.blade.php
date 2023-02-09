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
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Titulo*</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder=""
                                    aria-describedby="helpId">
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
                                <textarea class="form-control" name="body" id="body" rows="6"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Contenido Embebido</label>
                                <input type="text" name="iframe" id="iframe" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                <small id="helpId" class="text-muted">Iframe</small>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>

                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
