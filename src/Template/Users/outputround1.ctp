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

<style>
  .canvas-container {
    position: relative;
    width: 100% !important;
    height: 100% !important;
    box-shadow: 0 0 2px 1px black;
  }

  .canvas-container.over {
    border: 5px dashed #8080808c;
  }
  canvas {
		    width: 100% !important;
		    height: 100% !important;
		}
		
  #images img.img_dragging {
    opacity: 0.4;
  }

  /* 
Styles below based on  http://www.html5rocks.com/en/tutorials/dnd/basics/ 
*/

  /* Prevent the text contents of draggable elements from being selectable. */
  [draggable] {
    -moz-user-select: none;
    -khtml-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    /* Required to make elements draggable in old WebKit */
    -khtml-user-drag: element;
    -webkit-user-drag: element;
    cursor: move;
  }


  /* job description tooltip */
  .tooltip2 {
    display: inline-block;
    position: relative;
    border-bottom: 1px dotted #666;
    text-align: left;
  }

  .tooltip2 .bottom {
    min-width: 200px;
    top: 45px;
    left: 50%;
    transform: translate(-50%, 0);
    padding: 10px 20px;
    color: #444444;
    background-color: #EEEEEE;
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

  /* End job description */

  a.tip:hover {
    /* cursor: help; */
    position: relative
  }

  a.tip span {
    display: none;
  }

  a.tip:hover span {
    /* border: #c0c0c0 1px dotted; */
    padding: 5px 10px 5px 5px;
    display: block;
    z-index: 100;
    /* background: url(../images/status-info.png) #f0f0f0 no-repeat 100% 5%; */
    /* left: 0px; */
    margin: 10px;
    width: 50px;
    position: absolute;
    top: 20px;
    text-decoration: none;
    right: 5px;
    text-align: center;

  }

  .Content {
    height: 450px;
    overflow: auto;
    width:-webkit-fill-available;
  }
</style>

<head>
  <?php echo $this->Html->script('fabric.min'); ?>
  <?php echo $this->Html->script('lz-string.min'); ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>

<body>
<?php
//  echo (sizeof($r1_p2_Architect_result)> 0)?'hi':'hello';
// echo (sizeof($r1_p2_Carpenter_result)> 0)?'hi':'hello';
// echo (sizeof($r1_p2_Gardener_result)> 0)?'hi':'hello';
// echo (sizeof($r1_p2_Designer_result)> 0)?'hi':'hello';
?>

<?php $usertypeid = $userType[0]['id']; ?>

<!-- <?php if($usertypeid == 3){ ?>
  <input type="hidden" id="canvas_img" value="<?= (sizeof($r1_p2_Architect_result)> 0)?$r1_p2_Architect_result[0]['canvas_image']:''; ; ?>"/>
<?php } ?>
<?php if($usertypeid == 2){ ?>
  <input type="hidden" id="canvas_img" value="<?= (sizeof($r1_p2_Carpenter_result)> 0)?$r1_p2_Carpenter_result[0]['canvas_image']:''; ?>"/>
  <?php } ?>
<?php if($usertypeid == 1){ ?>
  <input type="hidden" id="canvas_img" value="<?= (sizeof($r1_p2_Gardener_result)> 0)?$r1_p2_Gardener_result[0]['canvas_image']:''; ?>"/>
  <?php } ?>
<?php if($usertypeid == 4){ ?>
  <input type="hidden" id="canvas_img" value="<?= (sizeof($r1_p2_Designer_result)> 0)? $r1_p2_Designer_result[0]['canvas_image']:''; ?>"/>
  <?php } ?> -->

  <input type="hidden" id="canvas_img" value="<?= (sizeof($r1_p2_Designer_result)> 0)? $r1_p2_Designer_result[0]['canvas_image']:''; ?>"/>

  <div class="container-fluid" id="outputcanvas" style="display:block;">
    <div class="row" style="background-color: white;box-shadow: 0px 6px 10px 0px #c8d1d9;
    border-bottom: 1px solid #e3eaf1;">
      <div class="col-md-3" style="align-self: flex-end;">
        <img src="<?php echo $this->request->webroot; ?>img/username.png" width="50">
        <span class="usrname">
          <?php print_r($userType[0]['type_name']); ?>
        </span>
      </div>
      <div class="col-md-6" style="align-self: flex-end;">
        <!-- <img src="<?php echo $this->request->webroot; ?>img/r1p2-Execution.png" style="max-width: 100%;max-height: 100%;"> -->
    <h1>Round -1 Phase -2 Output</h1> 
    </div>
    </div>

    <div class="row">
      <div class="col-md-2">
      <!-- style="border:1px solid;background-color:white;height: fit-content;" -->
      <!-- <span>Preview Round 1</span> -->
      <!-- <img src="<?= sizeof($p1_r1_result) > 0 ? $p1_r1_result[0]['canvas_image'] : '' ?>" style="max-width: 100%;max-height: 100%;"/> -->
      </div>
      <div class="col-md-9"><br>
        <div id="outercanvas" style="height: 570px;">
          <!-- <canvas id="drawing_1" width="1000" height="500"  style="position:absolute;"></canvas>
          <canvas id="drawing_2" width="1000"  height="500" style="position:absolute;"></canvas>
          <canvas id="drawing_3" width="1000" height="500" style="position:absolute;"></canvas>
          <canvas id="drawing_4" width="1000" height="500" style="position:absolute;border:1px solid;"></canvas> -->
          <canvas id="drawing" width="1000" height="570" style="border:1px solid;"></canvas>

        </div>
      </div>

      <div class="col-md-1">
      </div>
    </div>
<br>
    <div class="row">
    <!-- <div class="col-md-12" style="text-align: center;">
    <table style="background-color: #009B91;text-align: center;color: white;font-size: medium;font-weight: bold;">
  <thead>
    <tr>
      <th scope="col"><p>YOUR GROUP SCORE</p></th>
      <th scope="col"><p>MAX SCORE</p></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><p id="group_scorer1"><?php print_r($totalscorer1p2[0]->sum);?></p></th>
      <td><p id="max-score-id">5600</p></td>
      
    </tr>
  </tbody>
</table>
    </div> -->
      <div class="col-md-2 offset-md-4" style="padding: 0px;">
        <div style="background-color: #009B91;text-align: center;color: white;font-size: medium;font-weight: bold;">
        <p>Your Group Score</p>
      <p id="group_scorer1"><?php print_r($totalscorer1p2[0]->sum);?></p>
      </div>
      </div>
      <div class="col-md-2" style="padding: 0px;">
        <div style="background-color: #009B91;text-align: center;color: white;font-size: medium;font-weight: bold;">
        <p>Max Score</p>
      <p id="max-score-id">6000</p>
      </div>
      </div>
    <div class="col-md-2 offset-md-1">
    <?php
          echo $this->Html->link(
            'Finish',
            ['controller' => 'Users', 'action' => 'videolink']
            ,['class' => 'btn btn-primary', 'style'=>'font-weight:bold;font-size:20px;']

          ); ?>
    <!-- <button class="btn btn-primary" value="NEXT" id="output-finish-btn" style="width: 100px;">FINISH</button> -->
    </div>
    </div>
  </div><!-- architect logged in end -->
  
  <!-- screen to select round 1 phase 2 -->
  <div class="container-fluid" id="phase2round1selectscreen" style="display:none;">
    <div class="row" style="background-color: white;border: 1px solid black;">
      <div class="col-md-5" style="align-self: flex-end;">
        <img src="<?php echo $this->request->webroot; ?>img/username.png" width="50">
        <span class="usrname">
          <?= $userType[0]['type_name']; ?>
          <input type="hidden" id="typename" value="<?= $userType[0]['type_name']; ?>">
        </span>
      </div>
      <div class="col-md-5" style="align-self: flex-end;">
      </div>
      <div class="col-md-1">
      </div>
      <div class="col-md-1">
      </div>
    </div>

    <div class="row">
      <div class="col-md-5" style="padding: 0px;"></div>
      <div class="col-md-3"><br><br><br><br><br><br><br><br>
        <div class="row">
          <div class="col-sm-12">
            <span class="btn btn-primary" style="box-shadow: none;border-radius: 5px 15px 5px 5px;font-size: 20px;width:350px;padding: 35px;pointer-events: none;">
              PROCEED TO <br> ROUND 2 <br>
            <span>Everyone plays together now and will be able to see each others activity !!</span>
            </span>
              
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-12" style="text-align: center;">
          <?php
          echo $this->Html->link(
            'OK',
            ['controller' => 'Users', 'action' => 'videolink'],
            ['class' => 'btn btn-primary']

          ); ?>
            <!-- <button class="btn btn-primary" value="NEXT" style="width: 100px;">OK</button> -->
          </div>
        </div>
      </div>
      <div class="col-md-3"></div>
      <div class="col-md-1" style="height:90vh;">
      </div>
      
    </div>
  </div>

  <script>
$(document).ready(function() {
 var group_score =  parseInt($('#group_scorer1').text());
 var max_score =  parseInt($('#max-score-id').text());

 if(group_score > max_score){
 $('#group_scorer1').text(max_score);
 }

  // alert(group_score);
  // alert(max_score);

 var canvas_img= $('#canvas_img').val();

 var canvas = new fabric.Canvas('drawing', {
      isDrawingMode: false,
      backgroundImage: canvas_img
    });
    
    $('#output-finish-btn').on('click', function(){
      $('#outputcanvas').hide();
      $('#phase2round1selectscreen').show();
    })
});

      </script>

</body>