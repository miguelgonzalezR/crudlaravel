@extends('app')

@section('content')
    <div class="container w-25 border p-4 mt-4">
        <form method="POST" action="{{ route('tareasg') }}" >
            @csrf

            @if(session('success'))

                <h6 class="alert alert-success">{{session('success')}}</h6>

            @endif

            @error('Titulo')

                <h6 class="alert alert-danger">{{ $message }}</h6>

            @enderror


            <div class="mb-3">
                <label for="Titulo" class="form-label">Titulo de la tarea</label>
                <input type="text" class="form-control" name="Titulo">
            </div>

            <label for="categoria_id"class="form-label">Categroia de la tarea</label>
            <select name="categoria_id" class="form-select">
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @endforeach
            </select>


            <button type="submit" class="btn btn-primary">Crear Tarea</button>

        </form>

        <div>
            @foreach ( $taresCa as $tarea)

                <div class="row py-1">
                    <div class="col-md-9 d-flex align-items-center">
                        <a href="{{ route('tareas-edit', [$tarea->id]) }}">{{ $tarea->Titulo }}</a>
                        <a href="{{ route('tareas-edit', [$tarea->id]) }}" style="margin-left: 50px;">{{ $tarea->nombre }}</a>
                    </div>

                    <div class="col-md-3 d-flex justify-content-end">
                        <form action="{{ route('tareas-delete', [$tarea->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </div>
                </div>
            
            @endforeach

        </div>

    </div>
@endsection
