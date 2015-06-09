<div class="row">    
    <div class="col-md-10">
        <table class="table table-striped">   
            <caption>
                <?=
                    $this->Html->link('Editar', ['action'=>'edit', $usuario->id], [
                        'class'=>'btn btn-primary'
                    ])
                ?>
            </caption>
            <tbody>
                <tr>
                    <td><b>Nome:</b> <?= h($usuario->nome) ?></td>
                    <td><b>Email:</b> <?= h($usuario->email) ?></td>
                    <td><b>Situação:</b> <?= h($usuario->status ? 'Ativo' : 'Inativo') ?></td>
                    <td><b>Administrador:</b> <?= h($usuario->admin ? 'SIM' : 'NÃO') ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row">    
    <div class="col-md-10">
    <h4 class="subheader"><?= __('Projetos em andamento') ?></h4>
    <?php if (!empty($projetos)): ?>
    <table class="table table-striped">
        <tr>
            <th><?= __('Titulo') ?></th>
            <th><?= __('Gerente') ?></th>            
            <th><?= __('Actions') ?></th>  
        </tr>
        <?php foreach ($projetos as $projeto): ?>
        <tr>
            <td><?= h($projeto->projeto->titulo) ?></td>
            <td><?= h($projeto->gerente ? 'SIM' : 'NÃO') ?></td>
            <td>
                <?php 
                    echo $this->Html->link('Ações', ['controller'=>'acao', 'action'=>'verAcoes', $projeto->projeto_id, $usuario->id])
                ?>
            </td>
            
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
