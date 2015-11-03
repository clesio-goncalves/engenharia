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