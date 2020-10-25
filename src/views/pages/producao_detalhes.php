<div style="display: flex; justify-content: center;">
    <input type="hidden" name="id_colaborador" id="id_colaborador" value="<?= $id_colaborador; ?>">
    <div>
        <label for="pagamento">Situação do Pagamento:</label><br>
        <select class="form-control" name="pagamento" id="pagamento">
            <option value="Aguardando" <?= $pagamento == 'Aguardando' ? 'selected' : ''; ?>>Aguardando</option>
            <option value="Pago" <?= $pagamento == 'Pago' ? 'selected' : ''; ?>>Pago</option>
        </select>
    </div>

    <div style="margin-left: 20px;">
        <label for="pagamento">Ordenar por data::</label><br>
        <select class="form-control" name="ordenar" id="ordenar">
            <option value="asc" <?= $ordenar == 'asc' ? 'selected' : ''; ?>>Crescente</option>
            <option value="desc" <?= $ordenar == 'desc' ? 'selected' : ''; ?>>Decrescente</option>
        </select>
    </div>
</div> <br>

<div class="table" style="width: 100%;">
    <?php if (!empty($dados)) : ?>
    <table class="table table-striped table-hover borda" style="text-align: center;">
        <thead>
            <tr>
                <th style="width: 10%;">Qtd.</th>
                <th style="width: 15%;">Entrega</th>
                <th style="width: 15%;">Recolhido</th>
                <th style="width: 10%;">Pagamento</th>
                <th style="width: 20%;">Produto</th>
                <th style="width: 10%;">Cor</th>
                <th style="width: 10%;">Tamanho</th>
            </tr>
        </thead>

        <tbody>

            <?php $total = 0; ?>
            <?php foreach ($dados as $value) : ?>
            <?php 
                $dataEntrega = new DateTime($value['producao']['data_entrega']);
                $dataEntrega = $dataEntrega->format('d/m/Y');
            ?>
            <tr style="vertical-align:middle">
                <td><?= $value['producao']['qtd']; ?></td>
                <td><?= $dataEntrega; ?></td>
                <td>
                    <?php if (!empty($value['producao']['data_levada'])) : ?>
                        <?php 
                                $dataLevada = new DateTime($value['producao']['data_levada']);
                                $dataLevada = $dataLevada->format('d/m/Y');
                        ?>
                    <?= $dataLevada; ?>
                    <?php else : ?>
                    <input type="datetime-local" name="dataLevada" class="dataLevada"
                        info2="<?= $value['producao']['id']; ?>">
                    <?php endif ?>
                </td>
                <td>
                    <?php if ($value['producao']['pagamento'] == 'Pago') : ?>
                    <div style="color: green;" title="Pago" class="pag" info="<?= $value['producao']['pagamento']; ?>"
                        info2="<?= $value['producao']['id']; ?>" colaborador="<?= $id_colaborador; ?>">
                        <i class="far fa-check-circle"></i></div>
                    <?php else : ?>
                    <div style="color: orange;" title="Aguardando" class="pag"
                        info="<?= $value['producao']['pagamento']; ?>" info2="<?= $value['producao']['id']; ?>"
                        colaborador="<?= $id_colaborador; ?>"><i class="far fa-clock"></i></div>
                    <?php endif ?>
                </td>
                <td><?= $value['produto']['nome']; ?></td>
                <td><?= $value['produto']['cor']; ?></td>
                <td><?= $value['produto']['tamanho']; ?></td>

            </tr>
            <?php endforeach ?>

        </tbody>
    </table>
    <?php else : ?>
    <center>
        <h3>Nenhuma informação encontrada com este filtro!</h3>
    </center>

    <?php endif ?>
</div>

<script src="<?= $base; ?>/assets/js/acao_modal.js"></script>