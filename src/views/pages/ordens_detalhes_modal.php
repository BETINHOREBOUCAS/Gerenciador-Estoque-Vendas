<div class="table" style="width: 100%;">
    <?php if (!empty($produtos)) : ?>
        <table class="table table-striped table-hover borda">
            <thead>
                <tr>
                    <th style="width: 10%;">Cod.</th>
                    <th style="width: 25%;">Produto</th>
                    <th style="width: 15%;">Cor</th>
                    <th style="width: 10%;">Qtd.</th>
                    <th style="width: 20%;">Preço</th>
                    <th style="width: 30%;">Total</th>
                </tr>
            </thead>
            
            <tbody>

                <?php $total = 0;?>
                <?php foreach ($produtos as $value) : ?>
                    <?php
                        $total = $total+($value['ordem']['preco_un'] * $value['ordem']['quantidade']);
                    ?>
                    <tr style="vertical-align:middle">
                        <td><?= $value['produto']['id']; ?></td>
                        <td><?= $value['produto']['nome']; ?></td>
                        <td><?= $value['produto']['cor']; ?></td>
                        <td><?= $value['ordem']['quantidade']; ?></td>
                        <td>R$ <?= number_format($value['ordem']['preco_un'], 2, ",", "."); ?></td>
                        <td>R$ <?= number_format($value['ordem']['preco_un'] * $value['ordem']['quantidade'], 2, ",", "."); ?></td>

                    </tr>
                <?php endforeach ?>

            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total</th>
                    <th colspan="3">R$ <?=number_format($total,2,',', '.');?></th>
                </tr>
            </tfoot>

        </table>
    <?php endif ?>

</div>