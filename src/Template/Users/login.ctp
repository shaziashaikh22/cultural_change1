<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

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

$cakeDescription = 'Cultural Change Admin';
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <link rel="icon" href="img/log.png">
 
<!--  <title>NutFlix - admin</title>-->
 <style>
     .pointnone{
  pointer-events: none;
}

 th {
    cursor: pointer;
        color: #007bff;

}
 </style>
</head>
<body>

<div class="container-fluid">
   <div class="row">
           <div class="col-sm-2"></div>
    <div class="col-sm-4">
        <div style="margin-top:170px;">
    <img src="<?php echo $this->request->webroot; ?>img/logomain.png" alt="">
        </div>
    </div>
    <div class="col-sm-4"><br><br><br><br>
                   <div class="row"><div class="col-sm-3"></div>
                    <div class="col-sm-6">
                    <img src="<?php echo $this->request->webroot; ?>img/welcometxt.png" style="width: -webkit-fill-available;">
                    </div>
                    <div class="col-sm-3"></div>
                   </div><br>
                   <?= $this->Form->create('', ['type' => 'POST','url' => ['action' => 'login']]) ?>

                   <div class="row">
                    <div class="col-sm-12">
                    <input type="text" class="form-control welInputdtxt" id="emailID" name="email" value="" placeholder="Please Enter you Email"><br>
                    </div>
                   </div>

                   <div class="row">
                    <div class="col-sm-12">
                    <input type="text" class="form-control welInputdtxt" id="codeID" name="password" value="" placeholder="Please Enter you code" required><br>
                    </div>
                   </div>

                   

                   <div class="row">
                   <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                    <?php 
                //      echo $this->Html->link(
                //     'Start',
                //     ['controller' => 'Users', 'action' => 'video'],
                //     ['class' => 'btn startbtn'],
                // ); 

                ?>
    <!-- <input type="hidden" name="hidden_user_id" value="" id="hidden_userID"/>
    <input type="hidden" name="hidden_onlinegame_id" value="" id="hidden_onlinegameID"/>
    <input type="hidden" name="hidden_gamecode" value="" id="hidden_gamecodeID"/>
    <input type="hidden" name="hidden_round_number" value="" id="hidden_roundnoID"/>
    <input type="hidden" name="hidden_status" value="" id="hidden_statusID"/>
   -->
                <button class="btn startbtn" type="submit">Start</button>
                    </div>
                    <div class="col-sm-3"></div>
                   </div><br>
                   <?= $this->Form->end();?>      
  </div>

  <div class="col-sm-2"></div>
</div>
<script>
  $('.startbtn').on('click', function(){
  var email_val =  $('#emailID').val();
  localStorage.setItem('email', email_val);
  })
  </script>
</body>
</html>

