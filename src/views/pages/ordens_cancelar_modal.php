<h2>Tem certeza que deseja cancelar?</h2>

<div class="table">
    <table class="table table-striped table-hover borda">
        <thead>
            <tr>
                <th style="width: 10%;">Ordem</th>
                <th style="width: 8%;">Data</th>
                <th style="width: 13%;">Valor</th>
                <th style="width: 8%;">Desconto</th>
                <th style="width: 13%;">Total</th>
                <th style="width: 13%;">Forma Pagamento</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ordens as $value) : ?>
                <?php
                $date = new DateTime($value['dados']['data_ordem']);
                $data = $date->format("d/m/Y");
                $ordem = $value['dados']['ordem'];
                ?>
                <tr>
                    <td><?= $value['dados']['ordem']; ?></td>
                    <td><?= $data; ?></td>
                    <td>R$ <?= number_format($value['dados']['total'], 2, ",", "."); ?></td>
                    <td>R$ <?= number_format($value['dados']['desconto'], 2, ",", "."); ?></td>
                    <td>R$ <?= number_format($value['dados']['total'] - $value['dados']['desconto'], 2, ",", "."); ?></td>
                    <td><?= $value['dados']['forma_pagamento']; ?></td><br><br>
                </tr>
            <?php endforeach ?>

        </tbody>

    </table>
</div>

<form method="post" id="form">
    <input type="hidden" name="ordem" value="<?=$ordem;?>" id="ordem">

    <input type="submit" value="Entrar">

</form>

<script>
    $('#form').bind('submit', function(e){
        e.preventDefault();

        //Pega os dados do formulario
        var ordem = $('#ordem').val();
        console.log(ordem);

        $.ajax({
            //Tipo GET
            type: 'POST',
            //Vai enviar para o arquivo ajax.php
            url: 'action/'+ordem,
            //A variavel:ordem
            data: ordem,
            success:function(html){
                $('.modal_bg').hide();
                //$('.tabela-produto').html("Resultado: "+html);
                //window.location.reload();
            },
            //Caso der erro ou o arquivo não exista
            erro:function(){
                alert("Occoreu um erro")
            }
        })
        
    })
</script>