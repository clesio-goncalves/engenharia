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
    <?php foreach ($tarefa as $tarefa): ?>
        <tr>
            <td><?= h($tarefa->titulo) ?></td>
            <td><?= h($tarefa->descricao) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Detalhes'), ['action' => 'view', $tarefa->id]) ?>
                <?= $this->Html->link(__('ação'), ['controller'=>'acao', 'action' => 'add', $tarefa->id]) ?>
                <?php if($colaborador_proj->gerente):?>
                <?= $this->Form->postLink(__('Finalizar'), ['action' => 'finalizar', $tarefa->id], ['confirm' => __('Deseja finalizar a tarefa # {0}?', $tarefa->id)]) ?>
                <?php endif;?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>&nbsp;
            <?php if($colaborador_proj->gerente and $projeto->status!='F'):?>
                    <?= $this->Html->link(__('Nova'), ['action' => 'add', $projeto->id], ['class'=>'btn btn-default']) ?>
                <?php endif;?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

   </div> 
