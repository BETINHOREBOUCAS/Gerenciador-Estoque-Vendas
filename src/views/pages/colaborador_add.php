<?php $render('header', ['usuario' => $usuario]); ?>

<div class="form">
<div class="title">Dados Pessoais</div>
<hr>
<?php if (!empty($flash)) : ?>
<div class="msg msgSuccess"><?=$flash;?></div>
<?php endif ?>
    <form method="post">

    <div class="caixa">
            <div>
                <label for="nome">Nome:</label> <br>
                <input type="text" name="nome" id="nome" class="form-control"> 
            </div>
            <div>
                <label for="endereco">Endereco:</label><br>
                <input type="text" name="endereco" id="endereco" class="form-control"> 
            </div>
        </div>

        <div class="caixa">
            <div>
                <label for="funcao">Função:</label> <br>
                
                <select name="funcao" id="funca" class="form-control" style="width: 100%">
                    <option value=""></option>
                   <?php foreach ($atividades as $value) : ?> 
                    <option value="<?=$value['atividade'];?>"><?=$value['atividade'];?></option>
                    <?php endforeach ?>
                </select>
                
            </div>
            <div>
                <label for="preco">Preço Combinado:</label><br>
                <input type="text" name="preco" id="preco" class="form-control"> 
            </div>
        </div>

        <div class="caixa">
            <div>
                <label for="tel1">Celular1:</label> <br>
                <input type="text" name="tel1" id="tel1" class="form-control"> 
            </div>
            <div>
                <label for="tel2">Celular2:</label><br>
                <input type="text" name="tel2" id="tel2" class="form-control"> 
            </div>
        </div>

        <div class="caixa"><input type="submit" value="Salvar" class="btn btn-success"></div>

    </form>
</div>

<?php $render('footer'); ?>