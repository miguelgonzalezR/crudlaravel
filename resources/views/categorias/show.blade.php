@extends('app')

@section('content')

    <div class="container w-25 border p-4 mt-4">
        <form method="POST" action="{{ route('categorias.update', ['categoria' => $categoria->id]) }}" >
            @method('PATCH')
            @csrf

            @if(session('success'))

                <h6 class="alert alert-success">{{session('success')}}</h6>

            @endif

            @error('nombre')

                <h6 class="alert alert-danger">{{ $message }}</h6>

            @enderror


            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la categoria</label>
                <input type="text" class="form-control" name="nombre" value="{{$categoria->nombre}}">
            </div>

            <div class="mb-3">
                <label for="color" class="form-label">Color de la categoria</label>
                <input type="color" class="form-control" name="color" value="{{$categoria->color}}">
            </div>


            <button type="submit" class="btn btn-primary">Actualizar categoria</button>

        </form>


        <div >
            @if ($categoria->tareasv->count() > 0)

                @foreach ($categoria->tareasv as $tarea )

                <div class="row py-1">
                    <div class="col-md-9 d-flex align-items-center">
                        <a href="{{ route('tareas-edit', [$tarea->id]) }}">{{ $tarea->Titulo }}</a>
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

            @else
                No hay tareas para esta categoría
            @endif
    
    </div>


       

@endsection
