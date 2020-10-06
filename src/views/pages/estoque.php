<?php $render('header'); ?>

<div class="produto">
    <div class="botao-produto">
        <a href="<?= $base; ?>/estoque/addProduto"><button class="btn btn-success"><i class="fas fa-plus-circle"></i>
                Adicionar produto</button></a>
    </div>
    <div class="busca-produto">
        <form method="post">
            <div><input type="text" name="busca" id="busca" class="form-control" placeholder="Buscar"></div>
            <div><button class="btn-form"><i class="fas fa-search"></i></button></div>
        </form>
    </div>
</div>

<div class="tabela-produto">
    <div class="table">
        <?php if (!empty($produtos)) : ?>
            <table class="table table-striped table-hover borda">
                <thead>
                    <tr>
                        <th style="width: 10%;">Cod.</th>
                        <th style="width: 30%;">Produto</th>
                        <th style="width: 10%;">Cor</th>
                        <th style="width: 10%;">Tamanho</th>
                        <th style="width: 10%;">Estoque</th>
                        <th style="width: 10%;">Preço</th>
                        <th style="width: 10%;">Ações</th>
                    </tr>
                </thead>
                <tbody>


                    <?php foreach ($produtos as $value) : ?>
                        <tr style="vertical-align:middle">
                            <td><?= $value['id']; ?></td>
                            <td><?= $value['nome']; ?></td>
                            <td><?= $value['cor']; ?></td>
                            <td><?= $value['tamanho']; ?></td>
                            <td><?= $value['quantidade']; ?></td>
                            <td>R$ <?= number_format($value['preco'], 2, ",", "."); ?></td>
                            <td>
                                <div class="icons-table">
                                    <a href="">
                                        <div id="lupa"><i class="fas fa-search"></div></i>
                                    </a>
                                    <a href="">
                                        <div id="editar"><i class="fas fa-edit"></div></i>
                                    </a>
                                    <a href="">
                                        <div id="excluir"><i class="fas fa-times-circle"></div></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>


                </tbody>
            </table>
        <?php endif ?>
    </div>

</div>

<?php $render('footer'); ?>