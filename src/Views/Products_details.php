<div class="panel-body">
    <div class="col-sm-12">
        <div class="title-page-button">
            <h2>Detalhes do Produto</h2>
            <a href="<?php echo URL; ?>product" class="btn btn-info" >
                <i class="fa fa-arrow-left"></i> Voltar
            </a>
        </div>
        <div class="row">
            <div class="panel panel-flat">
                <div class="panel-body">
                        <fieldset class="content-group">
                            <div class="col-sm-6 form-group-sm">
                                <label class="control-label">Nome do Produto (*)</label>
                                <input type="text" class="form-control" readonly
                                       value="<?php
                                        if (isset($this->Dados['product'])) {
                                            echo $this->Dados['product'][0]["name"];
                                        } ?>">
                            </div>

                            <div class="col-sm-3 form-group-sm">
                                <label class="control-label">Quantidade</label>
                                <input type="text" class="form-control" readonly
                                       value="<?php
                                        if (isset($this->Dados['product'])) {
                                            echo $this->Dados['product'][0]["quantity"];
                                        } ?>">
                            </div>

                            <div class="col-sm-3 form-group-sm">
                                <label class="control-label">Preço</label>
                                <input type="text" class="form-control" readonly
                                       value="<?php
                                        if (isset($this->Dados['product'])) {
                                            echo "R$ ".number_format( $this->Dados['product'][0]["price"] , 2, ',', '.');
                                        } ?>">
                            </div>

                            <div class="col-sm-12 form-group-sm">
                                <label class="control-label">Descrição do Produto</label>
                                <textarea style="resize: none; height: 80px;" class="form-control" readonly><?php
                                if (isset($this->Dados['product'])) {
                                    echo $this->Dados['product'][0]["description"];
                                } ?></textarea>
                            </div>
                        </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>