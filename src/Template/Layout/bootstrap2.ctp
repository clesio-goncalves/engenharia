<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('styles.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div id="top-nav" class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?=$logado['nome']?> </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <?=$this->Html->link('Logout', ['controller'=>'usuario','action'=>'logout', 'prefix'=>false])?>
                </li>

            </ul>
        </div>
    </div>
    <!-- /container -->
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <!-- Left column -->
            <a href="#"><strong><i class="glyphicon glyphicon-wrench"></i> Atalhos</strong></a>
            <hr>
            <?php 
                echo $logado['admin']==true ? $this->element('menuAdmin') : $this->element('menu');

            ?>
        </div>
        <!-- /col-3 -->
        <div class="col-sm-9">           
            <div class="row">
                <?= $this->Flash->render() ?>
            </div>
            <div class="row">
                <?= $this->fetch('content') ?>                
            </div>
        </div>
    </div>
</div>
                    

            
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <?=$this->Html->script('bootstrap-selectmoveoptions.js')?>
    <?=$this->Html->script('bootstrap.min.js')?>
    <?=$this->Html->script('scripts.js')?>    
</body>
</html>
