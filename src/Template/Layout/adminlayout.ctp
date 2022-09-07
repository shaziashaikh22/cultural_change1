<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Cultural Change';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta charset="UTF-8">
 
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
<style>
        .pagination li{
padding-right:10px
}
    </style>


 <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?> 
     <?= $this->Html->css('bootstrap.min.css') ?>
      <?= $this->Html->css('old.css') ?>
    <?= $this->Html->css('app.css') ?>
   
    
  <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
  
  
       
        
  <?php echo $this->Html->script('jquery.min');?>
   <?php echo $this->Html->script('tether.min');?>
       <?php echo $this->Html->script('popper.min');?>

     <?php echo $this->Html->script('bootstrap.min');?>
    <?php echo $this->Html->script('app');?>
      <?php echo $this->Html->script('chart');?>
     <?php echo $this->Html->script('highcharts');?>
  
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    
    


    
</head>
<body>
    
    <?= $this->Flash->render() ?>
    <!-- <div class="container clearfix"> -->
        <?= $this->fetch('content') ?>
    <!-- </div> -->

</body>
</html>
