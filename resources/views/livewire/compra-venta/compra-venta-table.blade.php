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
                                <thead>
                                    <tr>
                                        @if (count($data) > 0)
                                            <!-- Encabezados del correntista -->
                                            @if (isset($data['correntistaData']))
                                                @foreach ($data['correntistaData'] as $key => $value)
                                                    <th class="center">{{ ucfirst($key) }}</th>
                                                @endforeach
                                            @endif
                    
                                            @foreach (array_keys($data) as $key)
                                                @if (!is_array($data[$key]) && $key !== 'cuenta_igv' && $key !== 'cnta1_destinos' && $key !== 'correntistaData')
                                                    <th class="center">{{ ucfirst($key) }}</th>
                                                    @if ($key === 'mon1')
                                                        <th class="center">DebeHaber</th> <!-- Nueva columna para DebeHaber -->
                                                    @endif
                                                @endif
                                            @endforeach
                                            <th class="center">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($data))
                                        <!-- Original row -->
                                        <tr>
                                            <!-- Valores del correntista -->
                                            @if (isset($data['correntistaData']))
                                                @foreach ($data['correntistaData'] as $key => $value)
                                                    <td class="center">{{ $value }}</td>
                                                @endforeach
                                            @endif
                    
                                            @foreach ($data as $key => $value)
                                                @if (!is_array($value) && $key !== 'cuenta_igv' && $key !== 'cnta1_destinos' && $key !== 'correntistaData')
                                                    <td class="center">
                                                        @if ($key == 'libro')
                                                            {{ $libros->where('N', $value)->first()->DESCRIPCION ?? $value }}
                                                        @elseif ($key == 'opigv')
                                                            {{ $opigvs->where('Id', $value)->first()->Descripcion ?? $value }}
                                                        @elseif ($key == 'estado_doc')
                                                            {{ $estado_docs->where('id', $value)->first()->descripcion ?? $value }}
                                                        @elseif ($key == 'estado')
                                                            {{ $estados->where('N', $value)->first()->DESCRIPCION ?? $value }}
                                                        @else
                                                            {{ is_array($value) ? '' : $value }}
                                                        @endif
                                                    </td>
                                                    @if ($key === 'mon1')
                                                        <td class="center"></td> <!-- Placeholder for DebeHaber in original row -->
                                                    @endif
                                                @endif
                                            @endforeach
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
                    
                                        <!-- Additional rows for cnta1_destinos -->
                                        @if (isset($data['cnta1_destinos']) && is_array($data['cnta1_destinos']))
                                            @foreach ($data['cnta1_destinos'] as $destino)
                                                <tr>
                                                    <!-- Valores del correntista -->
                                                    @if (isset($data['correntistaData']))
                                                        @foreach ($data['correntistaData'] as $key => $value)
                                                            <td class="center">{{ $value }}</td>
                                                        @endforeach
                                                    @endif
                    
                                                    @foreach ($data as $key => $value)
                                                        @if (!is_array($value) && $key !== 'cuenta_igv' && $key !== 'cnta1_destinos' && $key !== 'correntistaData')
                                                            <td class="center">
                                                                @if ($key == 'libro')
                                                                    {{ $libros->where('N', $value)->first()->DESCRIPCION ?? $value }}
                                                                @elseif ($key == 'opigv')
                                                                    {{ $opigvs->where('Id', $value)->first()->Descripcion ?? $value }}
                                                                @elseif ($key == 'estado_doc')
                                                                    {{ $estado_docs->where('id', $value)->first()->descripcion ?? $value }}
                                                                @elseif ($key == 'estado')
                                                                    {{ $estados->where('N', $value)->first()->DESCRIPCION ?? $value }}
                                                                @elseif ($key == 'cnta1')
                                                                    {{ $destino['cuenta'] }}
                                                                @elseif ($key == 'mon1')
                                                                    {{ $destino['monto'] }}
                                                                @elseif ($key == 'cc1')
                                                                    {{ $destino['cc'] }}
                                                                @elseif ($key == 'ref_int1')
                                                                    {{ $destino['ref'] }}
                                                                @else
                                                                    {{ is_array($value) ? '' : $value }}
                                                                @endif
                                                            </td>
                                                            @if ($key === 'mon1')
                                                                <td class="center">{{ $destino['DebeHaber'] }}</td>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                    <td class="center"></td>
                                                </tr>
                                            @endforeach
                                        @endif
                    
                                        <!-- New row for cuentaigv -->
                                        @if ($data['libro'] == '01')
                                            <tr>
                                                <!-- Valores del correntista -->
                                                @if (isset($data['correntistaData']))
                                                    @foreach ($data['correntistaData'] as $key => $value)
                                                        <td class="center">{{ $value }}</td>
                                                    @endforeach
                                                @endif
                    
                                                @foreach ($data as $key => $value)
                                                    @if (!is_array($value) && $key !== 'cuenta_igv' && $key !== 'cnta1_destinos' && $key !== 'correntistaData')
                                                        <td class="center">
                                                            @if ($key == 'libro')
                                                                {{ $libros->where('N', $value)->first()->DESCRIPCION ?? $value }}
                                                            @elseif ($key == 'opigv')
                                                                {{ $opigvs->where('Id', $value)->first()->Descripcion ?? $value }}
                                                            @elseif ($key == 'estado_doc')
                                                                {{ $estado_docs->where('id', $value)->first()->descripcion ?? $value }}
                                                            @elseif ($key == 'estado')
                                                                {{ $estados->where('N', $value)->first()->DESCRIPCION ?? $value }}
                                                            @elseif ($key == 'cnta1')
                                                                1673
                                                            @elseif ($key == 'mon1')
                                                                {{ $data['igv'] }}
                                                            @else
                                                                {{ is_array($value) ? '' : $value }}
                                                            @endif
                                                        </td>
                                                        @if ($key === 'mon1')
                                                            <td class="center">1</td> <!-- DebeHaber para cuentaigv -->
                                                        @endif
                                                    @endif
                                                @endforeach
                                                <td class="center"></td>
                                            </tr>
                                        @endif
                                    @endif
                                </tbody>
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
