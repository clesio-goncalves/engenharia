<div class="row">    
    <div class="col-md-10">
        <table class="table table-striped">            
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('titulo') ?></th>
                    <th><?= $this->Paginator->sort('previsao') ?></th>                    
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
    <tbody>
    <?php foreach ($projeto as $projeto): ?>
        <tr>
            <td><?= h($projeto->titulo) ?></td>
            <td><?= h($projeto->previsao) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Detalhes'), ['action' => 'view', $projeto->id]) ?>
                <?= $this->Html->link(__('Colaboradores'), [
                    'controller'=>'ColaboradorProjeto',
                    'action' => 'index', $projeto->id]) 
                ?>
                <?= $this->Html->link(__('Tarefas'), [
                    'controller'=>'tarefa',
                    'action' => 'index', $projeto->id]) 
                ?>
                
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