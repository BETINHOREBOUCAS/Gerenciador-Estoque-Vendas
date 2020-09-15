<?php $render('header');?>

<div class="tabela-produto">
    <div class="botao-produto">
        <button class="btn btn-success"><i class="fas fa-plus-circle"></i> Adicionar produto</button>
    </div>
    <div class="busca-produto">
        <form method="post">
            <div><input type="text" name="busca" id="busca" class="form-control" placeholder="Buscar"></div>
            <div><button class="btn-form"><i class="fas fa-search"></i></button></div>            
        </form>
    </div>
</div>



<?php $render('footer');?>