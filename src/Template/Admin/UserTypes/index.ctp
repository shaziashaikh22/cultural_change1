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
                            '<img src=' . $this->request->webroot . 'img/dashboard.png style = vertical-align:sub;>' . 'Dashboard',
                            ['controller' => 'Users', 'action' => 'dashboard'],
                            ['class' => 'nav-link', 'escape' => false],
                        ); ?>
                    </li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/user.png style = vertical-align:sub;width:20px;height:20px;>' . 'Users',
                            ['controller' => 'Users', 'action' => 'index'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>


                    <!-- <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/report.png style = vertical-align:sub;width:20px;height:20px;>' . 'Report',
                            ['controller' => 'Reports', 'action' => 'index'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li> -->

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/settings.png style = vertical-align:sub;width:20px;height:20px;>' . 'Settings',
                            ['controller' => 'Users', 'action' => 'settings'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/adminprofile.png style = vertical-align:sub;width:20px;height:20px;>' . 'Admin Profile',
                            ['controller' => 'Users', 'action' => 'adminprofile'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/security.png style = vertical-align:sub;width:20px;height:20px;>' . 'Security',
                            ['controller' => 'Users', 'action' => 'security'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/planning&build.png style = vertical-align:sub;width:20px;height:20px;>' . 'Planning & Building',
                            ['controller' => 'UserTypes', 'action' => 'index'],
                            ['class' => 'nav-link active', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/analysis&Survey.png style = vertical-align:sub;width:15px;height:15px;>' . 'Analysis & Survey',
                            ['controller' => 'NewSurveys', 'action' => 'index'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/creategames.png style = vertical-align:sub;width:15px;height:15px;>' . 'Create Games',
                            ['controller' => 'Users', 'action' => 'creategames'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/report.png style = vertical-align:sub;width:15px;height:15px;>' . 'Overview',
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
            <button id="off" class="btn btn-info hide"><i class="fa fa-align-left"></i></button><span style="
    font-weight: bold;font-size: 20px;">Planning & Building</span>
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
            <div class="col-sm-12">
                <div class="row">
                <div class="col-md-3">
                    <span style="color: #009B91;font-size: 25px;font-weight: bold;font-family: monospace;">CATEGORY</span>
                </div>
                <div class="col-md-3"></div><div class="col-md-3"></div>
                <div class="col-md-3">
                <?= $this->Html->link(__('CREATE NEW ROLE'), ['action' => 'add'],['class'=>'btn btn-primary','style' =>'background-color: #009B91;font-size: 20px;font-weight: bold;border-radius: 0px;']) ?>
                </div>
            </div></div>
           <br>
           <?php foreach ($userTypes as $userType): ?>
            <div class="col-sm-12">
           <div class="row planbuild">
               <div class="col-md-3" style="text-transform: uppercase;"><?= $userType->type_name;?></div>
               <div class="col-md-3">
               <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/upload.png style = width:30px>' . 'Upload Cutouts',
                            ['controller' => 'UserTypes', 'action' => 'uploadcutouts',$userType->id], //12/07/2021
                            // ['controller' => 'UserTypes', 'action' =>'#'],
                            ['escape' => false],
                        ); ?>
               </div>
               <div class="col-md-3">
               <?= $this->Html->link(
                   '<img src=' . $this->request->webroot . 'img/pen.png style = width:30px>' . 'Edit'
                  , ['action' => 'edit', $userType->id],['escape' => false]); ?>   
            </div>
               <div class="col-md-3">
               <img src="<?php echo $this->request->webroot; ?>img/delete.png" width="30px"> 
               <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userType->id)]) ?>    
               </div>
           </div></div>
           <?php endforeach; ?>


    <!-- <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('access_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type_description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('upload_image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_type_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>

        </thead>
        <tbody>
        <?php foreach ($userTypes as $userType): ?>
                <tr>
                <td><?= $this->Number->format($userType->id) ?></td>
                <td><?= h($userType->type_name) ?></td>
                <td><?= $userType->has('access') ? $this->Html->link($userType->access->id, ['controller' => 'Accesses', 'action' => 'view', $userType->access->id]) : '' ?></td>
                <td><?= h($userType->upload_image) ?></td>
                <td><?= h($userType->user_type_status) ?></td>
                <td><?= h($userType->type_description) ?></td>
                <td><?= h($userType->created) ?></td>
                <td><?= h($userType->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userType->id)]) ?>
                </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table> -->
     <!-- <div class="paginator" style="font-size: 12px; padding-left: 5%;">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div> -->

</div>
</body>
</html>


