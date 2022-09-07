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
  /* #canvas-container2 {
    width: 1000px;
    height: 500px;
    box-shadow: 0 0 1px 1px black;
  }

  #canvas-container2.over {
    border: 5px dashed #8080808c;
  } */

  #images img.img_dragging {
    opacity: 0.4;
    /* position:  absolute;
    left: 0;
    top: 0; */
  }

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
    min-width: 400px;
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

  .canvas-container {
    position: absolute !important;
  }


  a.tip:hover {
    /* cursor: help; */
    position: relative
  }

  a.tip span {
    display: none
  }

  a.tip:hover span {
    border: #c0c0c0 1px dotted;
    padding: 5px 10px 5px 5px;
    display: block;
    z-index: 100;
    background: url(../images/status-info.png) #f0f0f0 no-repeat 100% 5%;
    /* left: 0px; */
    margin: 10px;
    width: auto;
    position: absolute;
    top: 20px;
    text-decoration: none;
    /* right: 15px; */
    text-align: center;
  }

  /* End job description */

  .Content {
    height: 450px;
    overflow-y: scroll;
    overflow-x: hidden;
    width: -webkit-fill-available;
  }

  .Content::-webkit-scrollbar {
    width: 1em;
    height: 1em
  }

  ::-webkit-scrollbar-button {
    background: no-repeat #e9ecef;
    background-size: 0.75em;
    background-position: center bottom;
  }

  ::-webkit-scrollbar-button:vertical:decrement {
    background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='100' height='100' fill='%235a6268'><polygon points='0,50 100,50 50,0'/></svg>");
  }

  ::-webkit-scrollbar-button:vertical:increment {
    background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='100' height='100' fill='%235a6268'><polygon points='0,0 100,0 50,50'/></svg>");
  }

  ::-webkit-scrollbar-track-piece {
    background: #f8f9fa
  }

  ::-webkit-scrollbar-thumb {
    background: #cce5ff
  }
</style>

<head>
  <?php echo $this->Html->script('fabric.min'); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>

<body>
  <div class="container-fluid" id="game_Inprocess" style="display:block;">
    <div class="row" style="background-color: white;box-shadow: 0px 6px 10px 0px #c8d1d9;
    border-bottom: 1px solid #e3eaf1;">
      <div class="col-md-3" style="align-self: flex-end;">
        <img src="<?php echo $this->request->webroot; ?>img/username.png" width="50">
        <span class="usrname">
          <?php print_r($userType[0]['type_name']); ?>
        </span>
      </div>
      <div class="col-md-6" style="align-self: flex-end;">
        <img src="<?php echo $this->request->webroot; ?>img/r2p2-Execution.png" style="max-width: 100%;max-height: 100%;">
      </div>

      <?php $usertypeid = $userType[0]['id']; ?>
      <div class="col-md-2">
        <div style="width: fit-content;padding:7px;margin-left:20px">
          <div class="btn btn-primary tooltip2"><?= $userType[0]['type_name']; ?>
            <div class="bottom">
              <h6>Project Info</h6>
              <?php foreach ($JobDescriptions as $JobDescription) { ?>
                <b><?= $JobDescription['user_type']['type_name']; ?></b>
                <p><?= $JobDescription['project_info']; ?></p>
              <?php  } ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-1" style="padding-top: 10px;">
        <?php
        // echo $this->Html->link(
        //   'Logout',
        //   ['controller' => 'Users', 'action' => 'logout'],
        //   ['class' => 'btn btn-primary']

        // ); 
        ?>
      </div>
    </div>

    <div class="row">

<!-- overview of round 2 phase 1 start -->
      <div class="col-md-2" style="background-color:#fcfcfc;height: fit-content;">
        <span>PREVIEW-PLANNING ROUND</span>
        <div id="preview_phase1" style="height: 200px;width:200px;position: relative;">
          <canvas id="drawing_preview_phase_1" width="1000" height="500" style="position:absolute;top:0;"></canvas>
          <canvas id="drawing_preview_phase_2" width="1000" ; height="500" ; style="position:absolute;"></canvas>
          <canvas id="drawing_preview_phase_3" width="1000" height="500" style="position:absolute;"></canvas>
          <canvas id="drawing_preview_phase_4" width="1000" height="500" style="position:absolute;"></canvas>
          <input type="hidden" id="architect_canvas_preview" value="<?= (sizeof($r2_p1_Architect_result) > 0) ? $r2_p1_Architect_result[0]['canvas_image'] : '';; ?>" />
          <input type="hidden" id="carpenter_canvas_preview" value="<?= (sizeof($r2_p1_Carpenter_result) > 0) ? $r2_p1_Carpenter_result[0]['canvas_image'] : ''; ?>" />
          <input type="hidden" id="gardener_canvas_preview" value="<?= (sizeof($r2_p1_Gardener_result) > 0) ? $r2_p1_Gardener_result[0]['canvas_image'] : ''; ?>" />
          <input type="hidden" id="designer_canvas_preview" value="<?= (sizeof($r2_p1_Designer_result) > 0) ? $r2_p1_Designer_result[0]['canvas_image'] : ''; ?>" />
        </div>
      </div>
<!-- overview of round 2 phase 1 End -->

<!-- Multiplayer canvases of round2 phase2 start -->
      <div class="col-md-9">&nbsp;
        <div id="outercanvas" style="height: 570px;width:1000px;position: relative;">
          <canvas id="drawing_1" width="1000" height="570" style="position:absolute;top:0;"></canvas>
          <canvas id="drawing_2" width="1000" ; height="570" ; style="position:absolute;"></canvas>
          <canvas id="drawing_3" width="1000" height="570" style="position:absolute;"></canvas>
          <canvas id="drawing_4" width="1000" height="570" style="position:absolute;border: 1px solid gray;"></canvas>
        </div>
      </div>
<!-- Multiplayer canvases of round2 phase2 Ends -->

