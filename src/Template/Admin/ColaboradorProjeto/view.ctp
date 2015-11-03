<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Colaborador Projeto'), ['action' => 'edit', $colaboradorProjeto->projeto_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Colaborador Projeto'), ['action' => 'delete', $colaboradorProjeto->projeto_id], ['confirm' => __('Are you sure you want to delete # {0}?', $colaboradorProjeto->projeto_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Colaborador Projeto'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Colaborador Projeto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projeto'), ['controller' => 'Projeto', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projeto', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuario'), ['controller' => 'Usuario', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuario', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="colaboradorProjeto view large-10 medium-9 columns">
    <h2><?= h($colaboradorProjeto->projeto_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Projeto') ?></h6>
            <p><?= $colaboradorProjeto->has('projeto') ? $this->Html->link($colaboradorProjeto->projeto->titulo, ['controller' => 'Projeto', 'action' => 'view', $colaboradorProjeto->projeto->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Usuario') ?></h6>
            <p><?= $colaboradorProjeto->has('usuario') ? $this->Html->link($colaboradorProjeto->usuario->id, ['controller' => 'Usuario', 'action' => 'view', $colaboradorProjeto->usuario->id]) : '' ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Gerente') ?></h6>
            <p><?= $colaboradorProjeto->gerente ? __('Yes') : __('No'); ?></p>
            <h6 class="subheader"><?= __('Ativo') ?></h6>
            <p><?= $colaboradorProjeto->ativo ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
</div>
