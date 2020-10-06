<?php
$totalCompra = 0;
foreach ($produtos as $valor) {
    $saldo = $valor['quantidade'] * $valor['preco'];
    $totalCompra += $saldo;
}

?>
<?php $render('header'); ?>

<div class="form">
    <div class="title">Carrinho: <?= $cliente['nome']; ?></div>
    <hr>
</div>

<div class="produto">
    <div class="botao-produto">
        <a href="#"><button class="btn btn-success"><i class="fas fa-shopping-cart"></i> R$ <?= number_format($totalCompra, 2, ",", "."); ?></button></a>
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
                                    <a href="<?= $base; ?>/carrinho/excluir/<?= $value['id_carrinho']; ?>/<?= $cliente['id']; ?>">
                                        <div id="excluir" title="Excluir"><i class="fas fa-times-circle"></div></i>
                                    </a>
                                </div>

                            </td>
                        </tr>
                    </tbody>
                <?php endforeach ?>
            </table>
            
            <div class="forma-pagamento">
                <div class="pagamento">
                    <h2>Forma de pagamento</h2>
                    <form method="post">
                        <div>
                            <label for="avista">avista</label>
                            <input type="radio" name="pagamento" id="avista" value="avista">

                            <label for="cartao">cartao</label>
                            <input type="radio" name="pagamento" id="cartao" value="cartao">

                            <label for="parcelado">parcelado</label>
                            <input type="radio" name="pagamento" id="parcelado" value="parcelado">
                        </div>
                        <br>
                        <div>
                            <label for="datacompra">Data da compra:</label><br>
                            <input type="date" name="datacompra" id="datacompra" class="form-control"> <br><br>
                            <label for="desconto">Desconto:</label><br>
                            <input type="text" name="desconto" id="desconto" class="form-control" placeholder="Digite o valor do desconto se possuir.">
                        </div>
                        <br>
                        <div>
                            <select name="parcelas" id="parcelas" class="form-control" style="display: none;">
                                <option value="">Quantidade de parcelas</option>
                                <option value="1">1 Parcela</option>
                                <?php for ($i = 2; $i <= 12; $i++) : ?>
                                    <option value="<?= $i; ?>"><?= $i; ?> Parcelas</option>
                                <?php endfor ?>
                            </select>
                        </div>
                        <br>
                        <div>
                            <input type="submit" value="Fechar Pedido" class="btn btn-success">
                        </div>

                    </form>
                </div>
            </div>


        <?php endif ?>
    </div>

</div>
<script src="<?=$base;?>/assets/js/jquery.min.js"></script>
<script>
    $('#cartao').click(function () {
    var estado = $(this).val();

    $("#parcelas").show();
});

$('#parcelado').click(function () {
    var estado = $(this).val();

    $("#parcelas").show();
});

$('#avista').click(function () {
    var estado = $(this).val();

    $("#parcelas").hide();
});
</script>
<?php $render('footer'); ?>