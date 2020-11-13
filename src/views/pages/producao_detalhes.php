<pre>
 <?php 
 
 $pagamento = isset($_GET['pagamento'])?$_GET['pagamento']:"Aguardando";
 ?>   
</pre>

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
                <tr style="vertical-align:middle">
                    <th style="vertical-align:middle">Qtd. Entrega</th>
                    <th style="vertical-align:middle">Entrega</th>
                    <th style="vertical-align:middle">Recolhido</th>
                    <th style="vertical-align:middle">Qtd. Recolh.</th>
                    <th style="vertical-align:middle">Qtd. Rest.</th>
                    <th style="vertical-align:middle">Pagamento</th>
                    <th style="vertical-align:middle">Produto</th>
                    <th style="vertical-align:middle">Ações</th>
                </tr>
            </thead>

            <tbody>

                <?php 
                $total = 0; 
                $qtdRedes = 0;
                ?>
                <?php foreach ($dados as $value) : ?>
                    <?php
                    $qtdRedes += $value['producao']['qtd'];
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
                                <input type="date" name="dataLevada" class="dataLevada" id="dataLevada<?= $value['producao']['id']; ?>" info2="<?= $value['producao']['id']; ?>">
                            <?php endif ?>
                        </td>

                        <td>
                            <?php if ($value['producao']['qtd'] - $value['producao']['qtd_recolhido'] == 0) : ?>

                            <?php else : ?>
                                <input type="text" name="recolhido" id="recolhido<?= $value['producao']['id']; ?>" style="width: 50px;" class="dataLevada" info2="<?= $value['producao']['id']; ?>">
                            <?php endif ?>
                        </td>

                        <td id="restante<?= $value['producao']['id']; ?>">
                            <?= $value['producao']['qtd'] - $value['producao']['qtd_recolhido']; ?></td>

                        <td>
                            <?php if ($value['producao']['pagamento'] == 'Pago') : ?>
                                <div style="color: green;" title="Pago" class="pag" info="<?= $value['producao']['pagamento']; ?>" info2="<?= $value['producao']['id']; ?>" colaborador="<?= $id_colaborador; ?>">
                                    <i class="far fa-check-circle"></i>
                                </div>
                            <?php else : ?>
                                <div style="color: orange;" title="Aguardando" class="pag" info="<?= $value['producao']['pagamento']; ?>" info2="<?= $value['producao']['id']; ?>" colaborador="<?= $id_colaborador; ?>"><i class="far fa-clock"></i></div>
                            <?php endif ?>
                        </td>
                        <td><?= $value['produto']['nome'] . ", " . $value['produto']['cor'] . ", " . $value['produto']['tamanho']; ?>
                        </td>
                        <td><div title="Informações" style="color: orangered; font-size: 20pt;" class="infor" info2="<?= $value['producao']['id']; ?>" idColaborador="<?= $value['colaborador']['id']; ?>"><i class="fas fa-info-circle"></i></div></td>
                    </tr>
                <?php endforeach ?>                
            </tbody>
            <?php if($pagamento == "Aguardando"):?>
            <tfoot>
            <tr style="vertical-align:middle; background-color: lightcoral;">
                    <th colspan="5">Valor Devido:</th>
                    <th colspan="3">R$ <?=number_format($qtdRedes*$dados[0]['colaborador']['preco'], 2, ',', '.');?></th>
                </tr>
            </tfoot>
            <?php endif ?>
        </table>
    <?php else : ?>
        <center>
            <h3>Nenhuma informação encontrada com este filtro!</h3>
        </center>

    <?php endif ?>
</div>

<script src="<?= $base; ?>/assets/js/acao_modal.js"></script>