<!-- Cutouts section start -->
      <div class="col-md-1" style="background-color:white;">
        <div class="row">
          <div class="col-sm-12">
            <span style="border-bottom: #247c7c 0.125em solid;font-size: 20px;font-weight: bold;color:#247c7c;">CUTOUTS
            </span>
          </div>
        </div>
        <div class="row">
          <div class="Content">
            <?php foreach ($shape_group as $key => $value) { ?>
              <div class="row">
                <div class="col-sm-12" style="text-align: center;">
                  <span style="font-size:15px;font-weight: bold;color:#247c7c;"><?= $value['shape_group_name'] ?></span>
                </div>
              </div><br>
              <?php if ($userType[0]['id'] == 3) { ?>
                <div id="images">
                  <?php foreach ($value['ShapeGroupName'] as  $cutouts_img) {  ?>
                    <div class="row" style="padding-bottom: 10px;">
                      <div class="col-sm-12" style="text-align: center;margin-bottom:10px;">
                        <a href="javascript:void(0);" class="tip"><span><?= $cutouts_img['shape_name']; ?></span><img draggable="true" src="<?= (!empty($cutouts_img['shape_image'])) ? $this->request->webroot . '/img/cutouts/' . $cutouts_img['shape_image'] : '' ?>" id="<?= $cutouts_img['score_round2']; ?>" shapename="<?= $cutouts_img['shape_name']; ?>" style="width:<?= $cutouts_img['width']; ?>; height:<?= $cutouts_img['height']; ?>" /></a>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              <?php } else { ?>
                <div id="images">
                  <div class="row" style="padding-bottom: 10px;">
                    <?php foreach ($value['ShapeGroupName'] as  $cutouts_img) { ?>
                      <?php
                      if ($value['shape_group_name'] == "Windows" || $value['shape_group_name'] == "Door") {
                      ?>
                        <div class="col-sm-12" style="text-align: center;margin-bottom: 10px;">
                          <a href="javascript:void(0);" class="tip"><span><?= $cutouts_img['shape_name']; ?></span><img draggable="true" src="<?= (!empty($cutouts_img['shape_image'])) ? $this->request->webroot . '/img/cutouts/' . $cutouts_img['shape_image'] : '' ?>" id="<?= $cutouts_img['score_round2']; ?>" shapename="<?= $cutouts_img['shape_name']; ?>"/></a>
                        </div>
                      <?php
                      }
                      ?>

                      <?php
                      if ($value['shape_group_name'] == "Plants & Trees" || $value['shape_group_name'] == "Pots") {
                      ?>
                        <div class="col-sm-12" style="text-align: center;margin-bottom: 10px;">
                          <a href="javascript:void(0);" class="tip"><span><?= $cutouts_img['shape_name']; ?></span><img draggable="true" src="<?= (!empty($cutouts_img['shape_image'])) ? $this->request->webroot . '/img/cutouts/' . $cutouts_img['shape_image'] : '' ?>" id="<?= $cutouts_img['score_round2']; ?>" shapename="<?= $cutouts_img['shape_name']; ?>" style="width:<?= $cutouts_img['width']; ?>; height:<?= $cutouts_img['height']; ?>" /></a>
                        </div>
                      <?php
                      }
                      ?>

                      <?php
                      if ($value['shape_group_name'] == "Garden") { ?>
                        <div class="col-sm-12" style="text-align: center;margin-bottom: 10px;">
                          <a href="javascript:void(0);" class="tip"><span><?= $cutouts_img['shape_name']; ?></span><img draggable="true" src="<?= (!empty($cutouts_img['shape_image'])) ? $this->request->webroot . '/img/cutouts/' . $cutouts_img['shape_image'] : '' ?>" id="<?= $cutouts_img['score_round2']; ?>" shapename="<?= $cutouts_img['shape_name']; ?>" style="width:<?= $cutouts_img['width']; ?>; height:<?= $cutouts_img['height']; ?>" /></a>
                        </div>
                      <?php
                      }
                      ?>
                      <?php
                      if ($value['shape_group_name'] == "Living Area" || $value['shape_group_name'] == "Bedroom" || $value['shape_group_name'] == "Dinning") { ?>
                        <div class="col-sm-12" style="text-align: center;margin-bottom: 10px;">
                          <a href="javascript:void(0);" class="tip"><span><?= $cutouts_img['shape_name']; ?></span><img draggable="true" src="<?= (!empty($cutouts_img['shape_image'])) ? $this->request->webroot . '/img/cutouts/' . $cutouts_img['shape_image'] : '' ?>" id="<?= $cutouts_img['score_round2']; ?>" shapename="<?= $cutouts_img['shape_name']; ?>" style="width:<?= $cutouts_img['width']; ?>; height:<?= $cutouts_img['height']; ?>" /></a>
                        </div>
                      <?php
                      }
                      ?>
                    <?php
                    } // foreach end
                    ?>
                  </div>
                </div>

              <?php } ?>
            <?php } ?>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12" style="text-align: center;">
            <a href="javascript:redo();"><img src="<?php echo $this->request->webroot; ?>img/redo.png" style="padding-top:20px;"></a>
          </div>
          <div class="col-sm-12" style="text-align: center;margin-bottom:5px;">
            <a href="javascript:undo();"><img src="<?php echo $this->request->webroot; ?>img/undo.png" style="padding-top: 20px;"></a>
          </div>
        </div>
      </div>
<!-- Cutouts section Ends -->
    </div>

<!-- Bottom section start -->
    <div class="row" style="padding-top:30px;text-align:center;">
      <div class="col-md-2" style="border: 1px solid;">
        <button class="btn btn-primary time-txt" id="showtime" style="pointer-events: none;color:black;background: white;box-shadow: none;"></button>
      </div>
      <!-- <div class="col-md-8"></div> -->
      <div class="col-md-1 offset-md-8">
        <input type="hidden" name="canvas_image_init4" value="" id="canvas_image_init4" />
        <input type="hidden" name="canvas_image" value="" id="p2_r2_canvas" />
        <input type="hidden" name="score" value="" id="updatescore">
        <!-- <button class="btn btn-primary" id="submit_round2phase2" onclick="savecanvas();" value="NEXT" style="display:none"></button> -->
        <input type="hidden" id="user_type" name="user_type" value="<?= $user['user_type_id']; ?>">
        <button class="btn btn-primary time-txt" id="finish_btn4" onclick="savecanvas();" style="display:none;">Finish</button>
      </div>
      <div class="col-md-1">
        <!-- <img onClick="clearcanvas()" src="<?php echo $this->request->webroot; ?>img/delete1_new35.png" style="padding-top:10px;"> -->
      </div>
    </div>
<!-- Bottom section Ends     -->

    <?php date_default_timezone_set('asia/kolkata'); ?>
    <input type="hidden" name="update_start_time" id="start_timeID" value="<?= date("d-m-y h:i:s"); ?>">
    <input type="hidden" value="" id="time_in_seconds" />
    <input type="hidden" value="" id="get_db_time" />
  </div>

<!-- architect score, limit, shape name  -->
  <!-- 2 large bedroom -->
  <input type="hidden" name="large_bed_room1" id="large_bed_room1" value="" /><!-- value = "Large Bed Room" -->
  <input type="hidden" name="large_bed_room2" id="large_bed_room2" value="" /><!-- value = "Large Bed Room" -->
  
  <!-- 1 Large living room -->
  <input type="hidden" name="large_living_room_1" id="large_living_room_1" value="" /><!-- value = "Large Living Room" -->

  <!-- 1 office -->
  <input type="hidden" name="office_1" id="office_1" value="" /><!-- value = "Office" -->

  <!-- 1 kitchen without living -->
  <input type="hidden" name="kitchen_1" id="kitchen_1" value="" /><!-- value = "Kitchen" -->

  <!-- 1 Bathroom with bathtub -->
  <input type="hidden" name="bath_with_bathtub1" id="bath_with_bathtub1" value="" /><!-- value = "Bathroom with bathtub" -->
  

<!-- carpenter score, limit, shape name -->
<!-- 1 double door -->
<input type="hidden" name="double_door_1" id="double_door_1" value="" /><!-- value = "Double door" -->

<!-- 1 door -->
<input type="hidden" name="door_1" id="door_1" value="" /><!-- value = "door" -->
<!-- <input type="hidden" name="door_2" id="door_2" value="" />value = "door" -->

<!-- 4 sliding doors -->
<input type="hidden" name="sliding_door_1" id="sliding_door_1" value="" /><!-- value = "sliding doors" -->
<input type="hidden" name="sliding_door_2" id="sliding_door_2" value="" /><!-- value = "sliding doors" -->
<input type="hidden" name="sliding_door_3" id="sliding_door_3" value="" /><!-- value = "sliding doors" -->
<input type="hidden" name="sliding_door_4" id="sliding_door_4" value="" /><!-- value = "sliding doors" -->
<!-- <input type="hidden" name="sliding_door_5" id="sliding_door_5" value="" />value = "sliding doors" -->

<!-- 5 Window -->
<input type="hidden" name="bigwindow_1" id="bigwindow_1" value="" /><!-- value = "Window" -->
<input type="hidden" name="bigwindow_2" id="bigwindow_2" value="" /><!-- value = "Window" -->
<input type="hidden" name="bigwindow_3" id="bigwindow_3" value="" /><!-- value = "Window" -->
<input type="hidden" name="bigwindow_4" id="bigwindow_4" value="" /><!-- value = "Window" -->
<input type="hidden" name="bigwindow_5" id="bigwindow_5" value="" /><!-- value = "Window" -->


<!-- Gardener score, limit, shape name -->
<!-- 5 or more Trees -->
   <input type="hidden" name="tree_1" id="tree_1" value="" /><!-- value = "tree1 / tree2 / tree3" -->
  <input type="hidden" name="tree_2" id="tree_2" value="" /><!-- value = "tree1 / tree2 / tree3" -->
  <input type="hidden" name="tree_3" id="tree_3" value="" /><!-- value = "tree1 / tree2 / tree3" -->
  <input type="hidden" name="tree_4" id="tree_4" value="" /><!-- value = "tree1 / tree2 / tree3" -->
  <input type="hidden" name="tree_5" id="tree_5" value="" /><!-- value = "tree1 / tree2 / tree3" -->

  <!-- 1 fountain -->
  <input type="hidden" name="fountain_1" id="fountain_1" value="" /><!-- value = "fountain" -->

  <!-- 1 slide -->
  <input type="hidden" name="slide_1" id="slide_1" value="" /><!-- value = "slide" -->

<!-- 1 family swing   -->
<input type="hidden" name="family_swing1" id="family_swing1" value="" /><!-- value = "Family swing" -->

<!-- 6 plants & bushes -->
  <input type="hidden" name="plant_or_bush_1" id="plant_or_bush_1" value="" /><!-- value = "plant1 / plant2 / plant3 / bush1 / bush2 / bush3" -->
  <input type="hidden" name="plant_or_bush_2" id="plant_or_bush_2" value="" /><!-- value = "plant1 / plant2 / plant3 / bush1 / bush2 / bush3" -->
  <input type="hidden" name="plant_or_bush_3" id="plant_or_bush_3" value="" /><!-- value = "plant1 / plant2 / plant3 / bush1 / bush2 / bush3" -->
  <input type="hidden" name="plant_or_bush_4" id="plant_or_bush_4" value="" /><!-- value = "plant1 / plant2 / plant3 / bush1 / bush2 / bush3" -->
  <input type="hidden" name="plant_or_bush_5" id="plant_or_bush_5" value="" /><!-- value = "plant1 / plant2 / plant3 / bush1 / bush2 / bush3" -->
  <input type="hidden" name="plant_or_bush_6" id="plant_or_bush_6" value="" /><!-- value = "plant1 / plant2 / plant3 / bush1 / bush2 / bush3" -->

<!-- Interior Designer score, limit, shapename -->
<!-- 1 sofa -->
<input type="hidden" name="sofa_1" id="sofa_1" value="" /><!-- value = "sofa_1.png/ sofa_2.png" -->

<!-- 4 carpet -->
<input type="hidden" name="carpet_1" id="carpet_1" value="" /><!-- value = "carpet" -->
<input type="hidden" name="carpet_2" id="carpet_2" value="" /><!-- value = "carpet" -->
<input type="hidden" name="carpet_3" id="carpet_3" value="" /><!-- value = "carpet" -->
<input type="hidden" name="carpet_4" id="carpet_4" value="" /><!-- value = "carpet" -->

<!-- 1 small dining table -->
<input type="hidden" name="dining_table_1" id="dining_table_1" value="" /><!-- value = "small dining table" -->

<!-- 1 study -->
<!-- <input type="hidden" name="study_1" id="study_1" value="" />value = "study" -->

<!-- 1 table -->
<input type="hidden" name="table_1" id="table_1" value="" /><!-- value = "table" -->

<!-- 1 lamp -->
<input type="hidden" name="lamp_1" id="lamp_1" value="" /><!-- value = "Standing lamp" -->

<!-- 1 double bed   -->
<input type="hidden" name="double_bed_1" id="double_bed_1" value="" /><!-- value = "double bed" -->

<!-- 1 single bed  -->
<input type="hidden" name="single_bed_1" id="single_bed_1" value="" /><!-- value = "single bed" -->

        

<div id="hidden_input_score_div"></div>

<!-- round2 phase 1 preview -->
  <script>
    $(document).ready(function() {
      var architect_img_preview = $('#architect_canvas_preview').val();
      var carpenter_img_preview = $('#carpenter_canvas_preview').val();
      var gardener_img_preview = $('#gardener_canvas_preview').val();
      var designer_img_preview = $('#designer_canvas_preview').val();

      var canvas4_preview = new fabric.Canvas('drawing_preview_phase_1', {
        isDrawingMode: false,
        backgroundImage: architect_img_preview,
      });
      var ctx4_preview = canvas4_preview.getContext("2d");
      ctx4_preview.globalAlpha = 0.5;

      var canvas3_preview = new fabric.Canvas('drawing_preview_phase_2', {
        isDrawingMode: false,
        backgroundImage: carpenter_img_preview,
      });

      var ctx3_preview = canvas3_preview.getContext("2d");
      ctx3_preview.globalAlpha = 0.5;


      var canvas2_preview = new fabric.Canvas('drawing_preview_phase_3', {
        isDrawingMode: false,
        backgroundImage: gardener_img_preview,
      });
      var ctx2_preview = canvas2_preview.getContext("2d");
      ctx2_preview.globalAlpha = 0.5;


      var canvas_preview = new fabric.Canvas('drawing_preview_phase_4', { // current is drawing_4
        isDrawingMode: false,
        backgroundImage: designer_img_preview,
      });
      var ctx_preview = canvas_preview.getContext("2d");
      ctx_preview.globalAlpha = 1;
    });
  </script>
  <!-- round2 phase 1 preview -->

  <script>
    var isRedoing = false;
    var h = [];

    // function undo() {
    //   if (canvas._objects.length > 0) {
    //     h.push(canvas._objects.pop());
    //     canvas.renderAll();
    //   }
    // }

    // function redo() {
    //   if (h.length > 0) {
    //     isRedoing = true;
    //     canvas.add(h.pop());
    //   }
    // }

    function undo() {
      if (canvas._objects.length > 0) {
  
        var undo_input_score = $('.undo_redo_score').map((_,el) => el.value).get(); // Undo or delete score from existing score start   
        undo_input_score.unshift('0');  // add 1 element at the begining of array
        var getclick = canvas._objects.length; // console.log(getclick);
        var remove_score = undo_input_score.splice(getclick,1); // Removes the clicked count number element
        undo_from_exist_score = +remove_score.join(""); // convert array to integer
        undo_from_existscore(undo_from_exist_score);// Undo or delete score from existing score End      
   
        h.push(canvas._objects.pop());
        canvas.renderAll();
      }
    }


    function redo() {
      if (h.length > 0) {
        isRedoing = true;
        
        var redo_input_score = $('.undo_redo_score').map((_,el) => el.value).get();// redo score into existing score start      
        redo_input_score.push('0');  // add 1 element at the end of array
       redo_input_score.reverse(); // reverse array so last 0 would be first 0.
       var get_redo_clicks = h.length;
        var add_score = redo_input_score.splice(get_redo_clicks,1); // Removes the clicked count number element
        redo_into_exist_score = +add_score.join(""); // convert array to integer
        redo_existscore(redo_into_exist_score);// redo score into existing score start  
    
       canvas.add(h.pop());
      }
    }


    canvas4 = new fabric.Canvas('drawing_1', { // this canvas should be for architect
      isDrawingMode: false,
    });
    var ctx4 = canvas4.getContext("2d");
    ctx4.globalAlpha = 0.5;

    canvas3 = new fabric.Canvas('drawing_2', { //this canvas should be for carpenter
      isDrawingMode: false,
    });

    var ctx3 = canvas3.getContext("2d");
    ctx3.globalAlpha = 0.5;

    canvas2 = new fabric.Canvas('drawing_3', { //this canvas should be for gardener
      isDrawingMode: false,
    });
    var ctx2 = canvas2.getContext("2d");
    ctx2.globalAlpha = 0.5;

    canvas = new fabric.Canvas('drawing_4', { // current is drawing_4  this canvas should be for interior designer
      isDrawingMode: false,
    });
    var ctx = canvas.getContext("2d");
    ctx.globalAlpha = 0.5;

    //Prevent Fabric js Objects from scaling out of the canvas boundary start 4-26-2022
    canvas.on('object:moving', function(e) {
      var obj = e.target;
      // if object is too big ignore
      if (obj.currentHeight > obj.canvas.height || obj.currentWidth > obj.canvas.width) {
        return;
      }
      obj.setCoords();
      // top-left  corner
      if (obj.getBoundingRect().top < 0 || obj.getBoundingRect().left < 0) {
        obj.top = Math.max(obj.top, obj.top - obj.getBoundingRect().top);
        obj.left = Math.max(obj.left, obj.left - obj.getBoundingRect().left);
      }
      // bot-right corner
      if (obj.getBoundingRect().top + obj.getBoundingRect().height > obj.canvas.height || obj.getBoundingRect().left + obj.getBoundingRect().width > obj.canvas.width) {
        obj.top = Math.min(obj.top, obj.canvas.height - obj.getBoundingRect().height + obj.top - obj.getBoundingRect().top);
        obj.left = Math.min(obj.left, obj.canvas.width - obj.getBoundingRect().width + obj.left - obj.getBoundingRect().left);
      }
    }); // end 4-26-2022


    // this below code is for object should not be go outside of canvas start - 6-22-2022
    canvas.on('object:added', function(e) {
      var obj2 = e.target;
      // if object is too big ignore
      if (obj2.currentHeight > obj2.canvas.height || obj2.currentWidth > obj2.canvas.width) {
        return;
      }
      obj2.setCoords();
      // top-left  corner
      if (obj2.getBoundingRect().top < 0 || obj2.getBoundingRect().left < 0) {
        obj2.top = Math.max(obj2.top, obj2.top - obj2.getBoundingRect().top);
        obj2.left = Math.max(obj2.left, obj2.left - obj2.getBoundingRect().left);
      }
      // bot-right corner
      if (obj2.getBoundingRect().top + obj2.getBoundingRect().height > obj2.canvas.height || obj2.getBoundingRect().left + obj2.getBoundingRect().width > obj2.canvas.width) {
        obj2.top = Math.min(obj2.top, obj2.canvas.height - obj2.getBoundingRect().height + obj2.top - obj2.getBoundingRect().top);
        obj2.left = Math.min(obj2.left, obj2.canvas.width - obj2.getBoundingRect().width + obj2.left - obj2.getBoundingRect().left);
      }
    }); // this below code is for object should not be go outside of canvas End - 6-22-2022


    
// Cutouts Drag and Drop section started
    function handleDragStart(e) {
      e.dataTransfer.setData('text/plain', '');
      [].forEach.call(images, function(img) {
        img.classList.remove('img_dragging');
      });
      this.classList.add('img_dragging');

      var postscore = $(this).attr('id'); // update score on drag start
      // updatescore(postscore);
      var current_user_role = $('#user_type').val(); // get current user role 7-12-2022
      var shapename = $(this).attr('shapename'); // get shape name 7-12-2022

// for architect score work start 7-12-2022

          if (current_user_role == 3) { // if current user is Architect 

        if(shapename != "Large Bed Room" && shapename != "Large Living Room" && shapename != "Office" && shapename != "Kitchen" && shapename != "Bathroom with bathtub"){
          var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
        $('#hidden_input_score_div').append(new_input);
        }

        if (shapename == "Large Bed Room") { //if shape is Large Bed Room
          if ($('#large_bed_room1').val().length === 0) {
            $('#large_bed_room1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          } else if (($('#large_bed_room2').val().length === 0)) {
            $('#large_bed_room2').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          } 
          else{
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          }
        } 

        if (shapename == "Large Living Room") { // if shape name is Large Living Room
          if ($('#large_living_room_1').val().length === 0) {
            $('#large_living_room_1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          }
          else{
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          }
        }

        if (shapename == "Office") { // if shape name is Office
          if ($('#office_1').val().length === 0) {
            $('#office_1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          }
          else{
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          }
        }
        if (shapename == "Kitchen") { // if shape name is Kitchen
          if ($('#kitchen_1').val().length === 0) {
            $('#kitchen_1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          }else{
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          }
        }

        if (shapename == "Bathroom with bathtub") { // if shape name is  Bathroom with bathtub
          if ($('#bath_with_bathtub1').val().length === 0) {
            $('#bath_with_bathtub1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          }
          else{
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          }
        }
      }
      // for architect score work end 7-12-22


       // for Carpenter score work start 7-12-22
       if (current_user_role == 2) {

        if(shapename != "Double door" && shapename != "door" && shapename != "sliding doors" && shapename != "Window"){
          var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
        $('#hidden_input_score_div').append(new_input);
        }

        if (shapename == "Double door") { //if shape is Double door [limit 1]
          if ($('#double_door_1').val().length === 0) {
            $('#double_door_1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);// undo/redo end
        } else {
          // undo/redo start
          var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);// undo/redo end
        }
      }

        if (shapename == "door") { // if shape name is door
          if ($('#door_1').val().length === 0) {
            $('#door_1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);// undo/redo end
          }
          //  else if ($('#door_2').val().length === 0) {
          //   $('#door_2').val(shapename);
          //   updatescore(postscore);
          //   // undo/redo start
          //   var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
          //   $('#hidden_input_score_div').append(new_input);// undo/redo end
          // } 
          else {
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);// undo/redo end
          }
        }

        if (shapename == "sliding doors") { //if shape is sliding doors
          if ($('#sliding_door_1').val().length === 0) {
            $('#sliding_door_1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end

          } else if (($('#sliding_door_2').val().length === 0)) {
            $('#sliding_door_2').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          } else if (($('#sliding_door_3').val().length === 0)) {
            $('#sliding_door_3').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          } else if (($('#sliding_door_4').val().length === 0)) {
            $('#sliding_door_4').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          } 
          // else if (($('#sliding_door_5').val().length === 0)) {
          //   $('#sliding_door_5').val(shapename);
          //   updatescore(postscore);
          //   // undo/redo start
          //   var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
          //   $('#hidden_input_score_div').append(new_input); // undo/redo end
          // } 
           else {
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          }
        }

      if (shapename == "Window") { //if shape is Window limit 5
          if ($('#bigwindow_1').val().length === 0) {
            $('#bigwindow_1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end

          } else if (($('#bigwindow_2').val().length === 0)) {
            $('#bigwindow_2').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          } else if (($('#bigwindow_3').val().length === 0)) {
            $('#bigwindow_3').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          } else if (($('#bigwindow_4').val().length === 0)) {
            $('#bigwindow_4').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          } 
          else if (($('#bigwindow_5').val().length === 0)) {
            $('#bigwindow_5').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          } 
           else {
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          }
        }


      }
      // for Carpenter score work end 7-12-2022

 // for Gardener score work 7-12-2022
 if (current_user_role == 1) {
  if(shapename != "tree1" && shapename != "tree2" && shapename != "tree3" && shapename != "Family swing" && shapename != "fountain" && shapename != "slide"){
    // && shapename != "plant1" && shapename != "plant2" && shapename != "plant3" && shapename != "bush1" && shapename != "bush2" && shapename != "bush3"
          var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
        $('#hidden_input_score_div').append(new_input);
        }

        if (shapename == "tree1" || shapename == "tree2" || shapename == "tree3") { // if shape name is tree1/tree2/tree3
          if ($('#tree_1').val().length === 0) {
            $('#tree_1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end

          } else if ($('#tree_2').val().length === 0) {
            $('#tree_2').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          } else if ($('#tree_3').val().length === 0) {
            $('#tree_3').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          } else if ($('#tree_4').val().length === 0) {
            $('#tree_4').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          } else if ($('#tree_5').val().length === 0) {
            $('#tree_5').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          } else {
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          }
        }

        // if (shapename == "plant1" || shapename == "plant2" || shapename == "plant3" || shapename == "bush1" || shapename == "bush2" || shapename == "bush3") { // if shape name is plant1 / plant2 / plant3 / bush1 / bush2 / bush3
        //   if ($('#plant_or_bush_1').val().length === 0) {
        //     $('#plant_or_bush_1').val(shapename);
        //     updatescore(postscore);
        //     // undo/redo start
        //     var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
        //     $('#hidden_input_score_div').append(new_input); // undo/redo end
        //   } else if ($('#plant_or_bush_2').val().length === 0) {
        //     $('#plant_or_bush_2').val(shapename);
        //     updatescore(postscore);
        //     // undo/redo start
        //     var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
        //     $('#hidden_input_score_div').append(new_input); // undo/redo end
        //   } else if ($('#plant_or_bush_3').val().length === 0) {
        //     $('#plant_or_bush_3').val(shapename);
        //     updatescore(postscore);
        //     // undo/redo start
        //     var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
        //     $('#hidden_input_score_div').append(new_input); // undo/redo end
        //   } else if ($('#plant_or_bush_4').val().length === 0) {
        //     $('#plant_or_bush_4').val(shapename);
        //     updatescore(postscore);
        //     // undo/redo start
        //     var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
        //     $('#hidden_input_score_div').append(new_input); // undo/redo end
        //   } else if ($('#plant_or_bush_5').val().length === 0) {
        //     $('#plant_or_bush_5').val(shapename);
        //     updatescore(postscore);
        //     // undo/redo start
        //     var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
        //     $('#hidden_input_score_div').append(new_input); // undo/redo end
        //   }
        //   else if ($('#plant_or_bush_6').val().length === 0) {
        //     $('#plant_or_bush_6').val(shapename);
        //     updatescore(postscore);
        //     // undo/redo start
        //     var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
        //     $('#hidden_input_score_div').append(new_input); // undo/redo end
        //   }
        //   else {
        //     // undo/redo start
        //     var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
        //     $('#hidden_input_score_div').append(new_input); // undo/redo end
        //   }
        // }

        if (shapename == "Family swing") { // if shape name is Family swing
          if ($('#family_swing1').val().length === 0) {
            $('#family_swing1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          } 
           else {
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
           }
        }

        if (shapename == "fountain") { // if shape name is fountain
          if ($('#fountain_1').val().length === 0) {
            $('#fountain_1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          } 
           else {
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
           }
        }

        if (shapename == "slide") { // if shape name is slide
          if ($('#slide_1').val().length === 0) {
            $('#slide_1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          } else {
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          }
        }
  }   
    
// Interior Designer score work start 7-12-2022
    if (current_user_role == 4) { // if user role is Interior Designer

      if(shapename != "sofa" && shapename != "carpet" && shapename != "Small dining table" && shapename != "table" && shapename != "Standing lamp" && shapename != "double bed" && shapename != "single bed"){
          var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
        $('#hidden_input_score_div').append(new_input);
        }

      if (shapename == "sofa") { // if shape name is sofa_1.png/sofa_2.png
          if ($('#sofa_1').val().length === 0) {
            $('#sofa_1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else {
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          }
        }

        if (shapename == "carpet") { // if shape name is carpet
          if ($('#carpet_1').val().length === 0) {
            $('#carpet_1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          }
          else if ($('#carpet_2').val().length === 0) {
            $('#carpet_2').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          }
           else if ($('#carpet_3').val().length === 0) {
            $('#carpet_3').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          }
           else if ($('#carpet_4').val().length === 0) {
            $('#carpet_4').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          }
          else {
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          }
        }

        if (shapename == "Small dining table") { // if shape name is Small dining table
          if ($('#dining_table_1').val().length === 0) {
            $('#dining_table_1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else {
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          }
        }
        // if (shapename == "study") { // if shape name is study
        //   if ($('#study_1').val().length === 0) {
        //     $('#study_1').val(shapename);
        //     updatescore(postscore);
        //     // undo/redo start
        //     var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
        //     $('#hidden_input_score_div').append(new_input);
        //     // undo/redo end
        //   } else {
        //     // undo/redo start
        //     var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
        //     $('#hidden_input_score_div').append(new_input);
        //     // undo/redo end
        //   }
        // }
        if (shapename == "table") { // if shape name is table
          if ($('#table_1').val().length === 0) {
            $('#table_1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else {
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          }
        }

        if (shapename == "Standing lamp") { // if shape name is Standing lamp
          if ($('#lamp_1').val().length === 0) {
            $('#lamp_1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else {
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          }
        } 

        if (shapename == "double bed") { // if shape name is double bed
          if ($('#double_bed_1').val().length === 0) {
            $('#double_bed_1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else {
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          }
        } 

        if (shapename == "single bed") { // if shape name is single bed
          if ($('#single_bed_1').val().length === 0) {
            $('#single_bed_1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else {
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          }
        } 
        
    }
    }

    function handleDragOver(e) {
      if (e.preventDefault) {
        e.preventDefault(); // Necessary. Allows us to drop.
      }

      e.dataTransfer.dropEffect = 'copy'; // See the section on the DataTransfer object.
      // NOTE: comment above refers to the article (see top) -natchiketa
      return false;
    }

    function handleDragEnter(e) {
      // this / e.target is the current hover target.
      this.classList.add('over');
    }

    function handleDragLeave(e) {
      this.classList.remove('over'); // this / e.target is previous target element.
    }

    function handleDrop(e) {

      // this / e.target is current target element.
      e.preventDefault();
      if (e.stopPropagation) {
        e.stopPropagation(); // stops the browser from redirecting.
      }

      var img = document.querySelector('#images img.img_dragging');
      console.log('event: ', e);
      // var setImageWidth = 100, setImageHeight = 100;
      var newImage = new fabric.Image(img, {
        width: img.naturalWidth,
        height: img.naturalHeight,

        // scaleX: setImageWidth/img.naturalWidth,        
        // scaleY: setImageHeight/img.naturalHeight,
        // Set the center of the new object based on the event coordinates relative
        // to the canvas container.
        left: e.layerX - img.naturalWidth / 2,
        top: e.layerY - img.naturalHeight / 2
      });
      canvas.add(newImage);

      return false;
    }

    function handleDragEnd(e) {
      // this/e.target is the source node.
      [].forEach.call(images, function(img) {
        img.classList.remove('img_dragging');
      });
    }

    if (Modernizr.draganddrop) {
      // Browser supports HTML5 DnD.
      // Bind the event listeners for the image elements
      var images = document.querySelectorAll('#images img');
      [].forEach.call(images, function(img) {
        img.addEventListener('dragstart', handleDragStart, false);
        img.addEventListener('dragend', handleDragEnd, false);
      });
      // Bind the event listeners for the canvas
      var canvasContainer = document.getElementById('outercanvas');
      canvasContainer.addEventListener('dragenter', handleDragEnter, false);
      canvasContainer.addEventListener('dragover', handleDragOver, false);
      canvasContainer.addEventListener('dragleave', handleDragLeave, false);
      canvasContainer.addEventListener('drop', handleDrop, false);
    } else {
      // Replace with a fallback to a library solution.
      alert("This browser doesn't support the HTML5 Drag and Drop API.");
    }
// Cutouts Drag and Drop section Ends
  </script>

  <script>
    function clearcanvas() {
      canvas.clear();
    }
  </script>

  <script>
    $(document).ready(function() {

      var initial_canvas4 = $('#canvas_image_init4').val();
      $.ajax({
        url: "initialround2phase2",
        type: "POST",
        data: {
          canvas_image_initl4: initial_canvas4,
        },
        success: function(data) {}
      })

      setInterval(function() {
        src = canvas.toDataURL('image/png');
        // updatecanvas(src);
        form1(src);
        form2();
      }, 1000);
    })
  </script>

  <script>
    // 5-27-2022 added start
    $(document).ready(function() {
      var get_currentTime = $('#start_timeID').val();
      updateTime(get_currentTime);

      function updateTime(get_currentTime) { // update time initially at page load
        //  alert(get_currentTime);
        return $.ajax({
          url: "r2p2updateTime",
          type: "POST",
          data: {
            update_start_time: get_currentTime,
          },
          success: function(data) {}
        })
      }
    })

    var window_state = false;
    var endTime;

    $(document).ready(function() { // get time after 2 seconds of page load
      setTimeout(getTime, 500);
    })

    window.addEventListener("focus", function(event) {
      getTimeonfocus();
      window_state = false;
    }, false);
  </script>

  <script>
    function getTime() {
      return $.ajax({
        url: "fetchTimeR2p2",
        type: "GET",
        success: function(data) {
          var get_db_time = JSON.parse(data);
          // alert(get_db_time);
          $('#get_db_time').val(get_db_time);
          getseconds();
        }
      })
    }

    function getseconds() {
      var db_time = $('#get_db_time').val();
      // alert(db_time);
      return $.ajax({
        url: "timedifferenceR2p2",
        type: "POST",
        data: {
          db_start_time: db_time,
        },
        success: function(data) {

          var get_seconds = JSON.parse(data);
          $('#time_in_seconds').val(get_seconds);
          var count_downTime = $('#time_in_seconds').val();
          var count_Down = count_downTime - 300;
          // alert(count_Down);
          endTime = Math.abs(count_Down); //Math.abs(count_Down)
          countDown();

          function secondsToTime(secs) {
            // var hours = Math.floor(secs / (60 * 60));
            var divisor_for_minutes = secs % (60 * 60);
            var minutes = Math.floor(divisor_for_minutes / 60);
            var divisor_for_seconds = divisor_for_minutes % 60;
            var seconds = Math.ceil(divisor_for_seconds);
            return minutes + ':' + seconds;
          }

          function countDown() {
            if (endTime > 0) {
              $('#showtime').text('Time' +'\xa0\xa0\xa0'+ secondsToTime(endTime));
              setTimeout(function() {
                endTime = endTime - 1;
                countDown();
              }, 1000);
            } else {
              src = canvas.toDataURL('image/png'); // added 5-27-2022
              form1(src); // added 5-27-2022
              $('#finish_btn4').click();
            }
          }
        }
      })
    }

    function getTimeonfocus() {
      return $.ajax({
        url: "fetchTimeR2p2",
        type: "GET",
        success: function(data) {
          var get_db_time = JSON.parse(data);
          // alert(get_db_time);
          $('#get_db_time').val(get_db_time);
          getsecondsonfocus();
        }
      })
    }

    function getsecondsonfocus() {
      var db_time = $('#get_db_time').val();
      // alert(db_time);
      return $.ajax({
        url: "timedifferenceR2p2",
        type: "POST",
        data: {
          db_start_time: db_time,
        },
        success: function(data) {
          var get_seconds = JSON.parse(data);
          $('#time_in_seconds').val(get_seconds);
          var count_downTime = $('#time_in_seconds').val();
          var count_Down = count_downTime - 300;
          // alert(count_Down);
          endTime = Math.abs(count_Down); //Math.abs(count_Down)
        }
      })
    }
  </script>
  <!-- 5-27-2022 added end -->

  <!-- onclick of finish button trigger submit round 2 phase 2 button click -->
  <script>
    $('#finish_btn4').on('click', function() {
      location.href = 'outputround2';
    });
  </script>

  <script>
    function form1(current_canvas) {
      $('#p2_r2_canvas').val(current_canvas);
      current_canvas = $('#p2_r2_canvas').val();

      return $.ajax({
        url: "round2phase2",
        type: "POST",
        cache: false,
        data: {
          canvas_image: current_canvas,
        },
        success: function() {},
      })
    }

    function form2() {
      var user_type = $('#user_type').val();
      return $.ajax({
        url: "othercanvas2",
        type: "POST",
        cache: false,
        data: {
          user_type_id: user_type,
        },
        success: function(response) {
          var parsedJson = JSON.parse(response);

          var image1 = new Image();
          image1.onload = function() {
            ctx4.clearRect(0, 0, canvas4.width, canvas4.height);
            ctx4.drawImage(image1, 0, 0);
          };
          image1.src = parsedJson[0].canvas_image;

          var image2 = new Image();
          image2.onload = function() {
            ctx3.clearRect(0, 0, canvas3.width, canvas3.height);
            ctx3.drawImage(image2, 0, 0);
          };
          image2.src = parsedJson[1].canvas_image;

          var image3 = new Image();
          image3.onload = function() {
            ctx2.clearRect(0, 0, canvas2.width, canvas2.height);
            ctx2.drawImage(image3, 0, 0);
          };
          image3.src = parsedJson[2].canvas_image;

          // var image1 = new Image();
          // image1.onload = function() {
          //   ctx4.clearRect(0,0,canvas4.width,canvas4.height);
          //   ctx4.drawImage(image1, 0, 0);
          // };
          // image1.src = parsedJson[0].canvas_image;

          // var image2 = new Image();
          // image2.onload = function() {
          //   ctx3.clearRect(0,0,canvas3.width,canvas3.height);
          //   ctx3.drawImage(image2, 0, 0);
          // };
          // image2.src = parsedJson[1].canvas_image;

          // var image3 = new Image();
          // image3.onload = function() {
          //   ctx2.clearRect(0,0,canvas2.width,canvas2.height);
          //   ctx2.drawImage(image3, 0, 0);
          // };
          // image3.src = parsedJson[2].canvas_image;
        },
      })
    }

    // update scores into existing 
    function updatescore(score) {
      $('#updatescore').val(score);
      var newscore = $('#updatescore').val();

      return $.ajax({
        url: "updatescoreStep4",
        type: "POST",
        data: {
          score: newscore,
        },
        success: function(data) {}
      })
    }

    // delete/ undo scores into existing 13-July-2022
    function undo_from_existscore(undo_from_exist_score) { // delete/undo given score from existing score
      return $.ajax({
        url: "deletescoreStep4",
        type: "POST",
        data: {
          score_delete: undo_from_exist_score,
        },
        success: function(data) {}
      })
    }

    // add/ redo scores into existing 13-July-2022
    function redo_existscore(redo_into_exist_score) { // add/redo given score from existing score
      return $.ajax({
        url: "redoscoreStep4",
        type: "POST",
        data: {
          score_redo: redo_into_exist_score,
        },
        success: function(data) {}
      })
    }
  </script>
  <!-- save canvas as image Phase 2 Round 2 -->
  <!-- <script>
        function savecanvas() {
  src = canvas.toDataURL('image/png');
  $('#p2_r2_canvas').val(src);
          }


           // function countDown(endTime) {
      //   if (endTime > 0) {
      //     $('#showtime').text('Time ' + secondsToTime(endTime));
      //     setTimeout(function() {
      //       countDown(endTime - 1);
      //     }, 1000);
      //   } else {
      //   //   $('#game_Inprocess').hide();
      //   //   $('#game_complete').show();
      //   //   getscore4();
      //   //  topscore4();  
      //   $('#finish_btn4').click();  
      //    //$('#submit_round2phase2').click();
      //     }
      // }
      // countDown(180);
      // function secondsToTime(secs) {
      //   // var hours = Math.floor(secs / (60 * 60));
      //   var divisor_for_minutes = secs % (60 * 60);
      //   var minutes = Math.floor(divisor_for_minutes / 60);
      //   var divisor_for_seconds = divisor_for_minutes % 60;
      //   var seconds = Math.ceil(divisor_for_seconds);
      //   return minutes + ':' + seconds;
      // }

      // function updatecanvas(current_canvas) {
    //   $('#p2_r2_canvas').val(current_canvas);
    //   current_canvas = $('#p2_r2_canvas').val();

    //   return $.ajax({
    //     url: "updatecanvasR2p2",
    //     type: "POST",
    //     data: {
    //       canvas_image: current_canvas,
    //     },
    //     success: function(data) {
    //       // console.log(data);
    //     }
    //   })
    // }

    // function updatelogintablestatus() {
    //         return $.ajax({
    //             url: "updateloginformatchesr2p2",
    //             type: "GET",
    //             success: function(data) {
    //             }
    //         })
    //     }

    // function getscore4() {
    //   return $.ajax({
    //     url: "getscoreStep4",
    //     type: "GET",
    //     success: function(data) {
    //       var p_score = JSON.parse(data);
    //       $('#get_your_score').text(p_score);
    //     }
    //   })
    // }

    // function topscore4() {
    //   return $.ajax({
    //     url: "topscoreStep4",
    //     type: "GET",
    //     success: function(data) {
    //       var p_topscore = JSON.parse(data); //JSON.stringify(data);
    //       console.log(p_topscore);
    //       $.each(p_topscore, function(k, v) {
    //         $(`<div class="row">
    //         <div class="col-md-6 offset-md-3 arcp1r1txt"><span>${v['score']}</span></div>
    //         <div class="col-md-3"></div>
    //       </div>`).appendTo($('#topscore_id'));
    //         // console.log(v['score'])
    //       })
    //     }
    //   })
    // }
  </script> -->

</body>