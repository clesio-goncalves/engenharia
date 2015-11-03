<div class="row">    
    <div class="col-md-6">
        <?= $this->Form->create($acao); ?>
        <?php 
            $erros = $acao->errors();
            if(count($erros)>0){
                echo "<div>";
                    foreach ($erros as $campo => $erro) {
                        echo "Error! ".$campo.' - '.current($erro)."<br />";
                    }
                echo '</div>';
            }
        ?>
          <div class="form-group">
            <label for="idTipo">Tipo</label>
            <select name="tipo">
                <option value="D">Desenvolvimento</option>
                <option value="P">Planejamento</option>
            </select>            
          </div>
          <div class="form-group">
            <label for="idObservação">Observação</label>
            <textarea class="form-control" id="idObservacao" rows="3" name="Observacao" value="<?=$acao->observacao?>"></textarea>
          </div>
          <input type="hidden" name="tarefa_id" value="<?=$tarefa_id?>">
          <button type="submit" class="btn btn-success">Salvar</button>
          <button type="reset" class="btn btn-default">Limpar</button>
        <?= $this->Form->end() ?>
   </div> 
</div>
