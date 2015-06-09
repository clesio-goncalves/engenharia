<div class="row">    
    <div class="col-md-10">
        <table class="table table-striped">            
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('tipo') ?></th>
                    <th><?= $this->Paginator->sort('data') ?></th>                    
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
    <tbody>
    <?php foreach ($acao as $acao): ?>
        <tr>
            <td><?= h($acao->tipo == 'D' ? 'Desenvolvimento' : 'Planejamento' ) ?></td>
            <td><?= h($acao->data) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Detalhes'), ['action' => 'view', $acao->id]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>