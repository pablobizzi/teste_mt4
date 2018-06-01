<h1 class="page-header">Dispositivos</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=dispositivo&a=create">Novo</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Hostname</th>
            <th style="width:120px;">IP</th>
            <th style="width:120px;">Tipo</th>
            <th style="width:120px;">Fabricante</th>
            <th style="width:120px;">Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->select_all() as $r): ?>
        <tr>
            <td><?php echo $r->hostname; ?></td>
            <td><?php echo $r->ip; ?></td>
            <td><?php echo $GLOBALS["tipos"][$r->tipo]; ?></td>
            <td><?php echo $r->fabricante; ?></td>
            <td>
                <a class="btn btn-info" href="?c=dispositivo&a=edit&id_dispositivo=<?php echo $r->id_dispositivo; ?>">Editar</a>
                <a class="btn btn-danger" onclick="javascript:return confirm('Confirma remoção de dispositivo?');" href="?c=dispositivo&a=delete&id_dispositivo=<?php echo $r->id_dispositivo; ?>">Remover</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
