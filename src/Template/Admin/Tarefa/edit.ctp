<div class="row">    
  <div class="col-md-6">
    <?= $this->Form->create($tarefa, ['novalidate']); ?>
      <div class="form-group">
        <?=$this->Form->input('titulo', ['class'=>'form-control', 'placeholder'=>'Titulo'])?>
      </div>
      <div class="form-group">
        <?=$this->Form->input('descricao', ['class'=>'form-control', 'placeholder'=>'Titulo', 'label'=>'Descrição'])?>
      </div>
      <div class="form-group">
        <?=$this->Form->input('projeto_id', ['class'=>'form-control', 'options'=>$projeto])?>
      </div>
      <button type="submit" class="btn btn-success">Salvar</button>
      <button type="reset" class="btn btn-default">Limpar</button>
    <?= $this->Form->end() ?>
 </div> 
</div>