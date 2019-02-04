@extends('layouts.profe_admin') 
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <div class="page-header">
        <h3>
          Añadir un profesor
        </h3>
      </div>

      <div class="form-group">
        <label for="nombre" class="control-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" placeholder="nombre">
      </div>

      <div class="form-group">
        <label for="apellidos" class="control-label">Apellidos</label>
        <input type="text" class="form-control" id="apellidos" placeholder="apellidos">
      </div>

      <div class="form-group">
        <label for="email" class="control-label">Email</label>
        <input type="text" class="form-control" id="email" placeholder="email">
      </div>

      <div class="form-group">
        <label for="id_depar" class="control-label">Departamento</label>
        <select class="form-control" id="id_depar">
            @foreach ($profesores['departamento'] as $departamento) 
            <option id="departamento" value="{{$departamento['id']}}">{{$departamento['nombre']}}</option>
              @endforeach
          </select>
      </div>
      <div class="form-group">
        <button type="submit" id="insertProfe" style="background: #b50045; color:white" class="btn btn-primary">Añadir</button>
      </div>
    </div>

    <div class="col-md-9">
      <div class="page-header">
        <h3>
          Profesorado
        </h3>
      </div>
      <br>
      <div class="widget-content">
        <table class="table table-striped table-bordered" style="overflow: scroll; max-width: 100%; display: block;">
          <thead>
            <tr style="background: #b50045; color:white;">
              <th id="">Nombre
              </th>
              <th id="">Apellidos
              </th>
              <th id="">Departamento
              </th>
              <th id="">Email
              </th>
              <th id="">Registrado
              </th>
              <th class="td-actions" id="table_action">Accion</th>
            </tr>
            @foreach ($profesores['profe_admin'] as $profesor) @foreach ($profesores['user'] as $usuario) @foreach ($profesores['departamento']
            as $departamento)
          </thead>
          <tbody>
            @if($profesor['id']==$usuario['id']) @if($profesor['id_depar']==$departamento['id'])
            <tr>

              <td>{{$usuario['nombre']}}</td>
              <td>{{$usuario['apellidos']}}</td>
              <td>{{$departamento['nombre']}}</td>
              <td>{{$usuario['email']}}</td>
              <td> <?php $fecha = explode(' ', trim(Auth::user()->created_at));?>
                {{$fecha[0]}}</td>


              <td class="td-actions">
                <button class="btn btn-default btn-xs" style="float:right;" data-toggle="modal" href="#myModal" data-target="#edit-modal-cust-<?php echo $profesor->id;?>" id="<?php echo $profesor->id;?>">
									<span class="glyphicon glyphicon-pencil"></span> Modificar
									</button>
                <button style="background: #b50045; color:white;" value="{{$profesor['id']}}" class="borrarProfesor btn btn-default btn-xs"
                  href="javascript:;">
										<span class="glyphicon glyphicon-remove"></span> Borrar
									</button>

              </td>
            </tr>

            <!-- The Modal -->
            <!--modal-->
            <div id="edit-modal-cust-<?php echo $profesor->id;?>" class="modal">
              <div class="modal-dialog">
                <div class="modal-content">

                  <button class="close" data-dismiss="modal">&times;</button>
                  <div class="modal-header">
                    <h5><b>Nombre:</b>
                    </h5>
                    <input value="{{$usuario['nombre']}}" id="nombre<?php echo $profesor->id;?>" class="form-control">
                  </div>

                  <div class="modal-header">
                    <h5><b> Apellidos:</b>
                    </h5>
                    <textarea id="apellidos<?php echo $profesor->id;?>" class="form-control">{{$usuario['apellidos']}}</textarea>
                  </div>

                  <div class="modal-header">
                    <h5><b> Departamento:</b>
                    </h5>
                    <select class="form-control" id="id_depar" name="id_depar">
                        @foreach ($profesores['departamento'] as $departamento) 
                       
                      
                        <option selected="{{$departamento['id']}}" id="departamentos<?php echo $departamento->id;?>" name="id_depar" value="{{$departamento['id']}}">{{$departamento['nombre']}}</option>
                       
                          @endforeach
                        </select>
                   
                  </div>
                  <div class="modal-header">
                    <h5><b> Email:</b>
                    </h5>
                    <input value="{{$usuario['email']}}" id="email<?php echo $profesor->id;?>" class="form-control">
                  </div>

                  <div class="modal-footer">
                    <button type="submit" value="{{$profesor->id}}" class="updateProfe btn btn-danger" data-dismiss="modal">Guardar</button>
                  </div>
                </div>
              </div>
            </div>
            @endif @endif
          </tbody>
          @endforeach @endforeach @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vee-validate@latest/dist/vee-validate.js"></script>
<script>
  window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};

</script>
@endsection