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
                            <option value="{{ $libroItem->N }}">{{ $libroItem->DESCRIPCION }}</option>
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
 
            </div>
        </div>
    
        <!-- Segunda fila de inputs -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label class="fw-bold" for="id_type">Tipo de Identificación</label>
                    <input type="text" class="form-control" id="id_type" wire:model="id_type">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label class="fw-bold" for="ser">Serie</label>
                    <input type="text" class="form-control" id="ser" wire:model="ser">
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
                    <input type="text" class="form-control" id="cod_moneda" wire:model="cod_moneda" required>
                    @error('cod_moneda') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
    
        <!-- Tercera fila de inputs -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label class="fw-bold" for="tip_cam">Tipo de Cambio</label>
                    <input type="text" class="form-control" id="tip_cam" wire:model="tip_cam" required>
                    @error('tip_cam') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="opigv">Tipo de Operación IGV</label>
                    <select class="form-control" id="opigv" wire:model="opigv" required>
                        <option value="">Seleccionar tipo op IGV</option>
                        @foreach ($opigvs as $o)
                            <option value="{{ $o->Id }}">{{ $o->Descripcion }}</option>
                        @endforeach
                    </select>
                    @error('opigv') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="bas_imp">Base Imponible</label>
                    <input type="text" class="form-control" id="bas_imp" wire:model="bas_imp" required>
                    @error('bas_imp') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="igv">IGV</label>
                    <input type="text" class="form-control" id="igv" wire:model="igv" required>
                    @error('igv') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
    
        <!-- Cuarta fila de inputs -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="no_gravadas">No Gravadas</label>
                    <input type="text" class="form-control" id="no_gravadas" wire:model="no_gravadas">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="isc">ISC</label>
                    <input type="text" class="form-control" id="isc" wire:model="isc">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="imp_bol_pla">Importe Bol. Pla.</label>
                    <input type="text" class="form-control" id="imp_bol_pla" wire:model="imp_bol_pla">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="otro_tributo">Otro Tributo</label>
                    <input type="text" class="form-control" id="otro_tributo" wire:model="otro_tributo">
                </div>
            </div>
        </div>
    
        <!-- Quinta fila de inputs -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="precio">Precio</label>
                    <input type="text" class="form-control" id="precio" wire:model="precio">
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
                    <input type="text" class="form-control" id="cnta1" wire:model="cnta1" required>
                    @error('cnta1') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="cnta2">Cuenta 2</label>
                    <input type="text" class="form-control" id="cnta2" wire:model="cnta2">
                </div>
            </div>
        </div>
    
        <!-- Sexta fila de inputs -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="cnta3">Cuenta 3</label>
                    <input type="text" class="form-control" id="cnta3" wire:model="cnta3">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="cnta_precio">Cuenta Precio</label>
                    <input type="text" class="form-control" id="cnta_precio" wire:model="cnta_precio">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="mon1">Moneda 1</label>
                    <input type="text" class="form-control" id="mon1" wire:model="mon1" required>
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
                    <input type="text" class="form-control" id="cta_otro_t" wire:model="cta_otro_t">
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
                    <label for="tiene_detracc">Tiene Detracción</label>
                    <input type="text" class="form-control" id="tiene_detracc" wire:model="tiene_detracc">
                </div>
            </div>
        </div>
    
        <!-- Décima fila de inputs -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="cta_detracc">Cuenta de Detracción</label>
                    <input type="text" class="form-control" id="cta_detracc" wire:model="cta_detracc">
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
                    <label for="estado">Estado</label>
                    <select class="form-control" id="estado" wire:model="estado" required>
                        <option value="">Selecciona Estado</option>
                        @foreach ($estados as $c)
                            <option value="{{ $c->N }}">{{ $c->DESCRIPCION }}</option>
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
