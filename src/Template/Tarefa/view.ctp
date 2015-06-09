<div class="row">    
    <div class="col-md-6">
        <?= $this->Form->create($tarefa); ?>
          <div class="form-group">
            <label for="idTitulo">Titulo</label>
            <input type="text" class="form-control" id="idTitulo" placeholder="Titulo" value="<?=$tarefa->titulo?>" name="titulo" readonly='true'>
          </div>
          <div class="form-group">
            <label for="idDescricao">Descrição</label>
            <label class="form-control" id="idDescricao" rows="3" name="descricao" readonly='true'>
                <?=$tarefa->descricao?>
            </label>
          </div>
          <a href="/engenharia/acao/add/<?=$tarefa->id?>" class="btn btn-primary" >Ação</a>
        <?= $this->Form->end() ?>
   </div> 
</div>