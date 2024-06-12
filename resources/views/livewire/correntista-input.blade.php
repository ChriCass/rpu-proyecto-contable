<div>
    <div class="mb-3">
        <label for="tdoc" class="form-label">Tipo de Documento</label>
        <select wire:model="tdoc" id="tdoc" class="form-control">
            <option value="">Seleccione</option>
            <option value="RUC">RUC</option>
            <option value="DNI">DNI</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="correntista" class="form-label">Número</label>
        <input wire:model="correntista" type="text" id="correntista" class="form-control" placeholder="Ingrese el número"/>
    </div>
    <button wire:click="consultarCorrentista" class="btn btn-primary mt-3">Consultar</button>
    
    @if($errorMessage)
        <div class="alert alert-danger mt-3">{{ $errorMessage }}</div>
    @endif
    
    @if($responseData)
        <div class="alert alert-success mt-3">
            @if($tdoc == 'RUC')
                {{ $responseData['nombre_o_razon_social'] ?? 'Nombre no encontrado' }}
            @elseif($tdoc == 'DNI')
                {{ $responseData['nombre'] ?? 'Nombre no encontrado' }}
            @endif
        </div>
    @endif
</div>
