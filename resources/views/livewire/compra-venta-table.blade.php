<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Tabla de referencia</strong></h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table id="basicTable" class="table table-hover table-checkable order-column contact_list">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th class="center">Libro</th>
                                        <th class="center">Fecha del Documento</th>
                                        <th class="center">Fecha de Vencimiento</th>
                                        <th class="center">Correntista</th>
                                        <th class="center">Razon Social</th>
                                        <th class="center">Tipo de Identificación</th>
                                        <th class="center">Serie</th>
                                        <th class="center">Número</th>
                                        <th class="center">Código de Moneda</th>
                                        <th class="center">Tipo de Cambio</th>
                                        <th class="center">Tipo de Operación IGV</th>
                                        <th class="center">Base Imponible</th>
                                        <th class="center">IGV</th>
                                        <th class="center">No Gravadas</th>
                                        <th class="center">ISC</th>
                                        <th class="center">Importe Bol. Pla.</th>
                                        <th class="center">Otro Tributo</th>
                                        <th class="center">Precio</th>
                                        <th class="center">Glosa</th>
                                        <th class="center">Cuenta 1</th>
                                        <th class="center">Cuenta 2</th>
                                        <th class="center">Cuenta 3</th>
                                        <th class="center">Cuenta Precio</th>
                                        <th class="center">Moneda 1</th>
                                        <th class="center">Moneda 2</th>
                                        <th class="center">Moneda 3</th>
                                        <th class="center">Centro de Costo 1</th>
                                        <th class="center">Centro de Costo 2</th>
                                        <th class="center">Centro de Costo 3</th>
                                        <th class="center">Cuenta Otro Tributo</th>
                                        <th class="center">Fecha de Modificación</th>
                                        <th class="center">Tipo de Documento Modificado</th>
                                        <th class="center">Serie de Documento Modificado</th>
                                        <th class="center">Número de Documento Modificado</th>
                                        <th class="center">Fecha de Emisión de Detracción</th>
                                        <th class="center">Número de Constancia de Detracción</th>
                                        <th class="center">Tiene Detracción</th>
                                        <th class="center">Cuenta de Detracción</th>
                                        <th class="center">Monto de Detracción</th>
                                        <th class="center">Referencia Interna 1</th>
                                        <th class="center">Referencia Interna 2</th>
                                        <th class="center">Referencia Interna 3</th>
                                        <th class="center">Estado del Documento</th>
                                        <th class="center">Estado</th>
                                        <th class="center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rows as $index => $row)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $row['libro'] }}</td>
                                            <td>{{ $row['fecha_doc'] }}</td>
                                            <td>{{ $row['fecha_ven'] }}</td>
                                            <td>{{ $row['id_type'] }}</td>
                                            <td>{{ $row['ser'] }}</td>
                                            <td>{{ $row['num'] }}</td>
                                            <td>{{ $row['cod_moneda'] }}</td>
                                            <td>{{ $row['tip_cam'] }}</td>
                                            <td>{{ $row['opigv'] }}</td>
                                            <td>{{ $row['bas_imp'] }}</td>
                                            <td>{{ $row['igv'] }}</td>
                                            <td>{{ $row['no_gravadas'] }}</td>
                                            <td>{{ $row['isc'] }}</td>
                                            <td>{{ $row['imp_bol_pla'] }}</td>
                                            <td>{{ $row['otro_tributo'] }}</td>
                                            <td>{{ $row['precio'] }}</td>
                                            <td>{{ $row['glosa'] }}</td>
                                            <td>{{ $row['cnta1'] }}</td>
                                            <td>{{ $row['cnta2'] }}</td>
                                            <td>{{ $row['cnta3'] }}</td>
                                            <td>{{ $row['cnta_precio'] }}</td>
                                            <td>{{ $row['mon1'] }}</td>
                                            <td>{{ $row['mon2'] }}</td>
                                            <td>{{ $row['mon3'] }}</td>
                                            <td>{{ $row['cc1'] }}</td>
                                            <td>{{ $row['cc2'] }}</td>
                                            <td>{{ $row['cc3'] }}</td>
                                            <td>{{ $row['cta_otro_t'] }}</td>
                                            <td>{{ $row['fecha_emod'] }}</td>
                                            <td>{{ $row['tdoc_emod'] }}</td>
                                            <td>{{ $row['ser_emod'] }}</td>
                                            <td>{{ $row['num_emod'] }}</td>
                                            <td>{{ $row['fec_emi_detr'] }}</td>
                                            <td>{{ $row['num_const_der'] }}</td>
                                            <td>{{ $row['tiene_detracc'] }}</td>
                                            <td>{{ $row['cta_detracc'] }}</td>
                                            <td>{{ $row['mont_detracc'] }}</td>
                                            <td>{{ $row['ref_int1'] }}</td>
                                            <td>{{ $row['ref_int2'] }}</td>
                                            <td>{{ $row['ref_int3'] }}</td>
                                            <td>{{ $row['estado_doc'] }}</td>
                                            <td>{{ $row['estado'] }}</td>
                                            <td class="center">
                                                <a class="btn btn-tbl-edit">
                                                    <i class="material-icons">create</i>
                                                </a>
                                                <form method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-tbl-delete">
                                                        <i class="material-icons">delete_forever</i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center mt-3">
                            <button wire:click="insertData" class="btn btn-primary">Insertar Datos en la BD</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
