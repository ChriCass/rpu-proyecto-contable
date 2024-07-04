<div>

    <div class="form-group mb-3">
        <label class="fw-bold" for="tip_cam">Tipo de Cambio de hoy</label>
         <div class="d-flex flex-column align-items-center justify-content-center border rounded">
            @if ($tipoCambio)
            <p class="my-3 fs-5 fw-bold"> {{ $tipoCambio['precio_venta'] }}</p>
            
        @else
            <p class="my-3">Aquí aparecerá el tipo de cambio</p>
        @endif
         </div>
 
        <button type="button" wire:click="consultaApiCambio" class="btn btn-primary mt-3">Consultar tipo cambio</button>

    @if ($errorMessage)
    <div class="mt-3 text-danger">
        <p>{{ $errorMessage }}</p>
    </div>
@endif
    </div>

</div>
