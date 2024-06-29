{{-- Vista empresa/compra_venta.blade.php --}}
@extends('layouts.sidebar-home')

@section('content')
 
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <a class="btn btn-secondary mb-3" href="{{ route('empresa.show', ['id' => $empresa->id]) }}" role="button">atras</a>
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex align-items-center ">
                            <span class="me-2">Mostrar</span>
                            <select class="form-select" aria-label="Seleccionar número" id="numeroSelect">
                                <option selected value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <span class="ms-2">entradas</span>
                        </div>
                        <div style="width: 50%">
                            <input type="email" class="form-control w-100" id="exampleFormControlInput1" placeholder="ingrese una palabra para filtrar">
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#formModal">
                                Abrir Formulario
                            </button>
                        </div>
                    </div>
                    <livewire:alert-message />
                    <livewire:compra-venta-table />
                </div>
            </div>
        </div>
    </div>
        <!-- Modal -->
        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModalLabel">Formulario de Compra-Ventas
                            {{ $empresa->Nombre }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <livewire:compra-venta-form />
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection
