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
      @foreach ($profesores['user'] as $user) @foreach ($profesores['profe_admin'] as $profe) @endforeach @endforeach
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
        <table class="table table-striped table-bordered">
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
              <td>{{$usuario['created_at']}}</td>


              <td class="td-actions">
                <button style="background: #b50045; color:white;" class="btn btn-default btn-xs" href="javascript:;" data-toggle="modal"
                  href="#myModal" data-target="#edit-modal-cust-<?php echo $usuario->id;?>" id="<?php echo $usuario->id;?>">
										<span class="glyphicon glyphicon-pencil"></span> Modificar
									</button>
                <button value="{{$profesor['id']}}" class="borrarProfesor btn btn-default btn-xs" href="javascript:;">
										<span class="glyphicon glyphicon-remove"></span> Borrar
									</button>

              </td>
            </tr>
            <div id="edit-modal-cust-<?php echo $usuario->id;?>" class="modal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5><b>Nombre:</b> <input value="{{$usuario['nombre']}}" class="form-control">
                    </h5>

                  </div>
                  <div class="modal-header">
                    <h5><b> Apellidos:</b><textarea id="direccion" for="direccion" class="form-control">{{$usuario['apellidos']}}</textarea>
                    </h5>
                  </div>

                  <div class="modal-header">
                    <h5><b> Email:</b><input id="email" value="{{$usuario['email']}}" for="email" for="descripcion" class="form-control">
                    </h5>
                  </div>
                  <div class="modal-header">
                    <h5><b> Departamento:</b><textarea id="direccion" for="direccion" class="form-control">{{$departamento['nombre']}}</textarea>
                    </h5>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Guardar</button>
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