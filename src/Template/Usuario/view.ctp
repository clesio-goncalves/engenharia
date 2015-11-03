<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Usuario'), ['action' => 'edit', $usuario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Usuario'), ['action' => 'delete', $usuario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuario->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Usuario'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Colaborador Projeto'), ['controller' => 'ColaboradorProjeto', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Colaborador Projeto'), ['controller' => 'ColaboradorProjeto', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="usuario view large-10 medium-9 columns">
    <h2><?= h($usuario->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Nome') ?></h6>
            <p><?= h($usuario->nome) ?></p>
            <h6 class="subheader"><?= __('Email') ?></h6>
            <p><?= h($usuario->email) ?></p>
            <h6 class="subheader"><?= __('Senha') ?></h6>
            <p><?= h($usuario->senha) ?></p>
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= h($usuario->status) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($usuario->id) ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Admin') ?></h6>
            <p><?= $usuario->admin ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related ColaboradorProjeto') ?></h4>
    <?php if (!empty($usuario->colaborador_projeto)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Projeto Id') ?></th>
            <th><?= __('Usuario Id') ?></th>
            <th><?= __('Gerente') ?></th>
            <th><?= __('Ativo') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($usuario->colaborador_projeto as $colaboradorProjeto): ?>
        <tr>
            <td><?= h($colaboradorProjeto->projeto_id) ?></td>
            <td><?= h($colaboradorProjeto->usuario_id) ?></td>
            <td><?= h($colaboradorProjeto->gerente) ?></td>
            <td><?= h($colaboradorProjeto->ativo) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'ColaboradorProjeto', 'action' => 'view', $colaboradorProjeto->projeto_id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'ColaboradorProjeto', 'action' => 'edit', $colaboradorProjeto->projeto_id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ColaboradorProjeto', 'action' => 'delete', $colaboradorProjeto->projeto_id], ['confirm' => __('Are you sure you want to delete # {0}?', $colaboradorProjeto->projeto_id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
