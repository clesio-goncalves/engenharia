<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Acao'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="acao index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
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
            <td><?= $this->Number->format($acao->tarefa_id) ?></td>
            <td><?= $this->Number->format($acao->usuario_id) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $acao->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $acao->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $acao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $acao->id)]) ?>
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
