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
                        <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>Titulo</th>
                                <th colspan="2">&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>
                                            <a href="{{ route('posts.edit', $post) }}"
                                                class="btn btn-sm btn-primary">Editar</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
