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
            <td><?=h($projeto->previsao)?></td>            
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
                <?= $this->Form->postLink(__('Finalizar'), ['action' => 'finalizar', $projeto->id], ['confirm' => __('Deseja finalizar o projeto # {0}?', $projeto->titulo)]) ?>
                <?= $this->Html->link(__('Notificar'), [
                    'prefix'=>'admin',
                    'controller'=>'projeto',
                    'action' => 'notificar', $projeto->id], ['id'=>'lnk-notificar']) 
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
            &nbsp;
            <?=$this->Html->link('Novo', ['action'=>'add'], ['class'=>'btn btn-default'])?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

   </div> 
