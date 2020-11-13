<?php $render('header', ['usuario' => $usuario]); ?>

<div class="produto">
    <div class="botao-produto">
        <a href="<?= $base; ?>/colaborador/addcolaborador"><button class="btn btn-success"><i
                    class="fas fa-user-plus"></i> Adicionar colaborador</button></a>
    </div>

    <div class="busca-produto">
        <form method="get" action="<?=$base;?>/colaborador/pesquisa">
            <div>
                <select name="exibir" id="exibir" class="form-control" style="height: 38px; margin-right: 10px;">
                    <option value="Ativo" <?=isset($_GET['exibir']) && $_GET['exibir'] == 'Ativo'?"selected":"";?>>
                        Ativos</option>
                    <option value="Inativo" <?=isset($_GET['exibir']) && $_GET['exibir'] == 'Inativo'?"selected":"";?>>
                        Inativos</option>
                </select>
            </div>
            <div><input type="text" name="busca" id="busca" class="form-control" placeholder="Buscar"></div>
            <div><button class="btn-form"><i class="fas fa-search"></i></button></div>
        </form>
    </div>
</div>

<div class="tabela-produto">
<?php if (!empty($flash)) : ?>
        <div class="msg msgSuccess"><?= $flash; ?></div> <br>
    <?php endif ?>
    <div class="table">
        <?php if (!empty($colaboradores)) : ?>
        <table class="table table-striped table-hover borda">
            <thead>
                <tr>
                    <th style="width: 10%;">ID</th>
                    <th style="width: 45%;">Nome</th>
                    <th style="width: 20%;">Endereço</th>
                    <th style="width: 10%;">Função</th>
                    <th style="width: 10%;">status</th>
                    <th style="width: 10%;">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($colaboradores as $value) : ?>
                <tr style="vertical-align:middle">
                    <td><?= $value['id']; ?></td>
                    <td><?= $value['nome']; ?></td>
                    <td><?= $value['endereco']; ?></td>
                    <td><?= $value['funcao']; ?></td>
                    <td><?= $value['status']; ?></td>
                    <td>
                        <div class="icons-table">
                            <?php if ($value['status'] == 'Ativo') :?>
                            <a href="<?=$base;?>/producao/addproducao/<?= $value['id']; ?>" class="modal_ajax"
                                info="Colocar em produção: #<?= $value['nome']; ?>">
                                <div id="venda"><i class="fas fa-cog"></i></div></i>
                            </a>
                            <?php else :?>
                            <a href="javascript:;"
                                info="Colocar em produção: #<?= $value['nome']; ?>">
                                <div id="venda" style="background-color: gray; cursor: context-menu;"><i class="fas fa-cog"></i></div></i>
                            </a>
                            <?php endif ?>
                            <a href="<?=$base;?>/producao/detalhes/<?= $value['id']; ?>" class="modal_ajax"
                                info="Detalhes da produção: #<?= $value['nome']; ?>">
                                <div id="lupa"><i class="fas fa-search"></div></i>
                            </a>
                            <a href="<?=$base;?>/colaborador/editarColaborador/<?=$value['id']?>">
                                <div id="editar"><i class="fas fa-edit"></div></i>
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