<div>
    <div class="d-flex flex-column align-items-center flex-lg-row">
        <div class="form-group mb-3">
            <select class="form-control" wire:model="tdoc" id="tdoc" name="tdoc" required>
                <option value="">Tipo de Documento</option>
                <option value="DNI">DNI</option>
                <option value="RUC">RUC</option>
            </select>
        </div>

        <div class="form-group py-2   mx-lg-3 mb-0">
            <input type=" text" class="form-control py-2" wire:model="correntista" id="correntista" name="correntista"
                placeholder="Insertar correntista" required>
        </div>
        <div>
            <button type="button" class="btn btn-info  text-light" wire:click="consultarCorrentista">
                Consultar 
            </button>
        </div>
    </div>

    @if ($errorMessage)
        <div class="alert alert-danger mt-3">
            {{ $errorMessage }}
        </div>
    @endif
</div>
