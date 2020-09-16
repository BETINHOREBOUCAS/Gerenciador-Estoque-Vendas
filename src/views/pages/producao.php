<?php $render('header');?>

<div class="produto">
    <div class="botao-produto">
        <a href=""><button class="btn btn-success"><i class="fas fa-cogs"></i> Adicionar produção</button></a>
        <a href=""><button class="btn btn-success" style="background-color: orangered;"><i class="fas fa-cog"></i> Adicionar atividade</button></a>
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
                    <th style="width: 15%;">Cod. Produto</th>
                    <th style="width: 20%;">Produto</th>
                    <th style="width: 15%;">Atividade</th>
                    <th style="width: 15%;">Colaborador</th>
                    <th style="width: 10%;">Quantidade</th>
                    <th style="width: 10%;">Data Inicio</th>
                    <th style="width: 10%;">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr style="vertical-align:middle">
                    <td>1</td>
                    <td>Rede Tijubana</td>
                    <td>Tecelagem</td>
                    <td>Vanessas</td>
                    <td>10</td>
                    <td>10/08/2020</td>
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



<?php $render('footer');?>