<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NewSurvey $newSurvey
 */
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


                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/report.png style = vertical-align:sub;width:20px;height:20px;>' . 'Report',
                            ['controller' => 'Reports', 'action' => 'index'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>

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
                <!-- <div class="col-md-3">
                <?= $this->Html->link(__('+ Add Question'), ['action' => 'add'],['class'=>'btn btn-primary','style' =>'background-color: #009B91;font-size: 20px;font-weight: bold;']) ?>
                </div> -->
            </div><br>

            <?= $this->Form->create($newSurvey) ?>
            <div class="row">
            <div class="col-md-12">
          <input type="text" name="survey_question" class="form-control" placeholder="Type your question here." style="box-shadow: 0px 6px 10px 0px #c8d1d9;"/>      
            </div>
            </div><br/>

            <div class="row"><div class="col-md-9"></div>
            <div class="col-md-3">
            <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary','style' =>'background-color: #009B91;font-size: 20px;font-weight: bold;padding: 10px 30px 10px 30px;border-radius: 0px;']) ?>
            </div>
            </div>
    <?= $this->Form->end() ?>
        
        </div><!-- 12-row-end -->
</div>
</body>
</html>



<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List New Surveys'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="newSurveys form large-9 medium-8 columns content">
    <?= $this->Form->create($newSurvey) ?>
    <fieldset>
        <legend><?= __('Add New Survey') ?></legend>
        <?php
            echo $this->Form->control('survey_title');
            echo $this->Form->control('survey_question');
            echo $this->Form->control('survey_answer');
            echo $this->Form->control('survey_description');
            echo $this->Form->control('survey_status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div> -->
