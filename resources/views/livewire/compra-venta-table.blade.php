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
                                <a href="#" onClick="return false;">{{$empresa->Nombre}}</a>
                            </li>
                            <li class="breadcrumb-item active">Compra-Venta</li>
                        </ul>
                    </div>
                </div>
            </div>
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
                                            @if(!empty($data))
                                                @foreach(array_keys($data) as $key)
                                                    @if(is_array($data[$key]))
                                                        @foreach(array_keys($data[$key]) as $subKey)
                                                            @if(!in_array($subKey, ['success']))  <!-- Exclude specific keys here -->
                                                                <th class="center">{{ ucfirst($subKey) }}</th>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <th class="center">{{ ucfirst($key) }}</th>
                                                    @endif
                                                @endforeach
                                                <th class="center">Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($data))
                                            <tr>
                                                @foreach($data as $key => $value)
                                                    @if(is_array($value))
                                                        @foreach($value as $subKey => $subValue)
                                                            @if(!in_array($subKey, ['success']))  <!-- Exclude specific keys here -->
                                                                <td class="center">{{ $subValue }}</td>
                                                            @endif
                                                        @endforeach
                                                    @else
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
                                                                {{ $value }}
                                                            @endif
                                                        </td>
                                                    @endif
                                                @endforeach
                                                <td class="center">
                                                    <a href="#" class="btn btn-tbl-edit">
                                                        <i class="material-icons">create</i>
                                                    </a>
                                                    <a href="#" class="btn btn-tbl-delete">
                                                        <i class="material-icons">delete_forever</i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td class="center" colspan="100%">No data available</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 
    <h2>Data Received</h2>
    <pre>{{ print_r($data, true) }}</pre>
</div>
