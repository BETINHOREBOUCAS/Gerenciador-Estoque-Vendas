<?php $render('header', ['usuario' => $usuario]); ?>

<div class="produto">
    <div class="botao-produto">
        <a href="<?= $base; ?>/producao/addatividade" class="modal_ajax" info="Adicionar Atividade"><button class="btn btn-success" style="background-color: orangered;"><i class="fas fa-cogs"></i> Adicionar
                atividade</button></a>
    </div>
</div>

<div class="tabela-produto">
    <div class="table">
        <?php if (!empty($dados)) : ?>
            <table class="table table-striped table-hover borda">
                <thead>
                    <tr>
                        <th style="width: 15%;">Atividade</th>
                        <th style="width: 20%;">Produto</th>
                        <th style="width: 10%;">Quantidade</th>
                        <th style="width: 15%;">Colaborador</th>
                        <th style="width: 10%;">Entrega</th>
                        <th style="width: 10%;">Recolhido</th>
                        <th style="width: 10%;">Pagamento</th>
                        <!--<th style="width: 10%;">Ações</th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dados as $value) : ?>
                        <?php
                        if (!empty($value['producao']['data_levada'])) {
                           $dataRecolhida = new DateTime($value['producao']['data_levada']);
                        $dataRecolhida = $dataRecolhida->format('d/m/Y'); 
                        }else {
                            $dataRecolhida = "";
                        }
                        
                        
                        $dataLevada = new DateTime($value['producao']['data_entrega']);
                        $dataLevada = $dataLevada->format('d/m/Y');

                        ?>
                        <tr style="vertical-align:middle">
                            <td><?= $value['producao']['setor']; ?></td>
                            <td><?= $value['produto']['nome'];?></td>
                            <td><?= $value['producao']['qtd']; ?></td>
                            <td><?= $value['colaborador']['nome']; ?></td>
                            <td><?=$dataLevada;?></td>
                            <td><?=$dataRecolhida;?></td>
                            <td>
                                <?php if ($value['producao']['pagamento'] == 'Pago') : ?>
                                    <div style="color: green;" title="Pago" class="pag" info="<?= $value['producao']['pagamento']; ?>" info2="<?= $value['producao']['id']; ?>" colaborador="<?= $id_colaborador; ?>">
                                        <i class="far fa-check-circle"></i>
                                    </div>
                                <?php else : ?>
                                    <div style="color: orange;" title="Aguardando" class="pag" info="<?= $value['producao']['pagamento']; ?>" info2="<?= $value['producao']['id']; ?>" colaborador="<?= $id_colaborador; ?>"><i class="far fa-clock"></i></div>
                                <?php endif ?>
                            </td>
                            <!--<td>
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

                            </td>-->
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php endif ?>
    </div>

</div>



<?php $render('footer'); ?>