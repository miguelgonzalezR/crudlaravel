@extends('app')

@section('content')
    <div class="container w-25 border p-4 mt-4">
        <form method="POST" action="{{ route('tareas-update', ['id' => $tarea->id]) }}" >
            @csrf
            @method('PATCH')

            @if(session('success'))

                <h6 class="alert alert-success">{{session('success')}}</h6>

            @endif

            @error('Titulo')

                <h6 class="alert alert-danger">{{ $message }}</h6>

            @enderror


            <div class="mb-3">
                <label for="Titulo" class="form-label">Titulo de la tarea</label>
                <input type="text" class="form-control" name="Titulo" value="{{$tarea->Titulo}}">
            </div>

            <label for="categoria_id"class="form-label">Categroia de la tarea</label>
            <select name="categoria_id" class="form-select">
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @endforeach
            </select>


            <button type="submit" class="btn btn-primary">Actualizar Tarea</button>

        </form>

    </div>
@endsection
