@extends('layout')
@section('contenido')

{{-- AQUI INICI LA PARTE DE EDITAR EL IVA DE UNA TIENDA --}}
<br>
  <div class="row">
    <div class="col-lg-12">
      <div class="card ">
        <div class="card-header bg-info">
          <h4 class="m-b-0 text-white">CREAR AREA</h4>
        </div>
        <div class="card-body">
          <form action="#" class="form-horizontal">
            <div class="form-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="control-label text-right col-md-3">Nombre Del Area:</label>
                    <div class="col-md-9">
                      <input type="text" id=""  class="form-control">
                      <small class="form-control-feedback"> Area a crear. </small>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="control-label text-right col-md-3">Lider:</label>
                    <div class="col-md-9">
                      <select  class="form-control custom-select" id="">
                          <option value="0">NO HAY LIDERES CREADOS</option>
                      </select>
                      <small class="form-control-feedback"> Lider que estará a cargo del area. </small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-right">
                <button type="button" class="btn btn-success" id="">Crear</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


@endsection
