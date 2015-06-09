<div class="row">    
    <div class="col-md-6">
        <?= $this->Form->create($tarefa); ?>
          <div class="form-group">
            <label for="idTitulo">Titulo</label>
            <input type="text" class="form-control" id="idTitulo" placeholder="Titulo" value="<?=$tarefa->titulo?>" name="titulo">
          </div>
          <div class="form-group">
            <label for="idDescricao">Descrição</label>
            <textarea class="form-control" id="idDescricao" rows="3" name="descricao" value="<?=$tarefa->descricao?>"></textarea>
          </div>
          <div class="form-group">
            <input type="hidden" class="form-control" name="projeto_id" value="<?=$projeto_id?>">
          </div>
          <button type="submit" class="btn btn-success">Salvar</button>
          <button type="reset" class="btn btn-default">Limpar</button>
        <?= $this->Form->end() ?>
   </div> 
</div>