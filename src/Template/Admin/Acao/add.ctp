<div class="row">    
    <div class="col-md-6">
        <?= $this->Form->create($acao, ['novalidate']); ?>
          <div class="form-group">
            <?=$this->Form->input('tipo', ['class'=>'form-control', 'options'=>['D'=>'Desenvolvimento', 'P'=>'Planejamento']])?>            
          </div>
          <div class="form-group">
            <?=$this->Form->input('observacao',['class'=>'form-control', 'placeholder'=>'Observação'])?>
          </div>
          <input type="hidden" name="tarefa_id" value="<?=$tarefa_id?>">
          <button type="submit" class="btn btn-success">Salvar</button>
          <button type="reset" class="btn btn-default">Limpar</button>
        <?= $this->Form->end() ?>
   </div> 
</div>
