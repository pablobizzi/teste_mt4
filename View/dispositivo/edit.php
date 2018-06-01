<h1 class="page-header">
    Editar Dispositivo
</h1>

<ol class="breadcrumb">
  <li><a href="?c=dispositivo">Dispositivos</a></li>
  <li class="active">Editar</li>
</ol>

<form id="frm-proveedor" action="?c=dispositivo&a=update" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Hostname</label>
      <input type="text" name="hostname" value="<?php echo $disp->hostname; ?>" class="form-control" placeholder="Hostname" data-validacion-tipo="requerido|min:20" />
    </div>

    <div class="form-group">
        <label>IP</label>
        <input type="text" name="ip" value="<?php echo $disp->ip; ?>" class="form-control" placeholder="IP" data-validacion-tipo="requerido|min:100" />
    </div>

    <!-- <div class="form-group">
        <label>Tipo</label>
        <input type="text" name="tipo" value="<?php echo $disp->tipo; ?>" class="form-control" placeholder="Tipo" data-validacion-tipo="requerido|min:100" />
    </div> -->

    <div class="form-group">
        <label>Tipo de Dispositivo</label>
        <select class="form-control" name="tipo">
            <?php foreach($GLOBALS["tipos"] as $key => $t): ?>
                <option value="<?php echo $key; ?>" <?php if($disp->tipo == $key) { echo "selected"; } ?>><?php echo $t; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Fabricante</label>
        <input type="text" name="fabricante" value="<?php echo $disp->fabricante; ?>" class="form-control" placeholder="Fabricante" data-validacion-tipo="requerido|min:10" />
    </div>

    <hr />
    <input type="hidden" name="id_dispositivo" value="<?php echo $disp->id_dispositivo; ?>" />
    <div class="text-right">
        <button class="btn btn-success">Salvar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-proveedor").submit(function(){
            return $(this).validate();
        });
    })
</script>
