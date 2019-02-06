@extends('layouts.profe_admin') 
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <div class="page-header">
        <h3>
          @lang('header.añadirprofesor')
        </h3>
      </div>

      <div class="form-group">
        <label for="nombre" class="control-label">@lang('header.nombre')</label>
        <input type="text" class="form-control" id="nombre" placeholder="nombre">
      </div>

      <div class="form-group">
        <label for="apellidos" class="control-label">@lang('header.apellidos')</label>
        <input type="text" class="form-control" id="apellidos" placeholder="apellidos">
      </div>

      <div class="form-group">
        <label for="email" class="control-label">@lang('header.email')</label>
        <input type="text" class="form-control" id="email" placeholder="email">
      </div>

      <div class="form-group">
        <label for="id_depar" class="control-label">@lang('header.departamento')</label>
        <select class="form-control" id="id_depar">
            @foreach ($profesores['departamento'] as $departamento) 
            <option id="departamento" value="{{$departamento['id']}}">{{$departamento['nombre']}}</option>
              @endforeach
          </select>
      </div>
      <div class="form-group">
        <button type="submit" id="insertProfe" style="background: #b50045; color:white" class="btn btn-primary">@lang('header.añadir')</button>
      </div>
    </div>

    <div class="col-md-9">
      <div class="page-header">
        <h3>
          @lang('header.profesorado')
        </h3>
      </div>
      <br>
      <div class="widget-content">
        <table class="table table-striped table-bordered" style="overflow: auto; max-width: 100%; display: block;">
          <thead>
            <tr style="background: #b50045; color:white;">
              <th id="">@lang('header.nombre')
              </th>
              <th id="">@lang('header.apellidos')
              </th>
              <th id="">@lang('header.departamento')
              </th>
              <th id="">@lang('header.email')
              </th>
              <th id="">@lang('header.registrado')
              </th>
              <th class="td-actions" id="table_action">@lang('header.accion')</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($profesores['profe_admin'] as $profesor) @foreach ($profesores['user'] as $usuario) @foreach ($profesores['departamento']
            as $departamento) 
            @if($profesor['id_user']==$usuario['id']) 
            @if($profesor['id_depar']==$departamento['id'])
            <div>
              <tr>

                <td>{{$usuario['nombre']}}</td>
                <td>{{$usuario['apellidos']}}</td>
                <td>{{$departamento['nombre']}}</td>
                <td>{{$usuario['email']}}</td>
                <td>
                  <?php $fecha = explode(' ', trim(Auth::user()->created_at));?> {{$fecha[0]}}
                </td>


                <td class="td-actions">
                  <button class="btn btn-default btn-xs" style="float:right;" data-toggle="modal" href="#myModal" data-target="#edit-modal-cust-<?php echo $usuario->id;?>"
                    id="<?php echo $usuario->id;?>">
									<span class="glyphicon glyphicon-pencil"></span> @lang('header.modificar')
									</button>
                  <button style="background: #b50045; color:white;" value="{{$profesor['id']}}" class="borrarProfesor btn btn-default btn-xs"
                    href="javascript:;">
										<span class="glyphicon glyphicon-remove"></span> @lang('header.borrar')
									</button>

                </td>
              </tr>

              <!-- The Modal -->
              <!--modal-->
              <div id="edit-modal-cust-<?php echo $usuario->id;?>" class="modal">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <button class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-header">
                      <h5><b>@lang('header.nombre'):</b>
                      </h5>
                      <input value="{{$usuario['nombre']}}" id="nombre<?php echo $usuario->id;?>" class="form-control">
                    </div>

                    <div class="modal-header">
                      <h5><b> @lang('header.apellidos'):</b>
                      </h5>
                      <textarea id="apellidos<?php echo $usuario->id;?>" class="form-control">{{$usuario['apellidos']}}</textarea>
                    </div>

                    <div class="modal-header">

                      <h5><b> @lang('header.departamento'):</b>
                      </h5>
                      <select class="form-control" id="departamento<?php echo $usuario->id;?>">
                        @foreach ($profesores['departamento'] as $departamentos) 
                        <option 
                        @if($departamentos['id']==$profesor['id_depar'])
                        selected
                        @endif
                        value="{{$departamentos['id']}}">{{$departamentos['nombre']}}</option>
                        @endforeach
                        
                    </select>

                    </div>
                    <div class="modal-header">
                      <h5><b> @lang('header.email'):</b>
                      </h5>
                      <input value="{{$usuario['email']}}" id="email<?php echo $usuario->id;?>" class="form-control">
                    </div>

                    <div class="modal-footer">
                      <button type="submit" value="{{$usuario->id}}" class="updateProfe btn btn-danger" data-dismiss="modal">@lang('header.guardar')</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endif @endif @endforeach @endforeach @endforeach
          </tbody>
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