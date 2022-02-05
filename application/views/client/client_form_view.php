<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-BR">
<?php $this->load->view('_partials/head'); ?>
<body>
<?php $this->load->view('_partials/header'); ?>
<div class="container container-person mt-5 p-5">
    <?=write_message()?>
    <?php
    $action_form = '/client/save/';
    if(isset($client) && $client){
        foreach ($client as $cliente);
        $action_form = $action_form.$cliente->id ?>
        <h1>Editar Cliente: <?= $cliente->nombre ?></h1>
    <?php } else { ?>
        <h1>Listado de Clientes</h1>
    <?php } ?>
    <form id="form_client" method="post" enctype="multipart/form-data" action="<?=site_url($action_form)?>">
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="nombre">Nombre *</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required value="<?= (isset($cliente) ? $cliente->nombre : '') ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label for="apellido">Apellido *</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" required value="<?= (isset($cliente) ? $cliente->apellido : '') ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label for="dni">DNI *</label>
                <input type="text" class="form-control" id="dni" name="dni" placeholder="DNI" required value="<?= (isset($cliente) ? $cliente->dni : '') ?>">
             </div>

            <div class="col-md-4 mb-3">
                <label for="fecNacimiento">Fec Nacimiento *</label>
                <input type="date" class="form-control" id="fecNacimiento" name="fecNacimiento" placeholder="Fec Nacimiento" required value="<?= (isset($cliente) ? $cliente->fecNacimiento : '') ?>">
             </div>

            <div class="col-md-4 mb-3">
                <label for="correo">Correo *</label>
                <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" required value="<?= (isset($cliente) ? $cliente->correo : '') ?>">
            </div>

        </div>
        <button class="btn btn-primary" type="submit">Enviar</button>
        <?= (isset($cliente) ? '<a href="#" data-id="'.base_url('client/delete/'.$cliente->id).'" class="btn btn-danger delete-client" data-toggle="modal" data-target="#deleteClientModal">Excluir</a>' : '') ?>
    </form>
</div>
<?php $this->load->view('_partials/client/delete_client_confirm_modal'); ?>
<?php $this->load->view('_partials/scripts'); ?>
</body>

</html>