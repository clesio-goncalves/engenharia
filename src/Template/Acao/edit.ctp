<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $acao->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $acao->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Acao'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="acao form large-10 medium-9 columns">
    <?= $this->Form->create($acao); ?>
    <fieldset>
        <legend><?= __('Edit Acao') ?></legend>
        <?php
            echo $this->Form->input('tipo');
            echo $this->Form->input('Observacao');
            echo $this->Form->input('data');
            echo $this->Form->input('tarefa_id');
            echo $this->Form->input('usuario_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
