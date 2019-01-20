@extends('layouts.profe_admin')
@section('content')

<div class="container" >
  <div class="row" >
  
    <div class="col-md-3" >
				<div class="page-header">
					<h3>
						Publicar una Oferta 
					</h3>
				</div>
        <form >

        <div class="form-group"> <!-- Full Name -->
            <label for="full_name_id" class="control-label">Titulo</label>
            <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
        </div>    

        <div class="form-group"> <!-- Street 1 -->
            <label for="street1_id" class="control-label">Descriptción</label>
            <textarea type="text" class="form-control" rows="4", cols="164" id="street1_id" name="street1" style="resize:none," placeholder="Street address, P.O. box, company name, c/o"></textarea>
          
        </div>                    
                                
      

          <div class="form-group"> <!-- State Button -->
            <label for="state_id" class="control-label">Grado</label>
            <select class="form-control" id="state_id">
            @foreach ($result['grados'] as $grado) 
            @foreach ($result['ofertas'] as $oferta) 
            @if($grado['id']==$oferta['id_grado'])
            
            <option value="AL">{{$grado['nombre']}}</option>
            @break
            @endif
              @endforeach
              @endforeach
            </select>                    
          </div>
                                    
                                
        <div class="form-group"> <!-- State Button -->
            <label for="state_id" class="control-label">Empresa</label>
            <select class="form-control" id="state_id">
            @foreach ($result['empresas'] as $empresa) 
            @foreach ($result['ofertas'] as $oferta) 
            @if($empresa['id']==$oferta['id_empresa'])
            
            <option value="AL">{{($empresa)['nombre']}}</option>
            @break
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

    </div>

          
     <div >      
                        @foreach ($result['ofertas'] as $oferta) 

            <div class="row">
                    <div class="col-md-7">
                      <a href="#">
                        <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
                      </a>
                    </div>
                    <div class="col-md-5">
                      <h3>{{$oferta['titulo']}}</h3>
                      <p>{{$oferta['descripcion']}}</p>
                      <p>{{$oferta['puestos-vacantes']}}</p>
                      <a class="btn btn-primary" href="#">Inscribirse</a>
                    </div>
             </div>
   
                         @endforeach
             </div>    
      </div>
</div>
@endsection