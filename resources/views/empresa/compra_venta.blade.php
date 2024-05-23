{{-- Vista empresa/compra_venta.blade.php --}}
@extends('layouts.sidebar-home')

@section('content')
<a class="btn btn-secondary mb-3" href="{{ route('empresa.show', ['id' => $empresa->id]) }}" role="button">atras</a>
<div class="row justify-content-center">
    <div class="col-lg-12 col-md-12">
        <div class="white-box">
    
  <!-- Botón para abrir el modal -->
  <button type="button" class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#formModal">
    Abrir Formulario
</button>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Formulario de Compra-Ventas {{$empresa->Nombre}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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

                    <div class="d-flex flex-column mb-5">
                        <div>
                            <h3 class="box-title">Compra-Ventas {{$empresa->Nombre}}</h3>
                        </div>

                        <livewire:correntista-input />
                    </div>

                    <!-- Primera fila de inputs -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="libro">Libro</label>
                                <select class="form-control" id="libro" name="libro" required>
                                    @foreach ($libro as $libroItem)
                                        <option value="{{ $libroItem->N }}">{{ $libroItem->DESCRIPCION }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="fecha_doc">Fecha del Documento</label>
                                <input type="date" class="form-control" id="fecha_doc" name="fecha_doc" value="{{ old('fecha_doc') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="fecha_ven">Fecha de Vencimiento del Documento</label>
                                <input type="date" class="form-control" id="fecha_ven" name="fecha_ven" value="{{ old('fecha_ven') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <livewire:input-respuesta-correntista />
                        </div>
                    </div>

                    <!-- Segunda fila de inputs -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="id_type">Tipo de Identificación</label>
                                <input type="text" class="form-control" id="id_type" name="id_type" placeholder="Tipo de Identificación" value="{{ old('id_type') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="ser">Serie</label>
                                <input type="text" class="form-control" id="ser" name="ser" placeholder="Serie" value="{{ old('ser') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="num">Número</label>
                                <input type="text" class="form-control" id="num" name="num" placeholder="Número" value="{{ old('num') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="cod_moneda">Código de Moneda</label>
                                <input type="text" class="form-control" id="cod_moneda" name="cod_moneda" placeholder="Código de Moneda" value="{{ old('cod_moneda') }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Tercera fila de inputs -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="tip_cam">Tipo de Cambio</label>
                                <input type="text" class="form-control" id="tip_cam" name="tip_cam" placeholder="Tipo de Cambio" value="{{ old('tip_cam') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="top_igv">Tipo de Operación IGV</label>
                                <input type="text" class="form-control" id="top_igv" name="top_igv" placeholder="Tipo de Operación IGV" value="{{ old('top_igv') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="bas_imp">Base Imponible</label>
                                <input type="text" class="form-control" id="bas_imp" name="bas_imp" placeholder="Base Imponible" value="{{ old('bas_imp') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="igv">IGV</label>
                                <input type="text" class="form-control" id="igv" name="igv" placeholder="IGV" value="{{ old('igv') }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Cuarta fila de inputs -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="no_gravadas">No Gravadas</label>
                                <input type="text" class="form-control" id="no_gravadas" name="no_gravadas" placeholder="No Gravadas" value="{{ old('no_gravadas') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="isc">ISC</label>
                                <input type="text" class="form-control" id="isc" name="isc" placeholder="ISC" value="{{ old('isc') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="imp_bol_pla">Importe Bol. Pla.</label>
                                <input type="text" class="form-control" id="imp_bol_pla" name="imp_bol_pla" placeholder="Importe Bol. Pla." value="{{ old('imp_bol_pla') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="otro_tributo">Otro Tributo</label>
                                <input type="text" class="form-control" id="otro_tributo" name="otro_tributo" placeholder="Otro Tributo" value="{{ old('otro_tributo') }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Quinta fila de inputs -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="precio">Precio</label>
                                <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio" value="{{ old('precio') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="glosa">Glosa</label>
                                <input type="text" class="form-control" id="glosa" name="glosa" placeholder="Glosa" value="{{ old('glosa') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="cnta1">Cuenta 1</label>
                                <input type="text" class="form-control" id="cnta1" name="cnta1" placeholder="Cuenta 1" value="{{ old('cnta1') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="cnta2">Cuenta 2</label>
                                <input type="text" class="form-control" id="cnta2" name="cnta2" placeholder="Cuenta 2" value="{{ old('cnta2') }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Sexta fila de inputs -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="cnta3">Cuenta 3</label>
                                <input type="text" class="form-control" id="cnta3" name="cnta3" placeholder="Cuenta 3" value="{{ old('cnta3') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="cnta_precio">Cuenta Precio</label>
                                <input type="text" class="form-control" id="cnta_precio" name="cnta_precio" placeholder="Cuenta Precio" value="{{ old('cnta_precio') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="mon1">Moneda 1</label>
                                <input type="text" class="form-control" id="mon1" name="mon1" placeholder="Moneda 1" value="{{ old('mon1') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="mon2">Moneda 2</label>
                                <input type="text" class="form-control" id="mon2" name="mon2" placeholder="Moneda 2" value="{{ old('mon2') }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Séptima fila de inputs -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="mon3">Moneda 3</label>
                                <input type="text" class="form-control" id="mon3" name="mon3" placeholder="Moneda 3" value="{{ old('mon3') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="cc1">Centro de Costo 1</label>
                                <input type="text" class="form-control" id="cc1" name="cc1" placeholder="Centro de Costo 1" value="{{ old('cc1') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="cc2">Centro de Costo 2</label>
                                <input type="text" class="form-control" id="cc2" name="cc2" placeholder="Centro de Costo 2" value="{{ old('cc2') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="cc3">Centro de Costo 3</label>
                                <input type="text" class="form-control" id="cc3" name="cc3" placeholder="Centro de Costo 3" value="{{ old('cc3') }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Octava fila de inputs -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="cta_otro_t">Cuenta Otro Tributo</label>
                                <input type="text" class="form-control" id="cta_otro_t" name="cta_otro_t" placeholder="Cuenta Otro Tributo" value="{{ old('cta_otro_t') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="fecha_emod">Fecha de Modificación</label>
                                <input type="date" class="form-control" id="fecha_emod" name="fecha_emod" value="{{ old('fecha_emod') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="tdoc_emod">Tipo de Documento Modificado</label>
                                <input type="text" class="form-control" id="tdoc_emod" name="tdoc_emod" placeholder="Tipo de Documento Modificado" value="{{ old('tdoc_emod') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="ser_emod">Serie de Documento Modificado</label>
                                <input type="text" class="form-control" id="ser_emod" name="ser_emod" placeholder="Serie de Documento Modificado" value="{{ old('ser_emod') }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Novena fila de inputs -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="num_emod">Número de Documento Modificado</label>
                                <input type="text" class="form-control" id="num_emod" name="num_emod" placeholder="Número de Documento Modificado" value="{{ old('num_emod') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="fec_emi_detr">Fecha de Emisión de Detracción</label>
                                <input type="date" class="form-control" id="fec_emi_detr" name="fec_emi_detr" value="{{ old('fec_emi_detr') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="num_const_der">Número de Constancia de Detracción</label>
                                <input type="text" class="form-control" id="num_const_der" name="num_const_der" placeholder="Número de Constancia de Detracción" value="{{ old('num_const_der') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="tiene_detracc">Tiene Detracción</label>
                                <input type="text" class="form-control" id="tiene_detracc" name="tiene_detracc" placeholder="Tiene Detracción" value="{{ old('tiene_detracc') }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Décima fila de inputs -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="cta_detracc">Cuenta de Detracción</label>
                                <input type="text" class="form-control" id="cta_detracc" name="cta_detracc" placeholder="Cuenta de Detracción" value="{{ old('cta_detracc') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="mont_detracc">Monto de Detracción</label>
                                <input type="text" class="form-control" id="mont_detracc" name="mont_detracc" placeholder="Monto de Detracción" value="{{ old('mont_detracc') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="ref_int1">Referencia Interna 1</label>
                                <input type="text" class="form-control" id="ref_int1" name="ref_int1" placeholder="Referencia Interna 1" value="{{ old('ref_int1') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="ref_int2">Referencia Interna 2</label>
                                <input type="text" class="form-control" id="ref_int2" name="ref_int2" placeholder="Referencia Interna 2" value="{{ old('ref_int2') }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Última fila de inputs -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="ref_int3">Referencia Interna 3</label>
                                <input type="text" class="form-control" id="ref_int3" name="ref_int3" placeholder="Referencia Interna 3" value="{{ old('ref_int3') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="estado_doc">Estado del Documento</label>
                                <input type="text" class="form-control" id="estado_doc" name="estado_doc" placeholder="Estado del Documento" value="{{ old('estado_doc') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="estado">Estado</label>
                                <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" value="{{ old('estado') }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Botón de Envío -->
                    <div class="row mt-3">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn text-light btn-primary">Agregar a lista</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
</div>

@endsection
