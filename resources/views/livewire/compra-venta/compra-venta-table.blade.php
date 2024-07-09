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
                                            <th class="center">Empresa</th>
                                            <th class="center">Libro</th>
                                            <th class="center">Fecha Doc</th>
                                            <th class="center">Fecha Ven</th>
                                            <th class="center">Correntista</th>
                                            <th class="center">{{ isset($data['correntistaData']['nombre_o_razon_social']) ? 'Razon Social' : 'Nombre' }}</th> 
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
                                            <th class="center">Cuenta 1</th>
                                            <th class="center">Cuenta 2</th>
                                            <th class="center">Cuenta 3</th>
                                            <th class="center">Cuenta precio</th>
                                            <th class="center">Mon1</th>
                                            <th class="center">Mon2</th>
                                            <th class="center">Mon3</th>
                                            <th class="center">Cc1</th>
                                            <th class="center">Cc2</th>
                                            <th class="center">Cc3</th>
                                            <th class="center">Cuenta otro tributo</th>
                                            <th class="center">Fecha de modificacion</th>
                                            <th class="center">Tipo de documento modificado</th>
                                            <th class="center">Serie modificada</th>
                                            <th class="center">numero Moduficado</th>
                                            <th class="center">fecha de emision de detración</th>
                                            <th class="center">Numero constancia de detraccion</th>
                                            <th class="center">tiene detraccion?</th>
                                            <th class="center">Cuenta detracción</th>
                                            <th class="center">Monto detraccion</th>
                                            <th class="center">Ref Int1</th>
                                            <th class="center">Ref Int2</th>                    
                                            <th class="center">Ref Int3</th>
                                            <th class="center">Estado Doc</th>
                                            <th class="center">Estado</th>
                                            <th class="center">Action</th>
                                            <th class="center">Usuario</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="center">{{ $data['empresa'] ?? '-' }}</td>
                                            <td class="center">{{ $libros->where('N', $data['libro'])->first()->DESCRIPCION ?? '-' }}</td>
                                            <td class="center">{{ $data['fecha_doc'] ?? '-' }}</td>
                                            <td class="center">{{ $data['fecha_ven'] ?? '-' }}</td>
                                            <td class="center">{{ $data['correntistaData']['dni'] ?? $data['correntistaData']['ruc'] ?? '-' }}</td>
                                            <td class="center">{{ $data['correntistaData']['nombre'] ?? $data['correntistaData']['nombre_o_razon_social'] ?? '-' }}</td>
                                            <td class="center">{{ $ComprobantesPago->where('N', $data['tdoc'])->first()->DESCRIPCION ?? '-' }}</td>
                                            <td class="center">{{ $data['ser'] ?? '-' }}</td>
                                            <td class="center">{{ $data['num'] ?? '-' }}</td>
                                            <td class="center">{{ $data['cod_moneda'] ?? '-' }}</td>
                                            <td class="center">{{ $data['tip_cam'] ?? '-' }}</td>
                                            <td class="center">{{ $opigvs->where('Id', $data['opigv'])->first()->Descripcion ?? '-' }}</td>
                                            <td class="center">{{ $data['bas_imp'] ?? '-' }}</td>
                                            <td class="center">{{ $data['igv'] ?? '-' }}</td>
                                            <td class="center">{{ $data['no_gravadas'] ?? '-' }}</td>
                                            <td class="center">{{ $data['isc'] ?? '-' }}</td>
                                            <td class="center">{{ $data['imp_bol_pla'] ?? '-' }}</td>
                                            <td class="center">{{ $data['otro_tributo'] ?? '-' }}</td>
                                            <td class="center">{{ $data['precio'] ?? '-' }}</td>
                                            <td class="center">{{ $data['glosa'] ?? '-' }}</td>
                                            <td class="center">{{ $data['cnta1']['cuenta'] ?? '-' }}</td>
                                            <td class="center">{{ $data['cnta2']['cuenta'] ?? '-' }}</td>
                                            <td class="center">{{ $data['cnta3']['cuenta'] ?? '-' }}</td>
                                            <td class="center">{{ $data['cnta_precio']['cuenta'] ?? '-' }}</td>
                                            <td class="center">{{ $data['mon1'] ?? '-' }}</td>
                                            <td class="center">{{ $data['mon2'] ?? '-' }}</td>
                                            <td class="center">{{ $data['mon3'] ?? '-' }}</td>
                                            <td class="center">{{ $data['cc1'] ?? '-' }}</td>
                                            <td class="center">{{ $data['cc2'] ?? '-' }}</td>
                                            <td class="center">{{ $data['cc3'] ?? '-' }}</td>
                                            <td class="center">{{ $data['cta_otro_t']['cuenta'] ?? '-' }}</td>
                                            <td class="center">{{ $data['fecha_emod'] ?? '-' }}</td>
                                            <td class="center">{{ $data['tdoc_emod'] ?? '-' }}</td>
                                            <td class="center">{{ $data['ser_emod'] ?? '-' }}</td>
                                            <td class="center">{{ $data['num_emod'] ?? '-' }}</td>
                                            <td class="center">{{ $data['fec_emi_detr'] ?? '-' }}</td>
                                            <td class="center">{{ $data['num_const_der'] ?? '-' }}</td>
                                            <td class="center">{{ $data['tiene_detracc'] ?? '-' }}</td>
                                            <td class="center">{{ $data['cta_detracc']['cuenta'] ?? '-' }}</td>
                                            <td class="center">{{ $data['mont_detracc'] ?? '-' }}</td>
                                            <td class="center">{{ $data['ref_int1'] ?? '-' }}</td>
                                            <td class="center">{{ $data['ref_int2'] ?? '-' }}</td>
                                            <td class="center">{{ $data['ref_int3'] ?? '-' }}</td>
                                            <td class="center">{{ $estado_docs->where('id', $data['estado_doc'])->first()->descripcion ?? '-' }}</td>
                                            <td class="center">{{ $estados->where('N', $data['estado'])->first()->DESCRIPCION ?? '-' }}</td>
                                            <td class="center">
                                                <a href="#" class="btn btn-tbl-edit">
                                                    <i class="material-icons">create</i>
                                                </a>
                                                <a href="#" class="btn btn-tbl-delete" wire:click='NoMoreRow'>
                                                    <i class="material-icons">delete_forever</i>
                                                </a>
                                            </td>
                                            <td class="center">{{$data['usuario']['id']}}</td>
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
