
<div class="container">
<h1 class="text-center">Listado de agendas </h1>

<?php if (isset($data["url"])) {
    $url = $data["url"];
    unset($data["url"]);
}
if (isset($data["error"])) {
    if (is_string($data["error"])) {
        $error = $data["error"];
        unset($data["error"]);
    }
}
?>
<?php if (isset($error)) {?>
    <div class="alert alert-danger" role="alert">
        <?=$error?>
    </div>
<?php }?>
<?php if (isset($url)) {?>
  <a href="<?=$url?>">Acceder con google</a>
<?php }?>
<div class="row row-cols-1 row-cols-md-3">
<?php foreach ($data as $event) {
    $start = $event->start->dateTime;
    if (empty($start)) {
        $start = $event->start->date;
    }
    ?>
  <div class="col mb-4">
    <div class="card h-100">
      <div class="card-body">
        <h5 class="card-title"><?=$start?></h5>
        <p class="card-text"><?=$event->getSummary()?></p>
      </div>
    </div>
  </div>
<?php }?>
</div>
</div>