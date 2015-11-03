<div class="row">    
    <div class="col-md-10">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('admin') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
    <tbody>
    <?php foreach ($usuario as $usuario): ?>
        <tr>
            <td><?= h($usuario->nome) ?></td>
            <td><?= h($usuario->email) ?></td>
            <td><?= h($usuario->status) ?></td>
            <td><?= h($usuario->admin) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Detalhes'), ['action' => 'view', $usuario->id]) ?>
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

   </div> 
</div>
