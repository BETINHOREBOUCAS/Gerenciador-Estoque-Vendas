<?php
if (isset($_GET['ordenar'])) {
    $ordenar = $_GET['ordenar'];
} else {
    $ordenar = '';
}
?>
<?php $render('header', ['usuario' => $usuario]); ?>

<div class="form">
    <div class="title">Ordens: <?= $cliente['nome']; ?></div>
    <hr>
</div>

<div class="produto">
    <?php if (!empty($ordens)) : ?>
        <div class="busca-produto">
            <form method="get">
                <select name="ordenar" id="organizar" class="form-control">
                    <option value="">Ordenar por:</option>
                    <option value="asc" <?= $ordenar == 'asc' ? 'selected' : ''; ?>>Data Crescente</option>
                    <option value="desc" <?= $ordenar == 'desc' ? 'selected' : ''; ?>>Data Decrescente</option>
                </select>

                <div><button class="btn-form">Aplicar</i></button></div>
            </form>
        </div>
</div>

<div class="tabela-produto">

    <div class="table">
        <table class="table table-striped table-hover borda">
            <thead>
                <tr>
                    <th style="width: 10%;">Nº Ordem</th>
                    <th style="width: 8%;">Data</th>
                    <th style="width: 8%;">Valor</th>
                    <th style="width: 8%;">Desconto</th>
                    <th style="width: 8%;">Total</th>
                    <th style="width: 13%;">Forma Pagamento</th>
                    <th style="width: 10%;">Situação</th>
                    <th style="width: 5%;">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ordens as $value) : ?>
                    <?php
                    $date = new DateTime($value['data_ordem']);
                    $data = $date->format("d/m/Y");
                    ?>
                    <tr>
                        <td><?= $value['ordem']; ?></td>
                        <td><?= $data; ?></td>
                        <td>R$ <?= number_format($value['total'], 2, ",", "."); ?></td>
                        <td>R$ <?= number_format($value['desconto'], 2, ",", "."); ?></td>
                        <td>R$ <?= number_format($value['total'] - $value['desconto'], 2, ",", "."); ?></td>
                        <td><?= $value['forma_pagamento']; ?></td>
                        <td><?= $value['status']; ?></td>
                        <td>
                            <div class="icons-table">
                                <a href="<?= $base; ?>/ordens/consulta/<?= $value['ordem']; ?>" class="modal_ajax" info="Detalhes #<?= $value['ordem']; ?>">
                                    <div id="lupa" title="Consulta"><i class="fas fa-search"></div></i>
                                </a>
                                <!--<a href="<?= $base; ?>/ordens/editar/<?= $value['ordem']; ?>" class="modal_ajax" info="Editar #<?= $value['ordem']; ?>">
                                    <div id="editar" title="Editar"><i class="fas fa-undo-alt"></div></i>
                                </a>-->
                                <a href="<?= $base; ?>/ordens/cancelar/<?= $value['ordem']; ?>" class="modal_ajax" info="Cancelar #<?= $value['ordem']; ?>">
                                    <div id="excluir" title="Cancelar"><i class="fas fa-times-circle" info="Cancelar <?= $value['ordem']; ?>"></div></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>

            </tbody>

        </table>
    </div>
</div>
<?php else : ?>
    <div class="busca-produto">
        Não existe ordens para este usuario
    </div>
<?php endif ?>
<?php $render('footer'); ?>