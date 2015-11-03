<div class="row">    
    <div class="col-md-10">
        <table class="table table-striped">   
            <caption>
                <?php if($projeto->status!='F'):?>
                <?=
                    $this->Html->link('Editar', ['action'=>'edit', $projeto->id], [
                        'class'=>'btn btn-primary'
                    ])
                ?>
            <?php endif;?>
            </caption>
            <tbody>
                <tr>
                    <td colspan="3"><b>Titulo:</b> <?= h($projeto->titulo) ?></td>
                </tr>
                <tr>
                    <td><b>Situação:</b> <?= h($projeto->status=='F' ? 'Finalizado' : 'Andamento') ?></td>
                    <td><b>Data:</b> <?= h($projeto->data) ?></td>
                    <td><b>Previsão:</b> <?= h($projeto->previsao) ?></td>
                </tr>
                <tr>
                    <td colspan="3"><b>Descrição:</b></td>
                </tr>
                <tr>
                 <td colspan="3"> <?= $this->Text->autoParagraph(h($projeto->descricao));?></td>
                 </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="row">    
    <div class="col-md-10">
    <h4 class="subheader"><?= __('Tarefas relacionadas') ?></h4>
    <?php if (!empty($projeto->tarefa)): ?>
    <table class="table table-striped">
        <tr>
            <th><?= __('Titulo') ?></th>
            <th><?= __('Data') ?></th>
            <th><?= __('Situacao') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($projeto->tarefa as $tarefa): ?>
        <tr>
            <td><?= h($tarefa->titulo) ?></td>
            <td><?= h($tarefa->data) ?></td>
            <td><?= h($tarefa->status) ?></td>
            

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Tarefa', 'action' => 'view', $tarefa->id]) ?>
                <?= $this->Html->link(__('Ação'), ['controller' => 'Acao', 'action' => 'add', $tarefa->id]) ?>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
