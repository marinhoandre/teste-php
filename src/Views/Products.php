<div class="panel-body">
    <div class="col-sm-12">
        <div class="title-page-button">
            <h2>Lista de Produtos</h2>
            <a href="<?php echo URL; ?>product/new" class="btn btn-success" alt="Novo Registro" title="Novo Registro" >
                <i class="fa fa-file"></i> Novo Registro
            </a>
        </div>
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <table class="table table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($this->Dados['Products'] as $product) { ?>
                        <tr>
                            <td
                                <?php
                                if ($product['quantity'] <= 3) {
                                    echo "class='bg-success'";
                                }
                                ?>>
                                <?php echo $product['id']; ?>
                            </td>
                            <td <?php
                            if ($product['quantity'] <= 3) {
                                echo "class='bg-success'";
                            } ?> >
                                <a href="<?php echo URL; ?>product/details/<?php echo $product['id']; ?>">
                                <?php echo $product['name']; ?>
                                </a>
                            </td>
                            <td <?php
                            if ($product['quantity'] <= 3) {
                                echo "class='bg-success'";
                            } ?> >
                                <?php echo $product['quantity']; ?></td>
                            <td <?php
                            if ($product['quantity'] <= 3) {
                                echo "class='bg-success'";
                            } ?> >
                                R$ <?php echo number_format( $product['price'] , 2, ',', '.'); ?>
                            </td>
                            <td <?php
                            if ($product['quantity'] <= 3) {
                                echo "class='bg-success'";
                            } ?> >
                                <a href="<?php echo URL; ?>product/edit/<?php echo $product['id']; ?>"
                                   class="btn btn-default">
                                    <i class="fa fa-pencil"></i> Editar
                                </a>
                                <a href="<?php echo URL; ?>product/delete/<?php echo $product['id']; ?>"
                                   class="btn btn-danger">
                                    <i class="fa fa-times"></i> Excluir
                                </a>
                                <a class="btn btn-warning"
                                   onclick="reduzir_estoque(<?php echo $product['id']; ?>, '<?php echo URL; ?>');">
                                    <i class="fa fa-minus-circle"></i> Reduzir Estoque
                                </a>
                                <a class="btn btn-info"
                                   onclick="aumentar_estoque(<?php echo $product['id']; ?>, '<?php echo URL; ?>');">
                                    <i class="fa fa-plus-circle"></i> Aumentar Estoque
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo URL; ?>assets/js/stoke.js"></script>