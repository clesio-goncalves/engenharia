<table class="table table-striped">
<thead>
    <tr>
        <th><?= $this->Paginator->sort('id') ?></th>
        <th><?= $this->Paginator->sort('tipo') ?></th>
        <th><?= $this->Paginator->sort('data') ?></th>
        <th><?= $this->Paginator->sort('tarefa_id') ?></th>
        <th><?= $this->Paginator->sort('usuario_id') ?></th>
        <th class="actions"><?= __('Actions') ?></th>
    </tr>
</thead>
<tbody>
<?php foreach ($acao as $acao): ?>
    <tr>
        <td><?= $this->Number->format($acao->id) ?></td>
        <td><?= h($acao->tipo) ?></td>
        <td><?= h($acao->data) ?></td>
        <td><?= h($acao->tarefa->titulo) ?></td>
        <td><?= h($acao->usuario->nome) ?></td>
        <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $acao->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $acao->id]) ?>            
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
