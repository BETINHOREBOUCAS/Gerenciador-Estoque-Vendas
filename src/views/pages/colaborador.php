<?php $render('header'); ?>

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
        <table class="table table-striped table-hover borda">
            <thead>
                <tr>
                    <th style="width: 10%;">Cod.</th>
                    <th style="width: 45%;">Nome</th>
                    <th style="width: 10%;">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr style="vertical-align:middle">
                    <td>1</td>
                    <td>Tijubana</td>
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
                <tr style="vertical-align:middle">
                    <td>1</td>
                    <td>Tijubana</td>
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
                <tr style="vertical-align:middle">
                    <td>1</td>
                    <td>Tijubana</td>
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
                <tr style="vertical-align:middle">
                    <td>1</td>
                    <td>Tijubana</td>
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
                <tr style="vertical-align:middle">
                    <td>1</td>
                    <td>Tijubana</td>
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
                
            </tbody>
        </table>
    </div>

</div>

<?php $render('footer'); ?>