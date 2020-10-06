<?php $render('header'); ?>

<div class="form">
<div class="title">Adicionar Produto</div>
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
                <label for="cor">Cor:</label><br>
                <input type="text" name="cor" id="cor" class="form-control"> 
            </div>
        </div>

        <div class="caixa">
            <div>
                <label for="tamanho">Tamanho:</label> <br>
                
                <select name="tamanho" id="tamanho" class="form-control" style="width: 100%;">
                    <option value=""></option>
                    <option value="Extra Pequena">Extra Pequena</option>
                    <option value="Pequena">Pequena</option>
                    <option value="Média">Média</option>
                    <option value="Grande">Grande</option>
                    <option value="Extra Grande">Extra Grande</option>
                    <option value="Gigante">Gigante</option>
                </select>
            </div>
            <div>
                <label for="quantidade">Quantidade:</label><br>
                <input type="text" name="quantidade" id="quantidade" class="form-control"> 
            </div>
        </div>

        <div class="caixa">
            <div>
                <label for="preco">Preço:</label> <br>
                <input type="text" name="preco" id="preco" class="form-control"> 
            </div>
            <div>
                <label for="varanda">Varanda:</label><br>
                <select name="varanda" id="varanda" class="form-control">
                    <option value=""></option>
                    <option value="6 rosas">6 Rosas</option>
                    <option value="3 pano">3 Pano</option>
                    <option value="duplex">Duplex</option>
                </select>              
                
            </div>
            <div>
                <label for="corda">Punho:</label><br>
                <select name="punho" id="punho" class="form-control">
                    <option value=""></option>
                    <option value="Corda">Corda</option>
                    <option value="Trancelim">Trancelim</option>
                </select> 
            </div>
        </div>

        <div class="caixa">
            <div>
                <label for="acabamento">Acabamento:</label> <br> 
                <select name="acabamento" id="acabamento" class="form-control">
                    <option value=""></option>
                    <option value="tranca">Trança</option>
                    <option value="bainha">Bainha</option>
                    <option value="1 grade">1 Grade</option>
                    <option value="2 grade">2 Grade</option>
                </select>
            </div>
            
            <div>
                <label for="comprimento">Comprimento:</label> <br>
                <input type="text" name="comprimento" id="comprimento" class="form-control"> 
            </div>
            <div>
                <label for="largura">Largura:</label><br>
                <input type="text" name="largura" id="largura" class="form-control"> 
            </div>
            <div>
                <label for="peso">Peso:</label><br>
                <input type="text" name="peso" id="peso" class="form-control"> 
            </div>
        </div>

        <div class="caixa"><input type="submit" value="Salvar" class="btn btn-success"></div>

    </form>
</div>

<?php $render('footer'); ?>