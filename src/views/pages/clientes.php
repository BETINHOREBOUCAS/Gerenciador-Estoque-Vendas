<?php $render('header', ['usuario' => $usuario]); ?>

<div class="produto">
    <div class="botao-produto">
        <a href="<?= $base; ?>/addCliente"><button class="btn btn-success"><i class="fas fa-user-plus"></i> Adicionar cliente</button></a>
    </div>
    <div class="busca-produto">
        <form method="get">
            <div><input type="text" name="busca" id="busca" class="form-control" placeholder="Digite nome, cidade ou telefone do cliente."></div>
            <div><button class="btn-form"><i class="fas fa-search"></i></button></div>
        </form>
    </div>
</div>

<div class="tabela-produto">

    <?php if (!empty($flash)) : ?>
        <div class="msg msgSuccess"><?= $flash; ?></div> <br>
    <?php endif ?>

    <?php if (!empty($data)) : ?>

        <div class="table">
            <table class="table table-striped table-hover borda">
                <thead>
                    <tr>
                        <th style="width: 10%;" class="mobile">ID</th>
                        <th style="width: 45%;">Nome</th>
                        <th style="width: 10%;" class="mobile">Tel1</th>
                        <th style="width: 10%;" class="mobile">Tel2</th>
                        <th style="width: 10%;" class="mobile">Situação</th>
                        <th style="width: 10%;">Ações</th>
                    </tr>
                </thead>
                <?php foreach ($data as $value) : ?>
                    <tbody>
                        <tr style="vertical-align:middle">
                            <td class="mobile"><?= $value['id']; ?></td>
                            <td style="text-align: left; padding-left: 30px;"><?= $value['nome']; ?></td>
                            <td class="mobile"><?= $value['telefone1']; ?></td>
                            <td class="mobile"><?= $value['telefone2']; ?></td>
                            <td class="mobile">
                                <?php if($value['situacao'] == 'Ativo') :?>
                                <div style="color: green;" title="Ativo"><i class="far fa-check-circle"></i></div>
                                <?php else :?>
                                <div style="color: red;" title="Inativo"><i class="fas fa-ban"></i></div> 
                                <?php endif ?>
                            </td>
                            <td>
                                <div class="icons-table">
                                    <?php if ($value['situacao'] == 'Ativo') : ?>
                                        <a href="<?= $base; ?>/addVenda/<?= $value['id']; ?>">
                                            <div id="venda" title="Vender"><i class="fas fa-shopping-cart"></i></div>
                                        </a>
                                    <?php else : ?>
                                        <a href="javascript:;">
                                            <div id="venda" style="background-color: gray; cursor: context-menu;"><i class="fas fa-shopping-cart"></i></div>
                                        </a>
                                    <?php endif ?>
                                    <a href="<?= $base; ?>/clientes/consulta/<?= $value['id']; ?>">
                                        <div id="lupa" title="Consulta"><i class="fas fa-search"></div></i>
                                    </a>
                                    <a href="<?= $base; ?>/clientes/editar/<?= $value['id']; ?>">
                                        <div id="editar" title="Editar"><i class="fas fa-edit"></div></i>
                                    </a>
                                    <?php if ($value['situacao'] == 'Ativo') : ?>
                                        <a href="<?= $base; ?>/clientes/excluir/<?= $value['id']; ?>" class="modal_ajax" info="Excluir #<?= $value['nome']; ?>">
                                            <div id="excluir" title="Excluir"><i class="fas fa-times-circle"></div></i>
                                        </a>
                                    <?php else : ?>
                                        <a href="javascript:;" info="Excluir #<?= $value['nome']; ?>">
                                            <div id="excluir" style="background-color: gray; cursor: context-menu;"><i class="fas fa-times-circle"></div></i>
                                        </a>
                                    <?php endif ?>
                                </div>

                            </td>
                        </tr>
                    </tbody>
                <?php endforeach ?>
            </table>
        </div>


    <?php else : ?>

    <?php endif ?>

</div>

<?php $render('footer'); ?>