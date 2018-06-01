<h1 class="page-header">Conectar SSH</h1>

<!-- <ol class="breadcrumb">
    <li>
        <a href="?c=dispositivo">Dispositivos</a>
    </li>
    <li class="active">Listagem de Dispositivos</li>
</ol> -->

<form id="frm-proveedor" action="?c=ssh&a=connect" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleFormControlSelect1">Selecione o Dispositivo</label>
        <select class="form-control" name="id_dispositivo">
            <?php foreach($this->model->select_all() as $r): ?>
                <option value="<?php echo $r->id_dispositivo; ?>"><?php echo $r->hostname . " - " . $GLOBALS["tipos"][$r->tipo]; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Usuário</label>
        <input type="text" name="usuario" value="" class="form-control" placeholder="Usuário" />
    </div>

    <div class="form-group">
        <label>Senha</label>
        <input type="password" name="senha" value="" class="form-control" placeholder="Senha" />
    </div>

    <hr />
    <div class="text-right">
        <button class="btn btn-success">Conectar</button>
    </div>
</form>