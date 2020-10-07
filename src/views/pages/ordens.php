<?php $render('header', ['usuario' => $usuario]); ?>

<div class="produto">


    <div class="busca-produto">
        <form method="post">
            <div><input type="text" name="busca" id="busca" class="form-control" placeholder="Digite o nome do cliente ou Nº da ordem"></div>
            <div><button class="btn-form"><i class="fas fa-search"></i></button></div>
        </form>
    </div>
</div>

<div class="tabela-produto">
    <?php if (!empty($data)) :?>

    <div class="table">
        <table class="table table-striped table-hover borda">
            <thead>
                <tr>
                    <th style="width: 10%;">Nº Ordem</th>
                    <th style="width: 30%;">Cliente</th>
                    <th style="width: 10%;">Valor</th>
                    <th style="width: 10%;">Denconto</th>
                    <th style="width: 10%;">Valor Total</th>                    
                    <th style="width: 16%;">Data Compra</th>
                    <th style="width: 10%;">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $value) : ?>
                    <?php
                        $date = new DateTime($value['dados']['data_ordem']);
                        $dataFormat = $date->format('d/m/Y H:i:s');
                    ?>
                
                <tr style="vertical-align:middle">
                    <td><?=$value['dados']['ordem'];?></td>
                    <td><?=$value['nome'];?></td>
                    <td>R$ <?=number_format($value['dados']['total'], 2, ",", ".");?></td>
                    <td>R$ <?=number_format($value['dados']['desconto'], 2, ",", ".");?></td>
                    <td>R$ <?=number_format($value['dados']['total'] - $value['dados']['desconto'], 2, ",", ".");?></td>
                    
                    <td><?=$dataFormat;?></td>
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
    </div>
<?php endif ?>
</div>



<?php $render('footer'); ?>