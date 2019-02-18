<div class="panel-body">
    <div class="col-sm-12">
        <h2>Dashboard</h2>
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-12 table-responsive list-dashboard">
                    <h4>Produtos com estoque baixo</h4>
                    <table class="table table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($this->Dados['ProductsLowStock'] as $stock) { ?>
                            <tr>
                                <td><?php echo $stock['name']; ?></td>
                                <td><?php echo $stock['quantity']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="col-sm-12 table-responsive" style="background-color: #fff; border-radius: 10px;">
                    <h4>Últimos Produtos movimentados</h4>
                    <table class="table table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($this->Dados['ProductsMovement'] as $movement) { ?>
                            <tr>
                                <td><?php echo $movement['name']; ?></td>
                                <td><?php echo $movement['quantity']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>