
<div class="container">
  <h2 class="text-center">Crear evento</h2>
  <form method="POST">
    <?php showMessage("url", "success")?>
    <?php showMessage("error", "danger")?>
      <input type="hidden" name="c" value="agend" >
      <input type="hidden" name="m" value="save" >

    <div class="form-group">
      <label for="exampleInputPassword1">Titulo</label>
      <input type="text" name="titulo" value="Llamar a mama" class="form-control" id="exampleInputPassword1" placeholder="Titulo">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Descripcion</label>
      <textarea name="descripcion" id="exampleInputPassword1" class="form-control" cols="30" rows="5"  placeholder="Descripcion">Saludarla y deseraler una feli navidad jojojo</textarea>
    </div>
  <div class="form-row">
    <div class="col-md-6">
        <h5>Inicio</h5>
       <div class="form-group">
            <label for="exampleInputPassword1">Inicio Fecha</label>
            <input type="date" name="fechainicio" value="<?=date("Y-m-d")?>" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Inicio Hora</label>
            <input type="time" name="horainicio" class="form-control" value="" id="exampleInputPassword1">
          </div>
      </div>
       <div class="col-md-6">
       <h5>Finalizacion</h5>
          <div class="form-group">
            <label for="exampleInputPassword1">Fecha Finalizacion</label>
            <input type="date" name="fechafin" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Hora Finalizacion</label>
            <input type="time" name="horafin" class="form-control" id="exampleInputPassword1">
          </div>
       </div>
  </div>
    <button type="submit" class="btn btn-primary btn-block btn-lg">Guardar Evento</button>
  </form>
</div>