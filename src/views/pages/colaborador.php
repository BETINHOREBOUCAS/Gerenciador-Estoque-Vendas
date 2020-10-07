<?php $render('header', ['usuario' => $usuario]); ?>

<div class="produto">
    <div class="botao-produto">
        <a href="<?=$base;?>/colaborador/addcolaborador"><button class="btn btn-success"><i class="fas fa-user-plus"></i> Adicionar colaborador</button></a>
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
    <?php if (!empty($colaboradores)) :?>
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
                <?php foreach ($colaboradores as $value):?>
                <tr style="vertical-align:middle">
                    <td><?=$value['id'];?></td>
                    <td><?=$value['nome'];?></td>
                    <td><?=$value['endereco'];?></td>
                    <td><?=$value['funcao'];?></td>
                    <td><?=$value['status'];?></td>
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