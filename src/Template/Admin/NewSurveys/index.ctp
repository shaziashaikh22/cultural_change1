<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NewSurvey[]|\Cake\Collection\CollectionInterface $newSurveys
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
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/analysis&Survey.png style = vertical-align:sub;width:15px;height:15px;>' . 'Analysis & Survey',
                            ['controller' => 'NewSurveys', 'action' => 'index'],
                            ['class' => 'nav-link active', 'escape' => false]
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
    font-weight: bold;font-size: 20px;">Analysis and Survey</span>
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
                    </div>
                </div>

                <!-- end head bottom -->
            </div>
            <div class="col-sm-12">
                <div class="row">
                <div class="col-md-3">
                    <span style="color:black;font-size: 25px;font-weight: bold;">Survey Questions</span>
                </div>
                <div class="col-md-3"></div><div class="col-md-3"></div>
                <div class="col-md-3">
                <?= $this->Html->link(__('+ Add Question'), ['action' => 'add'],['class'=>'btn btn-primary','style' =>'background-color: #009B91;font-size: 20px;font-weight: bold;']) ?>
                </div>
            </div></div>
           <br>
           <?php foreach ($newSurveys as $newSurvey): ?>
            <div class="col-sm-12">
           <div class="row surveystl">
               <div class="col-md-1"><?= 'Q'. $this->Number->format($newSurvey->id); ?></div>
               <div class="col-md-9"><?= $newSurvey->survey_question?></div>
               <div class="col-md-1">
               <?= $this->Html->link(
                   '<img src=' . $this->request->webroot . 'img/pen.png style = width:30px>'
                  , ['action' => 'edit', $newSurvey->id],['escape' => false]); ?>  
            </div>
               <div class="col-md-1">                
               <?= $this->Form->postLink(
                   '<img src=' . $this->request->webroot . 'img/delete.png style = width:30px>'
                  , ['action' => 'delete', $newSurvey->id],
                  ['escape' => false],
                  ['confirm' => __('Are you sure you want to delete # {0}?', $newSurvey->id)]
                 ); ?> 
                </div>

           </div>

        </div>
           <?php endforeach; ?>



</div>
</body>
</html>







<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New New Survey'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="newSurveys index large-9 medium-8 columns content">
    <h3><?= __('New Surveys') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('survey_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('survey_question') ?></th>
                <th scope="col"><?= $this->Paginator->sort('survey_answer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('survey_description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('survey_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($newSurveys as $newSurvey): ?>
            <tr>
                <td><?= $this->Number->format($newSurvey->id) ?></td>
                <td><?= h($newSurvey->survey_title) ?></td>
                <td><?= h($newSurvey->survey_question) ?></td>
                <td><?= h($newSurvey->survey_answer) ?></td>
                <td><?= h($newSurvey->survey_description) ?></td>
                <td><?= h($newSurvey->survey_status) ?></td>
                <td><?= h($newSurvey->created) ?></td>
                <td><?= h($newSurvey->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $newSurvey->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $newSurvey->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $newSurvey->id], ['confirm' => __('Are you sure you want to delete # {0}?', $newSurvey->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div> -->
