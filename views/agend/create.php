
<div class="container mb-5">
  <h2 class="text-center">Crear evento</h2>
  <form method="POST" id="form-create">
    <?php showMessage("ok", "success")?>
    <?php showMessage("error", "danger")?>
    <?php if (isset($_SESSION["url"])) {
    echo $_SESSION["url"];
    unset($_SESSION["url"]);
}?>
      <input type="hidden" name="c" value="agend" >
      <input type="hidden" name="m" value="save" >

    <div class="form-group">
      <label for="exampleInputPassword1">Titulo <span class="required"></span></label>
      <input type="text" name="titulo" class="form-control" id="exampleInputPassword1" placeholder="Titulo" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Descripcion</label>
      <textarea name="descripcion" id="exampleInputPassword1" class="form-control" cols="30" rows="5"  placeholder="Descripcion"></textarea>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1"><b>Añadir participantes (separados por comas)</b></label>
      <div class="d-flex">
        <input type="text"  class="form-control d-inline" id="emails" placeholder="user@user.com,user@as.com">
        <input type="button" class="btn btn-success ml-1" value="Añadir" id="revisar-correo">
      </div>
      <div id="emails-render" class="mt-2"></div>
    </div>
  <div class="form-row">
    <div class="col-md-6">
        <h5>Inicio</h5>
       <div class="form-group">
            <label for="exampleInputPassword1">Inicio Fecha <span class="required"></span></label>
            <input type="date"  name="fechainicio" class="form-control" id="exampleInputPassword1" required >
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Inicio Hora <span class="required"></span></label>
            <input type="time"  name="horainicio" class="form-control" value="" id="exampleInputPassword1" required >
          </div>
      </div>
       <div class="col-md-6">
       <h5>Finalizacion</h5>
          <div class="form-group">
            <label for="exampleInputPassword1">Fecha Finalizacion <span class="required"></span></label>
            <input type="date"  name="fechafin" class="form-control" id="exampleInputPassword1" required >
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Hora Finalizacion</label>
            <input type="time"   name="horafin" class="form-control" id="exampleInputPassword1" required >
          </div>
       </div>
  </div>
    <button type="submit" class="btn btn-primary btn-block btn-lg">Guardar Evento</button>
  </form>
</div>