
  <div class="row">    
    <?=$this->Form->create('projeto', ['type'=>'file']);?>
    <input type="hidden" value="<?=$projeto?>" name="projeto"/>
    <div class="col-md-6">
      <div class="form-group">
        <label for="assunto">Assunto:</label>
        <input type="text" class="form-control" id="assunto" name="assunto" size="40">
      </div>
    </div>
  </div>
  <div  class="row">
    <div class="col-md-6">
      <div class="form-group">
      <label for="texto">Texto:</label>
        <textarea rows="4" cols="60" class="form-control" name="texto" id="texto">
        </textarea>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="anexo">Anexo</label>
        <input type="file" name="anexo" class="form-control" id="anexo">
      </div>    
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <button type="submit" class="btn btn-default" name="btn-enviar">Enviar email</button>
    </div>
  </div>
  
<?=$this->Form->end();?>