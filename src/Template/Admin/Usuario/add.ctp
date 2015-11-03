
    <div class="col-md-6">
        <?= $this->Form->create($usuario, ['novalidate']); ?>
          <div class="form-group">            
            <?=$this->Form->input('nome', ['class'=>'form-control', "placeholder"=>"Nome"])?>
          </div>
          <div class="form-group">
            <?=$this->Form->input('email', ['class'=>'form-control', "placeholder"=>"E-mail"])?>
          </div>
          <div class="form-group">
            <?=$this->Form->input('senha', ['class'=>'form-control', "type"=>"password"])?>
          </div>
          <div class="form-group">
            <?=$this->Form->input('confSenha', ['class'=>'form-control', "type"=>"password"])?>
          </div>
          <div class="checkbox">
            <label>
                <input type="checkbox" name="admin" value="1"> Admin
            </label>
          </div>
          <button type="submit" class="btn btn-success">Salvar</button>
          <button type="reset" class="btn btn-default">Limpar</button>
        <?= $this->Form->end() ?>
   </div> 
</div>
