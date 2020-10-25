<form method="post" id="producao">
    <input type="hidden" name="colaborador" id="colaborador" value="<?= $colaborador['id']; ?>">
    <div class="principal">        
        <div>
            <label for="data">Data:</label><br>
            <input type="datetime-local" name="data" id="data" class="form-control" style="width: 80%;">
        </div>        
        <div>
            <label for="servico">Serviço:</label><br>
            <input type="text" name="servico" id="servico" value="<?= $colaborador['funcao']; ?>" class="form-control" disabled>
        </div>
    </div> <br>
    <div class="principal">

        <div>
            <label for="rede">Rede:</label><br>
            <select name="produto" id="produto" class="form-control" style="width: 86%;">
                <option value=""></option>
                <?php foreach ($produtos as $produto) : ?>
                <option value="<?= $produto['id']; ?>"><?= $produto['nome'];  ?> <?= $produto['cor'];  ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div>
            <label for="qtd">Quantidade:</label> <br>
            <input type="number" name="qtd" id="qtd" class="form-control" style="width: 80%;">
        </div>
    </div>
     <br> <br>
    <center>
       <input type="submit" value="Adicionar" class="btn btn-success">  
    </center>
   
</form>

<script src="<?= $base; ?>/assets/js/acao_modal.js"></script>