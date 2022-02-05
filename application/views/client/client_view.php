<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-BR">
<?php $this->load->view('_partials/head'); ?>
<body>
<?php $this->load->view('_partials/header'); ?>
<div class="container container-person mt-5 p-5">
    <?=write_message()?>
    <div id="listaCli">
        <h1>LISTA DE CLIENTES</h1>
    </div>
    <div class="col-md-12 mb-3">
        <div class="row">
            <a class="btn btn-primary" href="<?= base_url('client/form/') ?>">Novo Cliente</a>
        </div>
    </div>
    <table id="client_table" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
        <thead>
        <tr>   
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dni</th>
            <th>Fec Nacimiento</th>
            <th>Correo</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if($clients) {
            
            foreach ($clients as $client) { ?>

                <tr>
                    <td><?= $client->id ?></td>
                    <td><?= $client->nombre ?></td>
                    <td><?= $client->apellido ?></td>
                    <td><?= $client->dni ?></td>
                    <td><?= $client->fecNacimiento ?></td>
                    <td><?= $client->correo ?></td>
                    <td><a href="<?= base_url('client/form/'.$client->id) ?>">Editar</a></td>
                    <td><a class="delete-client" href="#" data-id="<?= base_url('client/delete/'.$client->id) ?>" data-toggle="modal" data-target="#deleteClientModal">Eliminar</a></td>
                </tr>

            <?php }
        } else { ?>
            <td class="text-center" colspan="6">Não há clientes</td>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php $this->load->view('_partials/client/delete_client_confirm_modal'); ?>
<?php $this->load->view('_partials/scripts'); ?>
</body>

</html>