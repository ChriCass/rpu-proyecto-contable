{{-- Vista empresa/compra_venta.blade.php --}}
@extends('layouts.sidebar-home')

@section('content')
<a class="btn btn-secondary mb-3" href="{{ route('empresa.show', ['id' => $empresa->id]) }}" role="button">atras</a>
<div class="row justify-content-center">
    

    <div class="col-lg-12 col-md-12">
        <div class="white-box">
            <h3 class="box-title">Compra-Ventas {{$empresa->Nombre}}</h3>
            <form action="#" method="POST" enctype="multipart/form-data">

                @csrf

                <!-- Alerta de Errores de Validación -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row justify-content-center">
                    <!-- Libro, Apellido, DNI, Estado -->
                    <div class="col-md-3">
                        <div class="form-group mb-3">
                            <label for="libro">Libro</label>
                            <select class="form-control" id="libro" name="libro" required>
                                @foreach ($libro as $libroItem)
                                    <option class="text-green" value="{{ $libroItem->N }}">{{ $libroItem->DESCRIPCION }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido"
                                placeholder="Apellido" value="{{ old('apellido') }}" required>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group mb-3">
                            <label for="dni">DNI</label>
                            <input type="text" class="form-control" id="dni" name="dni" placeholder="DNI"
                                value="{{ old('dni') }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="estado">Estado</label>
                            <select class="form-select" id="estado" name="estado" required>
                                <option value="">Selecciona un Estado</option>
                                <option value="activo" {{ old('estado') == 'activo' ? 'selected' : '' }}>Activo</option>
                                <option value="cesado" {{ old('estado') == 'cesado' ? 'selected' : '' }}>Cesado</option>
                            </select>
                        </div>
                    </div>

                    <!-- Fecha de Nacimiento, Dirección -->
                    <div class="col-md-3">
                        <div class="form-group mb-3">
                            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                                value="{{ old('fecha_nacimiento') }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion"
                                placeholder="Dirección" value="{{ old('direccion') }}" required>
                        </div>
                    </div>

                </div>

                <!-- Botón de Envío -->
                <div class="row mt-4">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn text-light btn-success">Agregar Personal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
