<div class="row">    
  <div class="col-md-6">
    <?= $this->Form->create($projeto, ['novalidate']); ?>
      <div class="form-group">
        <?=$this->Form->input('titulo', ['class'=>'form-control', 'placeholder'=>"Titulo"])?>
      </div>
      <div class="form-group">
        <?=$this->Form->input('descricao', ['class'=>'form-control', 'placeholder'=> "Descrição", 'label'=>'Descrição'])?>                
      </div>
      <div class="form-group">
        <?=$this->Form->input('previsao', ['class'=>'form-control', 'placeholder'=> "Previsão", 'label'=>'Previsão', 'type'=>'text'])?>
      </div>
          <button type="submit" class="btn btn-success">Salvar</button>
          <button type="reset" class="btn btn-default">Limpar</button>
        <?= $this->Form->end() ?>
   </div> 
</div>
