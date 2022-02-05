<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-BR">
<?php $this->load->view('_partials/head'); ?>
<body>
<?php $this->load->view('_partials/header'); ?>
<div class="container container-person mt-5 p-5">
    <?=write_message()?>
    <h1>Client #<?=$client_id?></h1>

    <table id="client_table" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dni</th>
            <th>Fec Nacimiento</th>
            <th>Correo</th>
        </tr>
        </thead>
        <tbody>
        <?php if($clients) { ?>
            <?php foreach ($clients as $client) { ?>
                <tr>
                    <td><?= $client->nombre ?></td>
                    <td><?= $client->apellido ?></td>
                    <td><?= $client->dni ?></td>
                    <td><?= $client->fecNacimiento ?></td>
                    <td><?= $client->correo ?></td>
                </tr>
            <?php }
        } else { ?>
            <td class="text-center" colspan="4">Não há clients </td>
        <?php } ?>
        </tbody>
    </table>
<!--     <div class="row">
        <div class="col-sm-12">
            <h2 class="float-right mt-5">Total - R$<?= number_format($total, 2, ',','.') ?></h2>
        </div>
    </div> -->
    <div class="row">
        <div class="col-sm-12">
            <a href="#" data-id="<?=base_url('client/delete/'.$client_id)?>" class="btn btn-danger delete-client w-100 mt-5" data-toggle="modal" data-target="#deleteClientModal">Excluir</a>
        </div>
    </div>
</div>
<?php $this->load->view('_partials/client/delete_client_confirm_modal'); ?>
<?php $this->load->view('_partials/scripts'); ?>
</body>

</html>