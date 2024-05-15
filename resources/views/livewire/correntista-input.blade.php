<div>
    <div class="d-flex">

        <div class="form-group mb-3">
            <select class="form-control" id="tdoc" name="tdoc" required>
                <option value="">Tipo de Documento</option>
                <option value="DNI" {{ old('tdoc') == 'DNI' ? 'selected' : '' }}>DNI</option>
                <option value="RUC" {{ old('tdoc') == 'RUC' ? 'selected' : '' }}>RUC</option>
            </select>
        </div>
        

        <div class="form-group  mx-3 ">

            <input type="text" class="form-control" id="correntista" name="correntista"
                placeholder="Insertar correntista" value="{{ old('correntista') }}" required>
        </div>
        <div>
            <button type="button" class="btn btn-info text-light">
                Consultar correntista
            </button>
        </div>
    </div>


</div>
