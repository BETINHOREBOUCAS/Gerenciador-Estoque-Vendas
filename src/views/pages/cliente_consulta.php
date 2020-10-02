<?php $render('header'); ?>

<div class="form">
    <div class="title">Ordens: Jorge</div>
    <hr>
</div>

<div class="produto">
    <div class="botao-produto">
        <a href="<?= $base; ?>/addVenda/<?=$data['id'];?>"><button class="btn btn-success"><i class="fas fa-shopping-cart"></i> Vender</button></a>
    </div>
    <div class="busca-produto">
        <form method="get">
            <select name="ordenar" id="organizar" class="form-control">
                <option value="">Ordenar por:</option>
                <option value="">Data Crescente</option>
                <option value="">Data Decrescente</option>
                <option value="">Nome Produto Crescente</option>
                <option value="">Nome Produto Decrescente</option>
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
                    <th style="width: 15%;">Total</th>
                    <th style="width: 10%;">Data</th>
                    <th style="width: 10%;">Situação</th>
                    <th style="width: 5%;">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1052</td>
                    <td>R$ 5.000,00</td>
                    <td>10/05/2020</td>
                    <td>Parcelado</td>
                    <td>
                    <div class="icons-table">
                        <a href="<?= $base; ?>/clientes/consulta/<?= $value['id']; ?>">
                            <div id="lupa" title="Consulta"><i class="fas fa-search"></div></i>
                        </a>
                        <a href="<?= $base; ?>/clientes/excluir/<?= $value['id']; ?>">
                            <div id="excluir" title="Excluir"><i class="fas fa-times-circle"></div></i>
                        </a>
                    </div>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>
</div>


<?php $render('footer'); ?>