<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-BR">
<?php $this->load->view('_partials/head'); ?>
<body>
<?php $this->load->view('_partials/header');?>
<div class="container container-person mt-5 p-5">
    <?=write_message()?>
    <?php
    $action_form = '/order/save/';
    $client_id = 0;
    if(isset($order) && $order){
        foreach ($order as $pedido);
        $action_form = $action_form.$pedido->id ?>
        <h1>Editar Pedido: <?= $pedido->id ?></h1>
    <?php } else { ?>
        <div id="novoPedido">
            <h1>NOVO PEDIDO</h1>
        </div>
    <?php }
    if($products) { ?>
    <form id="form_make_order" method="post" action="<?=site_url($action_form)?>">

        <div class="col-md-12 col-lg-12">
            <select class="col-md-12 col-lg-12" id="sel_client_id" name="sel_client"  className="form-control">
                <option value="0" disabled selected>Seleccione Cliente</option>;
                  <?php 
                    foreach ($clients as $client) {
                        echo '<option value ="'.$client->client_id.'">'.$client->apellidoNombre.'</option>';
                    }
                   
                  ?>
            </select>

        </div>

        <?php foreach ($products as $product) { ?>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-xs-4 nome"><b>Nome</b></div>
                    <div class="col-sm-2 col-xs-2 sku"><b>SKU</b></div>
                    <div class="col-sm-3 col-xs-3 precio"><b>Preço</b></div>
                    <div class="col-sm-3 col-xs-3 quantidade"><b>Quantidade</b></div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-xs-4"><?= $product->nome ?></div>
                    <div class="col-sm-2 col-xs-2"><?= $product->sku ?></div>
                    <div class="col-sm-3 col-xs-3">R$ <?= $product->preco ?></div>
                    <div class="col-sm-3 col-xs-3"><input type="number" class=" inputQuantidade" id="product[<?=$product->id?>]" name="product[<?=$product->id?>]" step="1" min="0" max="100"
                                                          onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="0"></div>
                </div>
            </div>
        <?php } ?>
        <div class="col-md-12 col-lg-12">
            <button class="btn btn-primary col-md-12 col-lg-12 buttonCriarPedido" type="submit">Criar pedido</button>
             <?php
                if(isset($_POST['submit'])){
                    if(!empty($_POST['sel_client'])) {
                      $selected = $_POST['sel_client'];
                      echo 'You have chosen: '.$selected;
                      $action_form = $action_form.$client_id->$selected;
                    } else {
                      echo 'Please select the value.';
                    }
                }
            ?>

        </div>
        <?php } else { ?>
            <div class="col-sm-12 col-xs-12">Não há produtos</div>
        <?php } ?>
</div>
<?php $this->load->view('_partials/scripts'); ?>
</body>

</html>