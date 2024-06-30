<!-- resources/views/livewire/compra-venta-table.blade.php -->
<div>
 
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
                            <div class="d-flex align-items-center flex-column ">
                                <div class="mb-2">
                                    <label for="" class="form-label">Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name=""
                                        id=""
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                    
                                </div>
                                <div class="mb-2">
                                    <label for="" class="form-label">Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name=""
                                        id=""
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                    
                                </div>
                                <div class="mb-2">
                                    <label for="" class="form-label">Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name=""
                                        id=""
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                  
                                </div>
                                
                            </div>
                            <div class="d-flex flex-column align-items-center" style="width: 50%">
                                <button
                                    type="button"
                                    class="btn w-100 btn-primary"
                                >
                                    Button
                                </button>
                                
                            </div>
                            <div>
                                <button type="button" class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#formModal">
                                    Abrir Formulario
                                </button>
                            </div>
                        </div>
                      
                            <livewire:registrar-asiento.registrar-asiento-table />
                      
                        
                    </div>
                </div>
            </div>
        </div>
            <!-- Modal -->
            <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formModalLabel">Formulario de Registro de asiento
                                {{ $empresa->Nombre }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        
                        </div>
                    </div>
                </div>
            </div>
    </section>
    
    @endsection
    
    </div>
    