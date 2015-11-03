  <div class="row">    
    <?=$this->Form->create($notificar, ['type'=>'file']);?>
    <input type="hidden" value="<?=$projeto?>" name="projeto"/>
    <div class="col-md-6">
      <div class="form-group">
        <?=$this->Form->input('assunto', ['class'=>'form-control', 'required'=>'']);?>
      </div>
    </div>
  </div>
  <div  class="row">
    <div class="col-md-6">
      <div class="form-group">
        <?=$this->Form->input('texto', ['class'=>'form-control', 'required'=>'']);?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <?=$this->Form->input('anexo', ["class"=>"form-control","id"=>"anexo", 'type'=>'file'])?>                
      </div>    
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <button type="submit" class="btn btn-default" name="btn-enviar">Enviar email</button>
    </div>
  </div>
<?=$this->Form->end();?>