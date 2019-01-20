@extends('layouts.profe_admin')
@section('content')

<form>

    <div class="form-group"> <!-- Full Name -->
        <label for="full_name_id" class="control-label">Titulo</label>
        <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
    </div>    

    <div class="form-group"> <!-- Street 1 -->
        <label for="street1_id" class="control-label">Descriptción</label>
        <input type="text" class="form-control" id="street1_id" name="street1" placeholder="Street address, P.O. box, company name, c/o">
    </div>                    
                            
    <div class="form-group"> <!-- Street 2 -->
        <label for="street2_id" class="control-label">Street Address 2</label>
        <input type="text" class="form-control" id="street2_id" name="street2" placeholder="Apartment, suite, unit, building, floor, etc.">
    </div>    

       <div class="form-group"> <!-- State Button -->
        <label for="state_id" class="control-label">State</label>
        <select class="form-control" id="state_id">
        @foreach ($empresa_oferta['grados'] as $grado) 
        @foreach ($empresa_oferta['ofertas'] as $oferta) 
        @if($grado['id']==$oferta['id_grado'])
        
        <option value="AL">{{$grado['nombre']}}</option>
        @endif
           @endforeach
           @endforeach
        </select>                    
    </div>
                                
                            
    <div class="form-group"> <!-- State Button -->
        <label for="state_id" class="control-label">State</label>
        <select class="form-control" id="state_id">
        @foreach ($empresa_oferta['empresas'] as $empresa) 
        @foreach ($empresa_oferta['ofertas'] as $oferta) 
        @if($empresa['id']==$oferta['id_empresa'])
        
        <option value="AL">{{$empresa['nombre']}}</option>
        @endif
           @endforeach
           @endforeach
        </select>                    
    </div>
    
    <div class="form-group"> <!-- Zip Code-->
        <label for="zip_id" class="control-label">Puestos Vacantes</label>
        <input type="text" class="form-control" id="zip_id" name="zip" placeholder="#####">
    </div>        
    
    <div class="form-group"> <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Publicar</button>
    </div>     
    
</form>
@endsection