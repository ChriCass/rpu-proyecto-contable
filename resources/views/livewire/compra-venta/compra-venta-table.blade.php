<!-- resources/views/livewire/compra-venta-table.blade.php -->
<div>

    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="breadcrumb breadcrumb-style ">
                    <li class="breadcrumb-item">
                        <h4 class="page-title">Compra-Venta</h4>
                    </li>
                    <li class="breadcrumb-item bcrumb-1">
                        <a href="../../index.html">
                            <i class="fas fa-home"></i> Panel principal</a>
                    </li>
                    <li class="breadcrumb-item bcrumb-2">
                        <a href="#" onClick="return false;">{{ $empresa->Nombre }}</a>
                    </li>
                    <li class="breadcrumb-item active">Compra-Venta</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- resources/views/livewire/compra-venta/compra-venta-table.blade.php -->
    <div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Vista</strong> Previa
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table id="basicTable" class="table table-hover table-checkable order-column contact_list">
                                @if (!empty($data))
                                    <thead>
                                        <tr>
                                            <th class="center">DNI</th>
                                            <th class="center">Nombre</th>
                                            <th class="center">Libro</th>
                                            <th class="center">Fecha Doc</th>
                                            <th class="center">Fecha Ven</th>
                                            <th class="center">Tdoc</th>
                                            <th class="center">Ser</th>
                                            <th class="center">Num</th>
                                            <th class="center">Cod Moneda</th>
                                            <th class="center">Tip Cam</th>
                                            <th class="center">Opigv</th>
                                            <th class="center">Bas Imp</th>
                                            <th class="center">Igv</th>
                                            <th class="center">No Gravadas</th>
                                            <th class="center">Isc</th>
                                            <th class="center">Imp Bol Pla</th>
                                            <th class="center">Otro Tributo</th>
                                            <th class="center">Precio</th>
                                            <th class="center">Glosa</th>
                                            <th class="center">Cuentas</th>
                                            <th class="center">Mon1</th>
                                            <th class="center">Cc1</th>
                                            <th class="center">Ref Int1</th>
                                            <th class="center">Mon2</th>
                                            <th class="center">Cc2</th>
                                            <th class="center">Ref Int2</th>
                                            <th class="center">Mon3</th>
                                            <th class="center">Cc3</th>
                                            <th class="center">Ref Int3</th>
                                            <th class="center">Estado Doc</th>
                                            <th class="center">Estado</th>
                                            <th class="center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="center">{{ $data['correntistaData']['dni'] ?? '-' }}</td>
                                            <td class="center">{{ $data['correntistaData']['nombre'] ?? '-' }}</td>
                                            <td class="center">{{ $libros->where('N', $data['libro'])->first()->DESCRIPCION ?? $data['libro'] ?? '-' }}</td>
                                            <td class="center">{{ $data['fecha_doc'] ?? '-' }}</td>
                                            <td class="center">{{ $data['fecha_ven'] ?? '-' }}</td>
                                            <td class="center">{{ $ComprobantesPago->where('N', $data['tdoc'])->first()->DESCRIPCION ?? $data['tdoc'] ?? '-' }}</td>
                                            <td class="center">{{ $data['ser'] ?? '-' }}</td>
                                            <td class="center">{{ $data['num'] ?? '-' }}</td>
                                            <td class="center">{{ $data['cod_moneda'] ?? '-' }}</td>
                                            <td class="center">{{ $data['tip_cam'] ?? '-' }}</td>
                                            <td class="center">{{ $opigvs->where('Id', $data['opigv'])->first()->Descripcion ?? $data['opigv'] ?? '-' }}</td>
                                            <td class="center">{{ $data['bas_imp'] ?? '-' }}</td>
                                            <td class="center">{{ $data['igv'] ?? '-' }}</td>
                                            <td class="center">{{ $data['no_gravadas'] ?? '-' }}</td>
                                            <td class="center">{{ $data['isc'] ?? '-' }}</td>
                                            <td class="center">{{ $data['imp_bol_pla'] ?? '-' }}</td>
                                            <td class="center">{{ $data['otro_tributo'] ?? '-' }}</td>
                                            <td class="center">{{ $data['precio'] ?? '-' }}</td>
                                            <td class="center">{{ $data['glosa'] ?? '-' }}</td>
                                            <td class="center">{{ $data['cnta1']['cuenta'] ?? '-' }}</td>
                                            <td class="center">{{ $data['mon1'] ?? '-' }}</td>
                                            <td class="center">{{ $data['cc1'] ?? '-' }}</td>
                                            <td class="center">{{ $data['ref_int1'] ?? '-' }}</td>
                                            <td class="center">{{ $data['mon2'] ?? '-' }}</td>
                                            <td class="center">{{ $data['cc2'] ?? '-' }}</td>
                                            <td class="center">{{ $data['ref_int2'] ?? '-' }}</td>
                                            <td class="center">{{ $data['mon3'] ?? '-' }}</td>
                                            <td class="center">{{ $data['cc3'] ?? '-' }}</td>
                                            <td class="center">{{ $data['ref_int3'] ?? '-' }}</td>
                                            <td class="center">{{ $estado_docs->where('id', $data['estado_doc'])->first()->descripcion ?? $data['estado_doc'] ?? '-' }}</td>
                                            <td class="center">{{ $estados->where('N', $data['estado'])->first()->DESCRIPCION ?? $data['estado'] ?? '-' }}</td>
                                            <td class="center">
                                                <!-- Add your action buttons here -->
                                                <a href="#" class="btn btn-tbl-edit">
                                                    <i class="material-icons">create</i>
                                                </a>
                                                <a href="#" class="btn btn-tbl-delete" wire:click='NoMoreRow'>
                                                    <i class="material-icons">delete_forever</i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                @else
                                    
                                    <tbody>
                                        <tr>
                                            <td class="center" colspan="37">¡Mostraremos aquí la info!</td>
                                        </tr>
                                    </tbody>
                                @endif
                            </table>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>

    <h2>Data Received</h2>
    <pre>{{ print_r($data, true) }}</pre>
</div>
