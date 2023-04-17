@extends('app')

@section('content')

    <div class="container w-25 border p-4 mt-4">
        <form method="POST" action="{{ route('categorias.store') }}" >
            @csrf

            @if(session('success'))

                <h6 class="alert alert-success">{{session('success')}}</h6>

            @endif

            @error('nombre')

                <h6 class="alert alert-danger">{{ $message }}</h6>

            @enderror


            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la categoria</label>
                <input type="text" class="form-control" name="nombre">
            </div>

            <div class="mb-3">
                <label for="color" class="form-label">Color de la categoria</label>
                <input type="color" class="form-control" name="color">
            </div>


            <button type="submit" class="btn btn-primary">Crear categoria</button>

        </form>


        <div>
            @foreach ( $categorias as $categoria)

            <div class="row py-1">
                <div class="col-md-9 d-flex align-items-center">
                    <a class="d-flex align-items-center gap-2" href="{{ route('categorias.show', ['categoria' => $categoria->id]) }}">
                        <span class="color-container" style="background-color: {{ $categoria->color }}"></span> {{ $categoria->nombre }}
                    </a>
                </div>

                <div class="col-md-3 d-flex justify-content-end">
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{$categoria->id}}">Eliminar</button>
                    
                </div>
            </div>


            <div class="modal fade" id="modal{{ $categoria->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">De verdad quiere eliminar esta categoria</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <h6>Seguro que desea eliminar la categoria {{ $categoria->nombre }} una vez eliminada esta categoria tambien se eliminaran las tareas con esta categoria </h6>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

                            <form action="{{ route('categorias.destroy', ['categoria' =>$categoria->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-primary">Eliminar</button>
                            </form>

                            
                        </div>
                    </div>
                </div>
            </div>

            
            @endforeach

        </div>


    </div>


@endsection
