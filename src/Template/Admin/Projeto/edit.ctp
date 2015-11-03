<div class="row">    
    <div class="col-md-6">
        <?= $this->Form->create($projeto); ?>
          <div class="form-group">
            <label for="idTitulo">Titulo</label>
            <input type="text" class="form-control" id="idTitulo" placeholder="Titulo" value="<?=$projeto->titulo?>" name="titulo">
          </div>
          <div class="form-group">
            <label for="idDescricao">Descrição</label>
            <textarea class="form-control" id="idDescricao" rows="3" name="descricao">
<?=$projeto->descricao?>
            </textarea>
          </div>
          <div class="form-group">
            <label for="idPrevisao">Previsão</label>
            <input type="text" class="form-control" id="idPrevisao" placeholder="Previsão" name="previsao"value="<?=$projeto->previsao?>">
          </div>
          <button type="submit" class="btn btn-success">Salvar</button>
          <button type="reset" class="btn btn-default">Limpar</button>
        <?= $this->Form->end() ?>
   </div> 
</div>
