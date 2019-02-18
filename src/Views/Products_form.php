<div class="panel-body">
    <div class="col-sm-12">
        <div class="title-page-button">
            <h2>Editar Produto</h2>
            <a href="<?php echo URL; ?>product" class="btn btn-info" alt="Novo Registro" title="Novo Registro" >
                <i class="fa fa-arrow-left"></i> Cancelar
            </a>
        </div>
        <div class="row">
            <div class="panel panel-flat">
                <div class="panel-body">
                    <form class="form-horizontal" id="formulario-salvar">
                        <input type="hidden" id="url" name="url" value="<?php echo URL; ?>">
                        <input
                                type="hidden"
                                id="id"
                                name="id"
                                value="<?php
                                if (isset($this->Dados['product'])) {
                                    echo $this->Dados['product'][0]["id"];
                                } ?>" >
                        <fieldset class="content-group">
                            <div class="col-sm-6 form-group-sm">
                                <label class="control-label">Nome do Produto (*)</label>
                                <input type="text" class="form-control" name="name" id="name" maxlength="255"
                                       value="<?php
                                        if (isset($this->Dados['product'])) {
                                            echo $this->Dados['product'][0]["name"];
                                        } ?>">
                            </div>

                            <div class="col-sm-3 form-group-sm">
                                <label class="control-label">Quantidade</label>
                                <input type="text" maxlength="4" class="form-control" name="quantity" id="quantity"
                                       onKeyPress="return(numero(event))"
                                       value="<?php
                                        if (isset($this->Dados['product'])) {
                                            echo $this->Dados['product'][0]["quantity"];
                                        } ?>">
                            </div>

                            <div class="col-sm-3 form-group-sm">
                                <label class="control-label">Preço (R$)</label>
                                <input type="text" class="form-control" name="price" id="price"
                                       onKeyPress="return(moeda(this,'.',',',event))"
                                       maxlength="11"
                                       value="<?php
                                        if (isset($this->Dados['product'])) {
                                            echo number_format( $this->Dados['product'][0]["price"] , 2, ',', '.');
                                        } ?>">
                            </div>

                            <div class="col-sm-12 form-group-sm">
                                <label class="control-label">Descrição do Produto</label>
                                <textarea style="resize: none; height: 80px;"
                                          class="form-control"
                                          name="description"
                                          id="description"
                                          maxlength="600"><?php
                                            if (isset($this->Dados['product'])) {
                                                echo $this->Dados['product'][0]["description"];
                                            } ?></textarea>
                            </div>

                            <div id="bt-form" class=" form-group-sm col-sm-12 text-right">
                                <button type="submit" id="bt-submit" class="btn btn-success">Salvar</button>
                            </div>
                        </fieldset>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo URL; ?>assets/js/product.js"></script>
<!-- SWEET ALERT -->
<script src="<?php echo URL; ?>assets/sweetalert/sweetalert-dev.js"></script>
<link rel="stylesheet" href="<?php echo URL; ?>assets/sweetalert/sweetalert.css">