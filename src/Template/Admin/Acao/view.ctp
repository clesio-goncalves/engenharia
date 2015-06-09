<div class="row">    
    <div class="col-md-6">
        <?= $this->Form->create($acao); ?>
          <div class="form-group">
            <label >Tipo</label>
            <input type="text" class="form-control" value="<?=$acao->status == 'D' ? 'Desenvolvimento' : 'Planejamento'?>" readonly='true'>
          </div>
          <div class="form-group">
            <label >Data</label>
            <input type="text" class="form-control" value="<?=$acao->data?>" readonly='true'>
          </div>
          <div class="form-group">
            <label>Observacao</label>
            <label class="form-control" rows="3" name="descricao" readonly='true'>
                <?=$acao->Observacao?>
            </label>
          </div>     
        
   </div> 
</div>