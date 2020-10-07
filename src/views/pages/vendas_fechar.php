<?php $render('header', ['usuario' => $usuario]); ?>

<div class="form">
    <div class="title">Fechar Pedido: <?= $cliente['nome']; ?></div>
    <hr>
</div>

<div class="produto">
    <div class="botao-produto">
        <a href="#" title="Fechar Compra">
            <button class="btn btn-success"><i class="fas fa-shopping-cart"></i> R$ <?=number_format($totalCompra, 2, ",", ".");?> </button>
        </a>
    </div>

</div>

<div class="tabela-produto">

    <div class="table">
        <?php if (!empty($flash)) : ?>
            <div class="msg msgSuccess"><?= $flash; ?></div><br>
        <?php endif ?>
        <?php if (!empty($produtos)) : ?>
            <table class="table table-striped table-hover borda">
                <thead>
                    <tr>
                        <th style="width: 10%;">Cod.</th>
                        <th style="width: 20%;">Produto</th>
                        <th style="width: 15%;">Cor</th>
                        <th style="width: 15%;">Quantidade</th>
                        <th style="width: 15%;">Preço Unid.</th>
                        <th style="width: 20%;">Total</th>
                        <th style="width: 10%;">Ações</th>
                    </tr>
                </thead>

                <?php foreach ($produtos as $value) : ?>
                    <tbody>
                        <tr style="vertical-align:middle">
                            <td><?= $value['id_produto']; ?></td>
                            <td><?= $value['nome']; ?></td>
                            <td><?= $value['cor']; ?></td>
                            <td><?= $value['quantidade']; ?></td>
                            <td>R$ <?= number_format($value['preco'], 2, ",", "."); ?></td>
                            <td>R$ <?= number_format($value['preco'] * $value['quantidade'], 2, ",", "."); ?></td>
                            <td>
                                <div class="icons-table">
                                    <a href="<?= $base; ?>/carrinho/excluir/<?= $value['id_carrinho']; ?>/<?=$cliente['id'];?>">
                                        <div id="excluir" title="Excluir"><i class="fas fa-times-circle"></div></i>
                                    </a>
                                </div>

                            </td>
                        </tr>
                    </tbody>
                <?php endforeach ?>
            </table>
        <?php endif ?>
    </div>

</div>
<?php $render('footer'); ?>