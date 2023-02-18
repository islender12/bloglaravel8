@extends('layouts.app')
{{-- Formulario de contacto --}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card my-4 shadow">
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
                        <form action="{{ route('contactanos.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="asunto" class="form-label">Asunto del Correo</label>
                                <input type="text" name="asunto" class="form-control" id="asunto"
                                    aria-describedby="asunto" value="{{ old('asunto') }}">
                            </div>
                            {{-- <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre del Remitente</label>
                                <input type="text" name="nombre" class="form-control" id="nombre"
                                    aria-describedby="nombre" value="{{ old('nombre') }}">
                            </div> --}}
                            <div class="form-floating my-4">
                                <textarea class="form-control" name="descripcion" placeholder="Leave a comment here" id="descripcion"
                                    style="height: 250px">{{ old('descripcion') }}</textarea>
                                <label for="floatingTextarea2">Descripción del Correo</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
