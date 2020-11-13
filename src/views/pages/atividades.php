<?php $render('header', ['usuario' => $usuario]); ?>

<div class="container-principal">
    <div class="add-atividade">
        <a href="<?= $base; ?>/atividades/addAtividade" class="modal_ajax" info="Adicionar Atividade">
            <div class="desc">Adicionar Atividade</div>
            <img src="<?= $base; ?>/assets/imagens/add.gif" alt="Adicionar Atividade" id="add">
        </a>
    </div>

    <div class="edit-atividade">
        <a href="<?= $base; ?>/atividades/editarAtividade" class="modal_ajax" info="Editar Atividade">
            <div class="desc">Editar Atividade</div>
            <img src="<?= $base; ?>/assets/imagens/edit.gif" alt="Editar Atividade" id="edit">
        </a>
    </div>

    <div class="delete-atividade">
        <a href="<?= $base; ?>/atividades/excluirAtividade" class="modal_ajax" info="Excluir Atividade">
            <div class="desc">Excluir Atividade</div>
            <img src="<?= $base; ?>/assets/imagens/delete.gif" alt="Excluir Atividade" id="delete">
        </a>
    </div>
</div>

<?php $render('footer');
