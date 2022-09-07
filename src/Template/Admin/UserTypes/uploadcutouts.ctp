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
/* remove button for images */

 </style>
</head>
<body>
<!-- start admin -->
<section id="admin">
  <!-- start sidebar -->
  <div class="sidebar" style="overflow-x: hidden;">
            <!-- start with head -->
            <div class="head">
                <div class="logo">
                    <img src="<?php echo $this->request->webroot; ?>img/logomain.png" alt="">
                </div>
                <!-- <p class="btn btn-danger pointnone">Cultural Change Admin</p> -->
            </div>
            <!-- end with head -->
            <!-- start the list -->
            <div id="list">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/dashboard.png style = vertical-align:sub;margin-right:10px;>' . 'Dashboard',
                            ['controller' => 'Users', 'action' => 'dashboard'],
                            ['class' => 'nav-link', 'escape' => false],
                        ); ?>
                    </li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/user.png style = vertical-align:sub;margin-right:10px;width:20px;height:20px;>' . 'Users',
                            ['controller' => 'Users', 'action' => 'index'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>


                    <!-- <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/report.png style = vertical-align:sub;margin-right:10px;width:20px;height:20px;>' . 'Report',
                            ['controller' => 'Reports', 'action' => 'index'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li> -->

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/settings.png style = vertical-align:sub;margin-right:10px;width:20px;height:20px;>' . 'Settings',
                            ['controller' => 'Users', 'action' => 'settings'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/adminprofile.png style = vertical-align:sub;margin-right:10px;width:20px;height:20px;>' . 'Admin Profile',
                            ['controller' => 'Users', 'action' => 'adminprofile'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/security.png style = vertical-align:sub;margin-right:10px;width:20px;height:20px;>' . 'Security',
                            ['controller' => 'Users', 'action' => 'security'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/planning&build.png style = vertical-align:sub;margin-right:0px;width:20px;height:20px;>' . 'Planning & Building',
                            ['controller' => 'UserTypes', 'action' => 'index'],
                            ['class' => 'nav-link active', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/analysis&Survey.png style = vertical-align:sub;margin-right:10px;width:15px;height:15px;>' . 'Analysis & Survey',
                            ['controller' => 'Users', 'action' => 'dashboard'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/creategames.png style = vertical-align:sub;margin-right:10px;width:15px;height:15px;>' . 'Create Games',
                            ['controller' => 'Users', 'action' => 'creategames'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/report.png style = vertical-align:sub;margin-right:10px;width:15px;height:15px;>' . 'Overview',
                            ['controller' => 'Users', 'action' => 'dashboard'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>

<li class="nav-item">
            <?php echo $this->Html->link(
              '<img src=' . $this->request->webroot . 'img/report.png style = vertical-align:sub;width:15px;height:15px;>' . 'Survey Results',
              ['controller' => 'SurveyResults', 'action' => 'index'],
              ['class' => 'nav-link', 'escape' => false]
            ); ?></li>
<li class="nav-item">
            <?php echo $this->Html->link(
              '<img src=' . $this->request->webroot . 'img/report.png style = vertical-align:sub;width:15px;height:15px;>' . 'Game codes',
              ['controller' => 'OnlineGames', 'action' => 'index'],
              ['class' => 'nav-link', 'escape' => false]
            ); ?></li>
                </ul>
            </div>
            <!-- end the list -->
        </div>
  <!-- end sidebar -->
  <!-- start content -->
  <div class="content">
    <!-- start content head -->
    <div class="head">
                <!-- head top -->
                <div class="top">
          <div class="left">
            <button id="on" class="btn btn-info"><i class="fa fa-bars"></i></button>
            <button id="off" class="btn btn-info hide"><i class="fa fa-align-left"></i></button><span style="font-weight: bold;font-size: 20px;">
             Planning & Building</span>
          </div>
          <div class="right">
          </div>
        </div>
                <!-- end head top -->
                <!-- start head bottom -->
                <div class="bottom" style="box-shadow: none;border-bottom: none;">
                    <div class="left">
                        <h6>Cultural Change - Buhler</h6>
                    </div>
                    <div class="right">
                        <!-- <?= $this->Html->link(__('Add New User'), ['action' => 'add'], ["class" => "btn btn-primary"]) ?> -->
                    </div>
                </div>

                <!-- end head bottom -->
            </div>
        
            <div class="col-sm-12" style="padding-left:0px;">
           <div class="row" style="padding-left: 0px;">
           <div class="col-md-6">

           <!-- <form method="POST" action="" enctype="multipart/form-data"> -->
           <?= $this->Form->create('', ['type' => 'POST','url' => ['action' => 'uploadcutouts/'.$userType['id']],'enctype'=>"multipart/form-data"]) ?>
      
           <div class="row">
               <div class="col-md-12">
               <button class="btn btn-primary edit-emailtxt" style="background-color: #009B91;" id="addnewemailbtn">
            <?= $userType->type_name;?> </button>
            </div>
           </div><br>

           <div class="row">
               <div class="col-md-4" style="text-align: center;">
               <span style="font-size: 20px;font-family:monospace;font-weight: bold;">
            Select File </span>
            </div>
            <div class="col-md-8">
            <input type="file" name="shape_image" value="" required/>
            </div>
           </div>

           <br><br>
           <div class="row">
               <div class="col-md-4" style="text-align: center;">
               <span style="font-size: 20px;font-family:monospace;font-weight: bold;">
            Category </span>
            </div>
            <?php
            // print_r($shape_group);
             ?>
            <div class="col-md-4">
                <select class="form-control" name="shape_group_id" style="box-shadow: 0px 6px 10px 0px #bbc0c5;border:none;">
                <?php foreach($shape_group as $shape_groups){ ?>
                    <option value="<?= $shape_groups['id'] ?>"><?= $shape_groups['shape_group_name'] ?></option>
                <?php }?>    
                </select>
            </div>
            <div class="col-md-4"></div>
           </div>
           <br><br>
           <div class="row">
               <div class="col-md-4" style="text-align: center;">
               <span style="font-size: 20px;font-family:monospace;font-weight: bold;">
            Add Score for image </span>
            </div>
            <?php
            // print_r($shape_group);
             ?>
            <div class="col-md-4">
                <input type="number" class="form-control" name="score" value="" required/>
            </div>
            <div class="col-md-4"></div>
           </div>
           
           <br>
            <div class="row">
               <div class="col-md-3" style="text-align: center;">
               <span style="font-size: 20px;font-family:monospace;font-weight: bold;">Cutout Width</span>
               </div>
               <div class="col-md-3" style="text-align: center;">
               <input type="number" class="form-control" name="width" value="" required/>
               </div>

               <div class="col-md-3" style="text-align: center;">
               <span style="font-size: 20px;font-family:monospace;font-weight: bold;">Cutout Height</span>
               </div>
               <div class="col-md-3" style="text-align: center;">
               <input type="number" class="form-control" name="height" value="" required/>
               </div>
            
             </div>

           <br>

           <div class="row">
               <div class="col-md-3">
            </div>
            <div class="col-md-3">
                <button type="submit" name="upload" class="btn btn-primary" style="background: white;
                 color: black;box-shadow: 0px 6px 10px 0px #bbc0c5;border-radius:15px;width:100%">
                Upload</button>
            </div>
            <div class="col-md-3">
            <?= $this->Html->link(__('Cancle'), ['action' => 'index'], ["class" => "btn btn-primary",'style'=>'background: white;
                 color: black;box-shadow: 0px 6px 10px 0px #bbc0c5;border-radius:15px;width:100%']) ?>

            <!-- <button class="btn btn-primary" style="background: white;
                 color: black;box-shadow: 0px 6px 10px 0px #bbc0c5;border-radius:15px;width:100%">
                Cancle</button> -->
            </div>
            <div class="col-md-3"></div>
           </div>
           <?= $this->Form->end();?>      
<br>
           
           </div>
           <div class="col-md-5 offset-md-1">
           <?php foreach($shape_group as $key => $value){ ?>
            <b><?= $value['shape_group_name'] ?></b><br>
               <div class="row">
            
               <?php foreach ($value['ShapeGroupName'] as  $cutouts_img) {  ?>

               <div class="col-md-2" style="background-color: white;border: 1px solid #c8d1d9;box-shadow: 6px 6px 10px 6px #c8d1d9;padding: 10px;" title="<?=$cutouts_img['shape_name'];?>">
               <img src="<?=(!empty($cutouts_img['shape_image'])) ? $this->request->webroot.'/img/cutouts/'.$cutouts_img['shape_image']:''?>" width="30"; height="30";/>    
          <br>&nbsp;&nbsp;
          <?= $this->Form->postLink(__('<i class="fa fa-trash" aria-hidden="true"></i>'),
                ['action' => 'deletecutout', $cutouts_img['id']],['escape' => false],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cutouts_img['id'])]
            )
            ?>
          <!-- <a href="javascript:void(0);" id="<?=$cutouts_img['id'];?>" name="delete"><i class="fa fa-trash" aria-hidden="true"></i></a> -->
        </div> &nbsp;
        <?php }?>    

               </div><br>
               <?php }?>    
           </div>
           </div>
        </div>
</div>
</body>
</html>


