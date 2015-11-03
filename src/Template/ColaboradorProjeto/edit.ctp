<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $colaboradorProjeto->projeto_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $colaboradorProjeto->projeto_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Colaborador Projeto'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projeto'), ['controller' => 'Projeto', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projeto', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuario'), ['controller' => 'Usuario', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuario', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="colaboradorProjeto form large-10 medium-9 columns">
    <?= $this->Form->create($colaboradorProjeto); ?>
    <fieldset>
        <legend><?= __('Edit Colaborador Projeto') ?></legend>
        <?php
            echo $this->Form->input('gerente');
            echo $this->Form->input('ativo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
