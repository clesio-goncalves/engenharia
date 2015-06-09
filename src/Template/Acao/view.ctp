<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Acao'), ['action' => 'edit', $acao->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Acao'), ['action' => 'delete', $acao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $acao->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Acao'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Acao'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="acao view large-10 medium-9 columns">
    <h2><?= h($acao->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Tipo') ?></h6>
            <p><?= h($acao->tipo) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($acao->id) ?></p>
            <h6 class="subheader"><?= __('Tarefa Id') ?></h6>
            <p><?= $this->Number->format($acao->tarefa_id) ?></p>
            <h6 class="subheader"><?= __('Usuario Id') ?></h6>
            <p><?= $this->Number->format($acao->usuario_id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Data') ?></h6>
            <p><?= h($acao->data) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Observacao') ?></h6>
            <?= $this->Text->autoParagraph(h($acao->Observacao)); ?>

        </div>
    </div>
</div>
