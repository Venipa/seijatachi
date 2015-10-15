<?php
use Cake\Core\Configure;
?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Seijatachi | Anime Search</title>
        <?= $this->Html->meta('icon') ?>

        <?= $this->Html->css('Seijatachi.bootstrap.min') ?>
        <?= $this->Html->css('Seijatachi.seijatachi') ?>

        <?= $this->Html->script('Seijatachi.jquery.min') ?>
        <?= $this->Html->script('Seijatachi.bootstrap.min') ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body>
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </body>
</html>