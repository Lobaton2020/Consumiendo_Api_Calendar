
<div class="container">
  <h2 class="text-center">Añadir token</h2>
  <form method="POST">
      <input type="hidden" name="c" value="agend" >
      <input type="hidden" name="m" value="save" > 

    <div class="form-group">
      <label for="exampleInputPassword1">Descripcion</label>
      <input type="text" name="descripcion" class="form-control" id="exampleInputPassword1" style="height:100px">
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Inicio Fecha</label>
      <input type="date" name="fecha" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Inicio Hora</label>
      <input type="time" name="hora" class="form-control" id="exampleInputPassword1">
    </div>

    <!-- <div class="form-group">
      <label for="exampleInputPassword1">Fin</label>
      <input type="text" name="token" class="form-control" id="exampleInputPassword1">
    </div> -->

    <button type="submit" class="btn btn-primary btn-block btn-lg">Guardar Evento</button>
  </form>
</div>