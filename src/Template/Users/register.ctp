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
    .pointnone {
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
      <div class="col-sm-6"><br><br><br><br>
        <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-sm-6">
          <span style="font-size:40px;font-weight: bold;color: #009B91;">Register !</span>
          </div>
          <div class="col-sm-3"></div>
        </div><br>
        <?= $this->Form->create('', ['type' => 'POST', 'url' => ['action' => 'register']]) ?>

        <div class="row">
          <div class="col-sm-3" style="text-align:center;padding:0px;">
            <label style="color: #009B91;font-weight: bold;line-height:2.5;font-size:25px;">Full Name</label>
          </div>
          <div class="col-sm-6">
            <input type="text" class="form-control welInputdtxt" id="name_ID" name="name" value="" placeholder="e.g: Max Muster" style="box-shadow: 0 0 5pt 2pt #D3D3D3;outline-width: 0px;" required>&nbsp;
          </div>
        </div>

        <div class="row">
          <div class="col-sm-3" style="text-align:center;padding:0px;">
            <label style="color: #009B91;font-weight: bold;line-height:2.5;font-size:25px;">Email ID</label>
          </div>
          <div class="col-sm-6">
          <input type="text" class="form-control welInputdtxt" id="email_ID" name="email" value="" placeholder="e.g: Max.Muster@buhlergroup.com" required style="box-shadow: 0 0 5pt 2pt #D3D3D3;outline-width: 0px;"><br>
            </div>
        </div>

        <div class="row">
          <div class="col-sm-3" style="text-align:center;padding:0px;">
            <label style="color: #009B91;font-weight: bold;line-height:2.5;font-size:25px;">Game Code</label>
          </div>
          <div class="col-sm-6">
          <input type="text" class="form-control welInputdtxt" id="gamecode_ID" name="gamecode_name" value="" placeholder="e.g: 123sdG9" required style="box-shadow: 0 0 5pt 2pt #D3D3D3;outline-width: 0px;"><br>
            </div>
        </div>

        <div class="row">
          <div class="col-sm-3">
          </div>
          <div class="col-sm-3">
            <button class="btn startbtn" type="submit">Register</button>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-3">
          </div>
          <div class="col-sm-5" style="text-align: center;line-height:3.0;">
          <?php
                 echo $this->Html->link(
                'Already a User ? Click here',['controller' => 'Users', 'action' => 'login'],// ['class' => 'btn btn-primary'],
              ); 
            ?>
          </div>
        </div>
        <?= $this->Form->end(); ?>
      </div>

      <!-- <div class="col-sm-1"></div> -->
    </div>
 
</body>

</html>