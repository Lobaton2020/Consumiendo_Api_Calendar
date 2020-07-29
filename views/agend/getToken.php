
<div class="container">
  <h2 class="text-center">Añadir token</h2>
  <form method="POST">
      <input type="hidden" name="c" value="agend" >
      <input type="hidden" name="m" value="validateToken" >

    <div class="form-group">
      <label for="exampleInputPassword1">Token</label>
      <input type="text" name="token" class="form-control" id="exampleInputPassword1" placeholder="Pon aqui el token">
    </div>

    <button type="submit" class="btn btn-primary btn-block btn-lg">Enviar Token</button>
  </form>
</div>
