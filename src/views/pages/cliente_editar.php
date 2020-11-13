<?php $render('header', ['usuario' => $usuario]); ?>
<div class="form">
<div class="title">Editar #</div>

<form method="post">
<div class="pai">

    <div class="caixa">
        <div>
            <label for="nome">Nome:</label> <br>
            <input type="text" name="nome" id="nome" class="form-control" value="<?=$cliente['nome'];?>">
        </div>
        <div>
            <label for="endereco">Endereco:</label><br>
            <input type="text" name="endereco" id="endereco" class="form-control" value="<?=$cliente['endereco'];?>">
        </div>
    </div>

    <div class="caixa">
        <div>
            <label for="estado">Estado:</label> <br>
            <input type="text" name="estado" id="estado" class="form-control" value="<?=$cliente['estado'];?>">
        </div>
        <div>
            <label for="cidade">Cidade:</label><br>
            <input type="text" name="cidade" id="cidade" class="form-control" value="<?=$cliente['cidade'];?>">
        </div>
    </div>

    <div class="caixa">
        <div>
            <label for="tel1">Celular1:</label> <br>
            <input type="text" name="tel1" id="tel1" class="form-control" value="<?=$cliente['telefone1'];?>">
        </div>
        <div>
            <label for="tel2">Celular2:</label><br>
            <input type="text" name="tel2" id="tel2" class="form-control" value="<?=$cliente['telefone2'];?>">
        </div>
    </div>

    <div class="caixa"><input type="submit" value="Salvar" class="btn btn-success"></div>
    
</div>
</form>
</div>

<?php $render('footer'); ?>