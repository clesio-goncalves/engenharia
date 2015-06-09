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
            <td><?= h(date("Y-m-d", strtotime($projeto->previsao))) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Detalhes'), ['action' => 'view', $projeto->id]) ?>                
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
