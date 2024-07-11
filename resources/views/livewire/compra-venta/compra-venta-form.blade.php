<div>
    <form wire:submit.prevent="submit">
        @csrf
    
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="d-flex  flex-column mb-5">
    
    
            <livewire:correntista-input />
        </div>
        <!-- Primera fila de inputs -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label class="fw-bold" for="libro">Libro</label>
                    <select class="form-control" id="libro" wire:model="libro" required>
                        <option value="">Seleccionar tipo de libro</option>
                        @foreach ($libros as $libroItem)
                            @if (in_array($libroItem->N, ['01', '02']))
                                <option value="{{ $libroItem->N }}">{{ $libroItem->DESCRIPCION }}</option>
                            @endif
                        @endforeach
                    </select>
                    
                    @error('libro') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label class="fw-bold" for="fecha_doc">Fecha del Documento</label>
                    <input type="date" class="form-control" id="fecha_doc" wire:model="fecha_doc" required>
                    @error('fecha_doc') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label class="fw-bold" for="fecha_ven">Fecha de Vencimiento del Documento</label>
                    <input type="date" class="form-control" id="fecha_ven" wire:model="fecha_ven" required>
                    @error('fecha_ven') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label class="fw-bold" for="ser">Serie</label>
                    <input type="text" class="form-control" id="ser" wire:model="ser">
                </div>
            </div>
        </div>
        
        <!-- Segunda fila de inputs -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label class="fw-bold" for="tdoc">Tipo de documento de pago</label>
                    <select class="form-control custom-select" id="tdoc" wire:model="tdoc" required>
                        <option value="">Seleccionar tipo de documento de pago</option>
                        @foreach ($ComprobantesPago as $comprobante)
                            <option value="{{ $comprobante->N}}">{{ $comprobante->DESCRIPCION }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label class="fw-bold" for="num">Número</label>
                    <input type="text" class="form-control" id="num" wire:model="num" required>
                    @error('num') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label class="fw-bold" for="cod_moneda">Código de Moneda</label>
                    <select class="form-control" id="cod_moneda" wire:model="cod_moneda" required>
                        <option value="">Seleccionar moneda</option>
                        <option value="PEN">PEN</option>
                        <option value="USD">USD</option>
                    </select>
                    @error('cod_moneda') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-3">
                <livewire:cambio-sunat />
            </div>
            
        </div>
    
        <!-- Tercera fila de inputs -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="opigv">Tipo de Operación IGV</label>
                    <select class="form-control" id="opigv" wire:model="opigv" required>
                        <option value="">Seleccionar tipo op IGV</option>
                        @foreach ($opigvs as $o)
                            @if ($o->Id != 4)
                                <option value="{{ $o->Id }}">{{ $o->Descripcion }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('opigv') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="bas_imp_percentage">Porcentaje Base Imponible</label>
                    <select class="form-control" id="bas_imp_percentage" required wire:model.live="porcentaje">
                        <option value="">Seleccionar porcentaje</option>
                        <option value="10">10%</option>
                        <option value="18">18%</option>
                    </select>
                    @error('porcentaje') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="bas_imp">Base Imponible</label>
                    <input type="text" class="form-control numeric-input" id="bas_imp" wire:model.live="bas_imp" required>
                    @error('bas_imp') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="igv">IGV</label>
                    <input type="text" class="form-control numeric-input" id="igv" wire:model.live="igv">
                    @error('igv') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
    
        </div>
    
        <!-- Cuarta fila de inputs -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="no_gravadas">No Gravadas</label>
                    <input type="text" class="form-control numeric-input" id="no_gravadas" wire:model="no_gravadas">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="isc">ISC</label>
                    <input type="text" class="form-control numeric-input" id="isc" wire:model.live="isc">
                    @error('isc') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="imp_bol_pla">Importe Bol. Pla.</label>
                    <input type="text" class="form-control numeric-input" id="imp_bol_pla" wire:model.live="imp_bol_pla">
                    @error('imp_bol_pla') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="otro_tributo">Otro Tributo</label>
                    <input type="text" class="form-control  numeric-input" id="otro_tributo" wire:model.live="otro_tributo">
                    @error('otro_tributo') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
    
        <!-- Quinta fila de inputs -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="precio">Precio</label>
                    <input type="text" class="form-control" id="precio" value="{{ $precio }}" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="glosa">Glosa</label>
                    <input type="text" class="form-control" id="glosa" wire:model="glosa" required>
                    @error('glosa') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="cnta1">Cuenta 1</label>
                    <input type="text" class="form-control " id="cnta1" wire:model="cnta1.cuenta" required>
                    @error('cnta1.cuenta') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="cnta2">Cuenta 2</label>
                    <input type="text" class="form-control" id="cnta2" wire:model="cnta2.cuenta">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="cnta3">Cuenta 3</label>
                    <input type="text" class="form-control" id="cnta3" wire:model="cnta3.cuenta">
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="cnta_precio">Cuenta Precio</label>
                    <input type="text" class="form-control" id="cnta_precio" wire:model="cnta_precio.cuenta">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="mon1">Moneda 1</label>
                    <input type="text" class="form-control" id="mon1" wire:model.live="mon1" required>
                    @error('mon1') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="mon2">Moneda 2</label>
                    <input type="text" class="form-control" id="mon2" wire:model="mon2">
                </div>
            </div>
        </div>
    
        <!-- Séptima fila de inputs -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="mon3">Moneda 3</label>
                    <input type="text" class="form-control" id="mon3" wire:model="mon3">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="cc1">Centro de Costo 1</label>
                    <input type="text" class="form-control" id="cc1" wire:model="cc1">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="cc2">Centro de Costo 2</label>
                    <input type="text" class="form-control" id="cc2" wire:model="cc2">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="cc3">Centro de Costo 3</label>
                    <input type="text" class="form-control" id="cc3" wire:model="cc3">
                </div>
            </div>
        </div>
    
        <!-- Octava fila de inputs -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="cta_otro_t">Cuenta Otro Tributo</label>
                    <input type="text" class="form-control" id="cta_otro_t" wire:model="cta_otro_t.cuenta">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="fecha_emod">Fecha de Modificación</label>
                    <input type="date" class="form-control" id="fecha_emod" wire:model="fecha_emod">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="tdoc_emod">Tipo de Documento Modificado</label>
                    <input type="text" class="form-control" id="tdoc_emod" wire:model="tdoc_emod">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="ser_emod">Serie de Documento Modificado</label>
                    <input type="text" class="form-control" id="ser_emod" wire:model="ser_emod">
                </div>
            </div>
        </div>
    
        <!-- Novena fila de inputs -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="num_emod">Número de Documento Modificado</label>
                    <input type="text" class="form-control" id="num_emod" wire:model="num_emod">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="fec_emi_detr">Fecha de Emisión de Detracción</label>
                    <input type="date" class="form-control" id="fec_emi_detr" wire:model="fec_emi_detr">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="num_const_der">Número de Constancia de Detracción</label>
                    <input type="text" class="form-control" id="num_const_der" wire:model="num_const_der">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="tiene_detracc">Tiene Detracción?</label>
                    <select class="form-control" id="tiene_detracc" wire:model="tiene_detracc">
                        <option value="">Seleccionar</option>
                        <option value="si">Sí</option>
                        <option value="no">No</option>
                    </select>
                    @error('tiene_detracc') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            
        </div>
    
        <!-- Décima fila de inputs -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="cta_detracc">Cuenta de Detracción</label>
                    <input type="text" class="form-control" id="cta_detracc" wire:model="cta_detracc.cuenta">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="mont_detracc">Monto de Detracción</label>
                    <input type="text" class="form-control" id="mont_detracc" wire:model="mont_detracc">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="ref_int1">Referencia Interna 1</label>
                    <input type="text" class="form-control" id="ref_int1" wire:model="ref_int1">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="ref_int2">Referencia Interna 2</label>
                    <input type="text" class="form-control" id="ref_int2" wire:model="ref_int2">
                </div>
            </div>
        </div>
    
        <!-- Última fila de inputs -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="ref_int3">Referencia Interna 3</label>
                    <input type="text" class="form-control" id="ref_int3" wire:model="ref_int3">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="estado_doc">Estado del Documento</label>
                    <select class="form-control" id="estado_doc" wire:model="estado_doc" required>
                        <option value="">Selecciona Estado doc</option>
                        @foreach ($estado_docs as $ed)
                            <option value="{{ $ed->id }}">{{ $ed->descripcion }}</option>
                        @endforeach
                    </select>
                    @error('estado_doc') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label class="fw-bold" for="estado">Estado</label>
                    <select class="form-control" id="estado" wire:model="estado" required>
                        <option value="" disabled>Seleccione el estado</option>
                        @foreach ($estados as $estado)
                            <option value="{{ $estado->N }}" @if(old('estado') == $estado->N)  @endif>
                                {{ $estado->DESCRIPCION }}
                            </option>
                        @endforeach
                    </select>
                    @error('estado') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

        </div>
    
        <!-- Botón de Envío -->
        <div class="row mt-3">
            <div class="col-md-12 text-center">
                <button  type="submit" class="btn text-light btn-primary">Agregar a lista</button>
            </div>
        </div>
    </form>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const numericFields = document.querySelectorAll('.numeric-input');

        numericFields.forEach(field => {
            field.addEventListener('input', function (e) {
                let value = e.target.value;
                // Remover espacios y caracteres que no sean números o puntos decimales
                value = value.replace(/\s+/g, ''); // Eliminar espacios
                value = value.replace(/[^0-9.]/g, ''); // Permitir solo números y puntos
                e.target.value = value;
            });
        });
    });
</script>

