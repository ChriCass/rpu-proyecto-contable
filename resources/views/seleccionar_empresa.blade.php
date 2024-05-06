@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center bg">
        <div class="col-10">
            <h1 class="fw-bolder">Selecciona a la empresa</h1>
        </div>
        <div class="d-flex justify-content-center mt-5">
            @foreach ($empresas as $empresa)
                <div class="card shadow mx-5" style="width: 18rem;">
                    <img src="{{ asset('img/constructor.png') }}" class="card-img-top" alt="Imagen de la empresa">
                    <div class="card-body">
                        <h5 class="card-title fw-bolder">{{ $empresa->Nombre }}</h5>
                        <p class="card-text"><b>Año:</b> {{ $empresa->Anno }} <br> <b>RUC: </b>{{ $empresa->Ruc }}</p>
                        <a href="{{ route('empresa.show', $empresa->id) }}" class="btn btn-primary text-light">Ir a empresa</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
