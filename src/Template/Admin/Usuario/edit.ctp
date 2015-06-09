    <div class="col-md-6">
        <?= $this->Form->create($usuario); ?>
        <?php 
            $erros = $usuario->errors();
            if(count($erros)>0){
                echo "<div>";
                    foreach ($erros as $campo => $erro) {
                        echo "Error! ".$campo.' - '.current($erro)."<br />";
                    }
                echo '</div>';
            }
        ?>
          <div class="form-group">
            <label for="idNome">Nome</label>
            <input type="text" class="form-control" id="idNome" placeholder="Nome" value="<?=$usuario->nome?>" name="nome" />
          </div>
          <div class="form-group">
            <label for="idEmail">E-mail</label>
            <input type="email" class="form-control" id="idEmail" placeholder="Email" value="<?=$usuario->email?>" name="email" />
          </div>
          <div class="form-group">
            <label for="idSenha">Senha</label>
            <input type="password" class="form-control" id="idSenha" placeholder="Senha" name="senha" />
          </div>
          <div class="form-group">
            <label for="idConfSenha">Confirmar senha</label>
            <input type="password" class="form-control" id="idConfSenha" placeholder="Confirmar senha" name="confSenha" />
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
