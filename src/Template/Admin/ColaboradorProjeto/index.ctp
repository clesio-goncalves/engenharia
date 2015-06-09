<div class="row">    
    <div class="col-md-10">
        <table class="table table-striped">
            <caption>Membros do projeto</caption>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('gerente') ?></th>                    
                </tr>
            </thead>
    <tbody>
    <?php foreach ($colaboradorProjeto as $colaborador): ?>
        <tr>
            <td><?= h($colaborador->usuario->nome) ?></td>
            <td><?= h($colaborador->usuario->email) ?></td>            
            <td><?= h($colaborador->gerente ? "SIM" : "NAO") ?></td>            
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

<div class="row">    
    <div class="col-md-10">
        <table class="table table-striped">
            <caption>Outros usuários</caption>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
    <tbody>
    <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?= h($usuario->nome) ?></td>
            <td><?= h($usuario->email) ?></td>                        
            <td class="actions">
            <?= $this->Form->postLink(__('Adicionar'), ['action' => 'add', $projeto_id, $usuario->id], ['confirm' => __('Confirmar usuario # {0}?', $usuario->id), 'class'=>'btn btn-primary']) ?>   
            <?= $this->Form->postLink(__('Gerente'), ['action' => 'add', $projeto_id, $usuario->id, 1], ['confirm' => __('Confirmar usuario # {0}?', $usuario->id), 'class'=>'btn btn-primary']) ?>
            
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