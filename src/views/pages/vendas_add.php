<?php $render('header'); ?>

<div class="form">
    <div class="title"><?= $cliente['nome']; ?></div>
    <hr>
</div>

<div class="produto">
    <div class="botao-produto">
        <a href="<?=$base;?>/carrinho/<?=$cliente['id'];?>"><button class="btn btn-success"><i class="fas fa-shopping-cart"></i> <?= $carrinho; ?></button></a>
    </div>

    <div class="busca-produto">
        <form method="post">
            <div><input type="text" name="busca" id="busca" class="form-control" placeholder="Buscar produto"></div>
            <div><button class="btn-form"><i class="fas fa-search"></i></button></div>
        </form>
    </div>
</div>

<div class="tabela-produto">
    <?php if (isset($produtos) && !empty($produtos)) : ?>
        <div class="table">
            <?php if (!empty($flash)) : ?>
                <div class="msg msgSuccess"><?= $flash; ?></div><br>
            <?php endif ?>
            <table class="table table-striped table-hover borda">
                <thead>
                    <tr>
                        <th style="width: 15%;">Cod.</th>
                        <th style="width: 20%;">Produto</th>
                        <th style="width: 10%;">Cor</th>
                        <th style="width: 10%;">Estoque</th>
                        <th style="width: 10%;">Preço</th>
                        <th style="width: 10%;">Add. Carrinho</th>
                    </tr>
                </thead>

                <?php foreach ($produtos as $value) : ?>
                    <tbody>
                        <tr style="vertical-align:middle">
                            <td><?= $value['id']; ?></td>
                            <td><?= $value['nome']; ?></td>
                            <td><?= $value['cor']; ?></td>
                            <td><?= $value['quantidade']; ?></td>
                            <td>R$ <?= number_format($value['preco'], 2, ",", "."); ?></td>
                            <td>
                                <div class="icons-table">
                                    <form action="<?= $base; ?>/addCarrinho/<?= $cliente['id']; ?>/<?= $value['id']; ?>" method="post" id="form-carrinho">

                                        <div><input type="number" name="qtd" id="qtd" max="<?=$value['quantidade'];?>"></div>
                                        
                                        <a href=""><button class="btn2 btn-success"><i class="fas fa-shopping-cart"></i></button></a>

                                    </form>
                                </div>

                            </td>
                        </tr>
                    </tbody>
                <?php endforeach ?>
            <?php endif ?>
            </table>
        </div>

</div>
<?php $render('footer'); ?>