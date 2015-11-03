<br />
<br />
<br />
<br />
<div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Login</h3>
                </div>
                <div class="panel-body">
                	<?= $this->Form->create() ?>
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="E-mail" name="email" type="text">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="senha" type="password" value="">
                        </div>
                        <div class="form-group">
                        <?= $this->Flash->render('auth') ?>
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Login" id="btn-logar">
                        </div>
                    </fieldset>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>