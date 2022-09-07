<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserType[]|\Cake\Collection\CollectionInterface $userTypes
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
<html>
<head>
  <style>
    .tooltip2 {
    display: inline-block;
    position: relative;
    border-bottom: 1px dotted #666;
    text-align: left;
  }

  .tooltip2 .bottom {
    min-width: 150px;
    top: -100px;
    left: 10%;
    transform: translate(-50%, 0);
    padding: 10px 20px;
    color: #444444;
    background-color: #00000045;
    font-weight: normal;
    font-size: 13px;
    border-radius: 8px;
    position: absolute;
    z-index: 99999999;
    box-sizing: border-box;
    box-shadow: 0 1px 8px rgba(0, 0, 0, 0.5);
    display: none;
  }

  .tooltip2:hover .bottom {
    display: block;
  }

  .tooltip2 .bottom i {
    position: absolute;
    bottom: 100%;
    left: 50%;
    margin-left: -12px;
    width: 24px;
    height: 12px;
    overflow: hidden;
  }

  .tooltip2 .bottom i::after {
    content: '';
    position: absolute;
    width: 12px;
    height: 12px;
    left: 50%;
    transform: translate(-50%, 50%) rotate(45deg);
    background-color: #EEEEEE;
    box-shadow: 0 1px 8px rgba(0, 0, 0, 0.5);
  }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row" style="background-color: white;border: 1px solid black;">
      <div class="col-md-4" style="align-self: flex-end;">
        <img src="<?php echo $this->request->webroot; ?>img/username.png" width="50">
        <span class="usrname">
        <?= $userType[0]['type_name']; ?>
        </span>
      </div>
      <div class="col-md-6" style="align-self: flex-end;">
      <h1>Round 1- Phase 2- Execution</h1>
        <!-- <img src="<?php echo $this->request->webroot; ?>img/ROUND - 1.png" width="200px">
        <img src="<?php echo $this->request->webroot; ?>img/PHASE-2.png" width="200px"> -->
      </div>
      <!-- <div class="col-md-1" >
      </div> -->
      <div class="col-md-2" style="border-right: 1px solid;padding-top:10px;text-align:right;">
        <?php
        // echo $this->Html->link(
        //   'Log out',
        //   ['controller' => 'Users', 'action' => 'logout'],
        //   ['class' => 'btn btn-primary']

        // ); 
        ?>
      </div>
    </div>


    <div class="row">
      <div class="col-md-2">
      </div>
      <div class="col-md-6 offset-md-1" style="background-color:white;border: 1px solid #8080808c;">
        <div class="row">
          <div class="col-md-12" style="text-align:center ;"><button class="btn-primary" style="pointer-events:none;font-weight:bold;font-size: 30px;border-radius: 5px;"><?= $userType[0]['type_name']; ?></button></div>
        </div><br>
        <div class="row">
          <div class="col-md-12" style="text-align:center;margin-left:4px;">
          <img src="<?php echo $this->request->webroot; ?>img/family02.png">
          </div>
        </div>

        <!-- description -->
        <div class="row">
          <div class="col-md-12" style="text-align: center;"><span style="font-size:25px;font-weight:bold;">JOB DESCRIPTION</span></div>
        </div>

        <div class="row">
          <div class="col-md-10 offset-md-1">
            <span style="font-size: 15px;
               font-weight: 500;"><?= $JobDescriptions[0]['description']; ?></span>
          </div>
        </div><br>
<!-- Story -->
<!-- <div class="row">
          <div class="col-md-12" style="text-align: center;"><span style="font-size:25px;font-weight:bold;">PROJECT INFO</span></div>
        </div> -->

        <!-- <div class="row">
          <div class="col-md-10 offset-md-1">
            <span style="font-size: 15px;font-weight: 500;">
              <?= $JobDescriptions[0]['project_info']; ?>
            </span>
          </div>
        </div> -->
        <br>
        <br>
        <br>
        <br>

      </div>

      <div class="col-md-1 offset-md-2">
      <div class="row" style="position: fixed;bottom:0;">
          <div class="col-sm-12" style="padding-bottom: 10px;">
          <div class="btn btn-primary tooltip2">
                <?php
                echo $this->Html->link(
                    'Next',
                    ['controller' => 'Users', 'action' => 'round1phase2video'],['style'=>'color:white;font-weight:bold;font-size:20px;']
                );
                ?>
            <div class="bottom">
              <p style="color: white;">Click next to watch tutorial video.</p>
            </div>
          </div>

          <?php
          //  echo $this->Html->link(
          //     'NEXT',
          //     ['controller' => 'Users', 'action' => 'instruction'],
          //     ['class' => 'btn btn-primary']
          //   );
             ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- container fluid end -->
</body>