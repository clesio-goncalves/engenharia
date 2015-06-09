<div class="row">    
    <div class="col-md-6">
        <?= $this->Form->create($tarefa); ?>
          <div class="form-group">
            <label for="idTitulo">Titulo</label>
            <input type="text" class="form-control" id="idTitulo" placeholder="Titulo" value="<?=$tarefa->titulo?>" name="titulo">
          </div>
          <div class="form-group">
            <label for="idDescricao">Descrição</label>
            <textarea class="form-control" id="idDescricao" rows="3" name="descricao">
<?=trim($tarefa->descricao)?>
            </textarea>
          </div>
          <div class="form-group">
            <select name="projeto_id">
                <?php foreach ($projeto as $id=>$titulo): ?>
                    <?=$projeto->id?>
                    <option value="<?=$id?>"><?=$titulo?></option>
                <?php endforeach ?>
                
            </select>
            
          </div>
          <button type="submit" class="btn btn-success">Salvar</button>
          <button type="reset" class="btn btn-default">Limpar</button>
        <?= $this->Form->end() ?>
   </div> 
</div>