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
                            <button type="button" class="btn btn-primary text-light" wire:click="openCreateForm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
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
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Formulario de Compra-Ventas {{ $empresa->Nombre }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <livewire:compra-venta-form :empresaId="$empresa->id" />
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const numericFields = document.querySelectorAll('.numeric-input');

        numericFields.forEach(field => {
            field.addEventListener('input', function (e) {
                let value = e.target.value;
                value = value.replace(/\s+/g, '');
                value = value.replace(/[^0-9.]/g, '');
                e.target.value = value;
            });
        });

        // Detectar el evento de cierre del modal
        const formModal = document.getElementById('staticBackdrop');
        formModal.addEventListener('hidden.bs.modal', function () {
            Livewire.dispatch('resetFields');
        });
    });
</script>


@endsection
