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

  /* End job description */

  a.tip:hover {
    /* cursor: help; */
    position: relative
  }

  a.tip span {
    display: none;
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
    /* right: 5px; */
    text-align: center;
  }

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
  <?php echo $this->Html->script('lz-string.min'); ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>

<body>
  <input type="hidden" id="current_user_type_id2" value="<?= $userType[0]['id']; ?>">
  <input type="hidden" id="players_turn_id2" value="">


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
        <img src="<?php echo $this->request->webroot; ?>img/r1p2-Execution.png" style="max-width: 100%;max-height: 100%;">
      </div>
      <?php $usertypeid = $userType[0]['id']; ?>
      <div class="col-md-2">
        <div style="width: fit-content;padding:7px;">
          <div class="btn btn-primary tooltip2"><?= $userType[0]['type_name']; ?>
            <div class="bottom">
              <!-- <h6>JOB DESCRIPTION</h6>
              <p><?= $JobDescriptions[0]['description']; ?></p> -->
              <h6>Project Info</h6>
              <p><?= $JobDescriptions[0]['project_info']; ?></p>
            </div>
          </div>

        </div>
      </div>
      <div class="col-md-1" style="text-align: center;padding-top:10px;">
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
      <div class="col-md-2" style="border:1px solid;background-color:white;height: fit-content;">
        <span>PREVIEW-PLANNING ROUND</span>
        <!-- <img src="<?= sizeof($p1_r1_result) > 0 ? $p1_r1_result[0]['canvas_image'] : '' ?>" style="max-width: 100%;max-height: 100%;" /> -->
        <img src="<?= sizeof($p1_r2_Designer_result) > 0 ? $p1_r2_Designer_result[0]['canvas_image'] : '' ?>" style="max-width: 100%;max-height: 100%;" />
      </div>
      <div class="col-md-9"><br>
        <input type="hidden" id="architect_canvas" value="">
        <div id="outercanvas" style="height: 570px;width:1000px;">
          <canvas id="drawing" width="1000" height="570" style="border: 1px solid;"></canvas>
        </div>
      </div>

      <div class="col-md-1" style="background-color:white;">
        <div class="row">
          <div class="col-sm-12">
            <span style="border-bottom: #247c7c 0.125em solid;font-size: 20px;font-weight: bold;color:#247c7c;">CUTOUTS
            </span>
          </div>
        </div><br>
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
                        <a href="javascript:void(0);" class="tip"><span><?= $cutouts_img['shape_name']; ?></span><img draggable="true" src="<?= (!empty($cutouts_img['shape_image'])) ? $this->request->webroot . '/img/cutouts/' . $cutouts_img['shape_image'] : '' ?>" id="<?= $cutouts_img['score']; ?>" shapename="<?= $cutouts_img['shape_name']; ?>" style="width:<?= $cutouts_img['width']; ?>; height:<?= $cutouts_img['height']; ?>" /></a>
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
                          <a href="javascript:void(0);" class="tip"><span><?= $cutouts_img['shape_name']; ?></span><img draggable="true" src="<?= (!empty($cutouts_img['shape_image'])) ? $this->request->webroot . '/img/cutouts/' . $cutouts_img['shape_image'] : '' ?>" id="<?= $cutouts_img['score']; ?>" shapename="<?= $cutouts_img['shape_name']; ?>" /></a>
                        </div>
                      <?php
                      }
                      ?>

                      <?php
                      if ($value['shape_group_name'] == "Plants & Trees" || $value['shape_group_name'] == "Pots") {
                      ?>
                        <div class="col-sm-12" style="text-align: center;margin-bottom: 10px;">
                          <a href="javascript:void(0);" class="tip"><span><?= $cutouts_img['shape_name']; ?></span><img draggable="true" src="<?= (!empty($cutouts_img['shape_image'])) ? $this->request->webroot . '/img/cutouts/' . $cutouts_img['shape_image'] : '' ?>" id="<?= $cutouts_img['score']; ?>" shapename="<?= $cutouts_img['shape_name']; ?>" style="width:<?= $cutouts_img['width']; ?>; height:<?= $cutouts_img['height']; ?>" /></a>
                        </div>
                      <?php
                      }
                      ?>

                      <?php
                      if ($value['shape_group_name'] == "Garden") { ?>
                        <div class="col-sm-12" style="text-align: center;margin-bottom: 10px;">
                          <a href="javascript:void(0);" class="tip"><span><?= $cutouts_img['shape_name']; ?></span><img draggable="true" src="<?= (!empty($cutouts_img['shape_image'])) ? $this->request->webroot . '/img/cutouts/' . $cutouts_img['shape_image'] : '' ?>" id="<?= $cutouts_img['score']; ?>" shapename="<?= $cutouts_img['shape_name']; ?>" style="width:<?= $cutouts_img['width']; ?>; height:<?= $cutouts_img['height']; ?>" /></a>
                        </div>
                      <?php
                      }
                      ?>
                      <?php
                      if ($value['shape_group_name'] == "Living Area" || $value['shape_group_name'] == "Bedroom" || $value['shape_group_name'] == "Dinning") { ?>
                        <div class="col-sm-12" style="text-align: center;margin-bottom: 10px;">
                          <a href="javascript:void(0);" class="tip"><span><?= $cutouts_img['shape_name']; ?></span><img draggable="true" src="<?= (!empty($cutouts_img['shape_image'])) ? $this->request->webroot . '/img/cutouts/' . $cutouts_img['shape_image'] : '' ?>" id="<?= $cutouts_img['score']; ?>" shapename="<?= $cutouts_img['shape_name']; ?>" style="width:<?= $cutouts_img['width']; ?>; height:<?= $cutouts_img['height']; ?>" /></a>
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
            <a href="javascript:undo();" id="undo_link"><img src="<?php echo $this->request->webroot; ?>img/undo.png" style="padding-top: 20px;"></a>
          </div>
        </div>
      </div>

    </div>

    <div class="row" style="padding-top: 15px;text-align:center;">
      <div class="col-md-2" style="border: 1px solid;">
        <span id="sts_waiting" style="display: none;color: #009B91;font-size: medium;font-weight: bold;">
          You can play around with the whiteboard while waiting !!</span>
        <button class="btn btn-primary time-txt" id="showtime" style="pointer-events: none;color:black;background: white;box-shadow: none;"></button>
      </div>
      <div class="col-md-8">
        <div class="row">
          <?php foreach ($alluserType as $alluser_type) { ?>
            <div class="col-md-3" style="border: 1px solid grey;">
              <span style="color: #009B91;font-size: medium;font-weight: bold;"><?= $alluser_type['type_name']; ?></span><span id="thisisyou<?= $alluser_type['id']; ?>" style="display: none;color: #009B91;font-size: medium;font-weight: bold;"> : This is you!</span><br>
              <span id="playing<?= $alluser_type['id']; ?>" style="display: none;color: #009B91;font-size: medium;font-weight: bold;">Status : Playing</span>
              <span id="onlyready<?= $alluser_type['id']; ?>" style="display: none;color: #009B91;font-size: medium;font-weight: bold;">Status : Ready</span>
              <span id="youarenext<?= $alluser_type['id']; ?>" style="display: none;color: #009B91;font-size: medium;font-weight: bold;">Status : You are next</span>
              <span id="done<?= $alluser_type['id']; ?>" style="display: none;color: #009B91;font-size: medium;font-weight: bold;">Status : Done</span>
            </div>
          <?php } ?>
        </div>
      </div>

      <div class="col-md-1" style="align-content: center;display: flex;flex-wrap: wrap;">
        <input type="hidden" name="score_update" value="" id="updatescore">

        <?=
        $this->Form->create('', ['type' => 'POST', 'url' => ['action' => 'round1phase2'], 'style' => 'text-align: center;'])
        ?>
        <input type="hidden" name="canvas_image" value="" id="round1phase2_canvas" />
        <input type="hidden" name="score" value="0" />
        <button class="btn btn-primary time-txt" type="submit" id="submit_round1phase2" name="submit_round1phase2" onclick="savecanvas();" style="max-width: 100%;max-height: 100%;">Finish</button>
        <!-- <button class="btn btn-primary" type="submit" id="submit_round1phase2" name="submit_round1phase2" onclick="savecanvas();" value="NEXT" style="width: 100px;">NEXT</button> -->
        <?php
        $this->Form->end();
        ?>
        <input type="hidden" name="canvas_image_initl" value="" id="round1phase2_canvas_initl" />
        <!-- <button class="btn btn-primary time-txt" id="finish_btn2" style="max-width: 100%;max-height: 100%;">Finish</button> -->
      </div>
      <div class="col-md-1">
      </div>
    </div>
  </div><!-- architect logged in end -->

  <!-- architect score, limit, shape name -->
  <!-- 3 large bedroom -->
  <input type="hidden" name="large_bed_room1" id="large_bed_room1" value="" /><!-- value = "Large Bed Room" -->
  <input type="hidden" name="large_bed_room2" id="large_bed_room2" value="" /><!-- value = "Large Bed Room" -->
  <input type="hidden" name="large_bed_room3" id="large_bed_room3" value="" /><!-- value = "Large Bed Room" -->
  <!-- 1 bath with shower -->
  <input type="hidden" name="bath_with_shower" id="bath_with_shower" value="" /><!-- value = "bath with shower" -->
  <!-- 1 bath with bathtub -->
  <input type="hidden" name="bath_with_bathtub" id="bath_with_bathtub" value="" /><!-- value = "bath with bathtub" -->
  <!-- 1 Living with kitchen -->
  <input type="hidden" name="living_with_kitchen" id="living_with_kitchen" value="" /><!-- value = "Living with Kitchen" -->

  <!-- carpenter score, limit, shape name -->
  <!-- 5 Big window -->
  <input type="hidden" name="big_window1" id="big_window1" value="" /><!-- value = "Big window" -->
  <input type="hidden" name="big_window2" id="big_window2" value="" /><!-- value = "Big window" -->
  <input type="hidden" name="big_window3" id="big_window3" value="" /><!-- value = "Big window" -->
  <input type="hidden" name="big_window4" id="big_window4" value="" /><!-- value = "Big window" -->
  <input type="hidden" name="big_window5" id="big_window5" value="" /><!-- value = "Big window" -->

  <!-- 2 doors -->
  <input type="hidden" name="door1" id="door1" value="" /><!-- value = "door" -->
  <input type="hidden" name="door2" id="door2" value="" /><!-- value = "door" -->

  <!-- 5 sliding doors -->
  <input type="hidden" name="sliding_door1" id="sliding_door1" value="" /><!-- value = "sliding doors" -->
  <input type="hidden" name="sliding_door2" id="sliding_door2" value="" /><!-- value = "sliding doors" -->
  <input type="hidden" name="sliding_door3" id="sliding_door3" value="" /><!-- value = "sliding doors" -->
  <input type="hidden" name="sliding_door4" id="sliding_door4" value="" /><!-- value = "sliding doors" -->
  <input type="hidden" name="sliding_door5" id="sliding_door5" value="" /><!-- value = "sliding doors" -->


  <!-- Gardeners score, limit, shape name -->
  <!-- 8 Trees -->
  <input type="hidden" name="tree_1" id="tree_1" value="" /><!-- value = "tree1 / tree2 / tree3" -->
  <input type="hidden" name="tree_2" id="tree_2" value="" /><!-- value = "tree1 / tree2 / tree3" -->
  <input type="hidden" name="tree_3" id="tree_3" value="" /><!-- value = "tree1 / tree2 / tree3" -->
  <input type="hidden" name="tree_4" id="tree_4" value="" /><!-- value = "tree1 / tree2 / tree3" -->
  <input type="hidden" name="tree_5" id="tree_5" value="" /><!-- value = "tree1 / tree2 / tree3" -->
  <input type="hidden" name="tree_6" id="tree_6" value="" /><!-- value = "tree1 / tree2 / tree3" -->
  <input type="hidden" name="tree_7" id="tree_7" value="" /><!-- value = "tree1 / tree2 / tree3" -->
  <input type="hidden" name="tree_8" id="tree_8" value="" /><!-- value = "tree1 / tree2 / tree3" -->

  <!-- 8 plants -->
  <input type="hidden" name="plant_1" id="plant_1" value="" /><!-- value = "plant1 / plant2 / plant3" -->
  <input type="hidden" name="plant_2" id="plant_2" value="" /><!-- value = "plant1 / plant2 / plant3" -->
  <input type="hidden" name="plant_3" id="plant_3" value="" /><!-- value = "plant1 / plant2 / plant3" -->
  <input type="hidden" name="plant_4" id="plant_4" value="" /><!-- value = "plant1 / plant2 / plant3" -->
  <input type="hidden" name="plant_5" id="plant_5" value="" /><!-- value = "plant1 / plant2 / plant3" -->
  <input type="hidden" name="plant_6" id="plant_6" value="" /><!-- value = "plant1 / plant2 / plant3" -->
  <input type="hidden" name="plant_7" id="plant_7" value="" /><!-- value = "plant1 / plant2 / plant3" -->
  <input type="hidden" name="plant_8" id="plant_8" value="" /><!-- value = "plant1 / plant2 / plant3" -->

  <!-- 10 bushes -->
  <input type="hidden" name="bush_1" id="bush_1" value="" /><!-- value = "bush1 / bush2 / bush3" -->
  <input type="hidden" name="bush_2" id="bush_2" value="" /><!-- value = "bush1 / bush2 / bush3" -->
  <input type="hidden" name="bush_3" id="bush_3" value="" /><!-- value = "bush1 / bush2 / bush3" -->
  <input type="hidden" name="bush_4" id="bush_4" value="" /><!-- value = "bush1 / bush2 / bush3" -->
  <input type="hidden" name="bush_5" id="bush_5" value="" /><!-- value = "bush1 / bush2 / bush3" -->
  <input type="hidden" name="bush_6" id="bush_6" value="" /><!-- value = "bush1 / bush2 / bush3" -->
  <input type="hidden" name="bush_7" id="bush_7" value="" /><!-- value = "bush1 / bush2 / bush3" -->
  <input type="hidden" name="bush_8" id="bush_8" value="" /><!-- value = "bush1 / bush2 / bush3" -->
  <input type="hidden" name="bush_9" id="bush_9" value="" /><!-- value = "bush1 / bush2 / bush3" -->
  <input type="hidden" name="bush_10" id="bush_10" value="" /><!-- value = "bush1 / bush2 / bush3" -->

  <!-- 2 swings -->
  <input type="hidden" name="swing_1" id="swing_1" value="" /><!-- value = "Family swing / swing" -->
  <input type="hidden" name="swing_2" id="swing_2" value="" /><!-- value = "Family swing / swing" -->
  <!-- 1 pool -->
  <input type="hidden" name="pool_1" id="pool_1" value="" /><!-- value = "pool" -->
  <!-- 1 seesaw -->
  <input type="hidden" name="seesaw_1" id="seesaw_1" value="" /><!-- value = "seesaw" -->
  <!-- 1 slide -->
  <input type="hidden" name="slide_1" id="slide_1" value="" /><!-- value = "slide" -->


  <!-- Interior Designer score, limit, shape name -->
  <!-- 1 Double Bed -->
  <input type="hidden" name="double_bed_1" id="double_bed_1" value="" /><!-- value = "double bed" -->
  <!-- 2 Night stand -->
  <input type="hidden" name="night_stand1" id="night_stand1" value="" /><!-- value = "night stand" -->
  <input type="hidden" name="night_stand2" id="night_stand2" value="" /><!-- value = "night stand" -->
  <!-- 3 single bed -->
  <input type="hidden" name="single_bed1" id="single_bed1" value="" /><!-- value = "single bed" -->
  <input type="hidden" name="single_bed2" id="single_bed2" value="" /><!-- value = "single bed" -->
  <input type="hidden" name="single_bed3" id="single_bed3" value="" /><!-- value = "single bed" -->
  <!-- 2 sofa -->
  <input type="hidden" name="sofa_1" id="sofa_1" value="" /><!-- value = "sofa1 / sofa2" -->
  <input type="hidden" name="sofa_2" id="sofa_2" value="" /><!-- value = "sofa1 / sofa2" -->
  <!-- 1 Large dinining table -->
  <input type="hidden" name="big_dining_1" id="big_dining_1" value="" /><!-- value = "Big dining" -->

  <div id="hidden_input_score_div"></div>
  <!-- <input type="hidden" id="undo_clicks" value="0"/>
  <input type="hidden" id="redo_clicks" value="0"/> -->

  
  <script>
    var isRedoing = false;
    var h = [];

    // var undo_clicks = 0;
    // var redo_clicks = 0;

    // function undo() {
    //   if (canvas._objects.length > 0) {
  
    //     var undo_input_score = $('.undo_redo_score').map((_,el) => el.value).get();// Undo or delete score from existing score start    
    //     undo_input_score.push('0');  // add 1 element at the end of array
    //     undo_input_score.reverse(); // reverse array so last 0 would be first 0.
    //     undo_clicks += 1;
    //   $('#undo_clicks').val(undo_clicks);
    //   var getclick = $('#undo_clicks').val();
    //     var remove_score = undo_input_score.splice(getclick,1); // Removes the clicked count number element
    //     undo_from_exist_score = +remove_score.join(""); // convert array to integer
    //     undo_from_existscore(undo_from_exist_score) // Undo or delete score from existing score start  
    
    //     h.push(canvas._objects.pop());
    //     canvas.renderAll();
    //   }
    // }

    // function redo() {
    //   if (h.length > 0) {
    //     isRedoing = true;
           
    //     var redo_input_score = $('.undo_redo_score').map((_,el) => el.value).get();// redo score into existing score start   
    //     redo_input_score.push('0');  // add 1 element at the end of array
    //     redo_input_score.reverse(); // reverse array so last 0 would be first 0.
    //     redo_clicks += 1;
    //   $('#redo_clicks').val(redo_clicks);
    //   var get_redo_clicks = $('#redo_clicks').val();
    //     var add_score = redo_input_score.splice(get_redo_clicks,1); // Removes the clicked count number element
    //     redo_into_exist_score = +add_score.join(""); // convert array to integer
    //     redo_existscore(redo_into_exist_score); // call function to redo scores
       
    //     var undoData= canvas.add(h.pop());
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

    function getplayersturn() {
      return $.ajax({
        url: "getplayersturn",
        type: "GET",
        success: function(data) {
          var p_turn = JSON.parse(data);
          // alert(p_turn['players_turn']);
          $('#players_turn_id2').val(p_turn['players_turn']);
        }
      })
    }

    function turnovercanvas() {
      return $.ajax({
        url: "turnOverPlayersCanvas2", // round 1 phase 2
        type: "GET",
        success: function(data) {
          var p_turncanvas = JSON.parse(data);
          // console.log('I am here '+p_turncanvas);
          var src = p_turncanvas[0]['canvas_image'];
          // console.log(p_turncanvas[0]['canvas_image']);
          $('#architect_canvas').val(src);
          var canvas_bg = $('#architect_canvas').val();
          var img = new Image();
          img.onload = function() {
            // this is syncronous
            var f_img = new fabric.Image(img);
            canvas.setBackgroundImage(f_img);
            canvas.renderAll();
          };
          img.src = canvas_bg;

        }
      })
    }

    // below code is for - if no one round 1 not completed then all player status will be ready
    $(document).ready(function() {
      setTimeout(function() {
          var architect_turn = $('#players_turn_id2').val();
          if (architect_turn != 3) {
            $('#sts_waiting').show(); //waiting status
            $('#onlyready3').show(); // architect ready 
            $('#onlyready1').show(); // gardener ready 
            $('#onlyready2').show(); // carpenter ready
            $('#onlyready4').show(); // designer ready
          }
        },
        2000);
    });
    // end 

    $(document).ready(function() {
      setInterval(function() {
        playerturnstatus();
      }, 1000);
    });

    function playerturnstatus() {
      var userType = $('#current_user_type_id2').val();

      return $.ajax({
        url: "playerturn",
        type: "GET",
        success: function(data) {
          var p_turn_status = JSON.parse(data);

          // if player turn is 3 - architect
          if (p_turn_status['players_turn'] == 3 && userType == 3) {
            $('#sts_waiting').hide(); //waiting status
            $('#onlyready3').hide(); // architect ready 
            $('#onlyready1').hide(); // gardener ready 
            $('#onlyready2').hide(); // carpenter ready
            $('#onlyready4').hide(); // designer ready

            $('#thisisyou3').show(); // this is you - architect
            $('#playing3').show(); // architect playing
            $('#onlyready1').show(); // gardener ready 
            $('#onlyready2').show(); // carpenter ready
            $('#onlyready4').show(); // designer ready
          }

          if (p_turn_status['players_turn'] == 3 && userType == '2') {
            $('#sts_waiting').hide(); //waiting status
            $('#onlyready3').hide(); // architect ready 
            $('#onlyready1').hide(); // gardener ready 
            $('#onlyready2').hide(); // carpenter ready
            $('#onlyready4').hide(); // designer ready

            $('#sts_waiting').show();
            $('#thisisyou2').show(); // this is you - carpenter
            $('#playing3').show(); // architect playing
            $('#youarenext2').show(); // carpenter next
            $('#onlyready1').show(); // gardener ready
            $('#onlyready4').show(); // designer ready
          }

          if (p_turn_status['players_turn'] == 3 && userType == '1') {
            $('#sts_waiting').hide(); //waiting status
            $('#onlyready3').hide(); // architect ready 
            $('#onlyready1').hide(); // gardener ready 
            $('#onlyready2').hide(); // carpenter ready
            $('#onlyready4').hide(); // designer ready

            $('#sts_waiting').show();
            $('#playing3').show();
            $('#onlyready2').show();
            $('#thisisyou1').show();
            $('#onlyready1').show();
            $('#onlyready4').show();
          }
          if (p_turn_status['players_turn'] == 3 && userType == '4') {
            $('#sts_waiting').hide(); //waiting status
            $('#onlyready3').hide(); // architect ready 
            $('#onlyready1').hide(); // gardener ready 
            $('#onlyready2').hide(); // carpenter ready
            $('#onlyready4').hide(); // designer ready

            $('#sts_waiting').show();
            $('#playing3').show();
            $('#onlyready2').show();
            $('#thisisyou4').show();
            $('#onlyready1').show();
            $('#onlyready4').show();
          }


          // if player turn is 2 - carpenter
          if (p_turn_status['players_turn'] == 2 && userType == 2) {
            $('#sts_waiting').hide(); //waiting status
            $('#onlyready3').hide(); // architect ready 
            $('#onlyready1').hide(); // gardener ready 
            $('#onlyready2').hide(); // carpenter ready
            $('#onlyready4').hide(); // designer ready

            $('#sts_waiting').hide();
            $('#thisisyou2').hide(); // this is you - carpenter
            $('#playing3').hide(); // architect playing
            $('#youarenext2').hide(); // carpenter next
            $('#onlyready1').hide(); // gardener ready
            $('#onlyready4').hide(); // designer ready

            $('#done3').show(); // architect done
            $('#thisisyou2').show(); // this is you - carpenter
            $('#playing2').show(); // carpenter playing
            $('#onlyready1').show(); // gardener ready 
            $('#onlyready4').show(); // designer ready
          }

          if (p_turn_status['players_turn'] == 2 && userType == '1') {
            $('#sts_waiting').hide(); //waiting status
            $('#onlyready3').hide(); // architect ready 
            $('#onlyready1').hide(); // gardener ready 
            $('#onlyready2').hide(); // carpenter ready
            $('#onlyready4').hide(); // designer ready

            $('#sts_waiting').hide();
            $('#playing3').hide();
            $('#onlyready2').hide();
            $('#thisisyou1').hide();
            $('#onlyready1').hide();
            $('#onlyready4').hide();


            $('#sts_waiting').show();
            $('#done3').show(); // architect done
            $('#playing2').show(); // carpenter playing
            $('#thisisyou1').show(); // this is you - gardener
            $('#youarenext1').show(); // gardener next
            $('#onlyready4').show(); // designer ready
          }

          if (p_turn_status['players_turn'] == 2 && userType == '4') {
            $('#sts_waiting').hide(); //waiting status
            $('#onlyready3').hide(); // architect ready 
            $('#onlyready1').hide(); // gardener ready 
            $('#onlyready2').hide(); // carpenter ready
            $('#onlyready4').hide(); // designer ready

            $('#sts_waiting').hide();
            $('#playing3').hide();
            $('#onlyready2').hide();
            $('#thisisyou4').hide();
            $('#onlyready1').hide();
            $('#onlyready4').hide();

            $('#sts_waiting').show();
            $('#done3').show(); // architect done
            $('#playing2').show(); // carpenter playing
            $('#thisisyou4').show(); // this is you - designer
            $('#onlyready1').show(); // gardener ready 
            $('#onlyready4').show(); // designer ready
          }

          // if player turn is 1 - gardener
          if (p_turn_status['players_turn'] == 1 && userType == 1) {
            $('#sts_waiting').hide(); //waiting status
            $('#onlyready3').hide(); // architect ready 
            $('#onlyready1').hide(); // gardener ready 
            $('#onlyready2').hide(); // carpenter ready
            $('#onlyready4').hide(); // designer ready

            $('#sts_waiting').hide();
            $('#done3').hide(); // architect done
            $('#playing2').hide(); // carpenter playing
            $('#thisisyou1').hide(); // this is you - gardener
            $('#youarenext1').hide(); // gardener next
            $('#onlyready4').hide();

            $('#done3').show(); // architect done
            $('#done2').show(); // carpenter done
            $('#thisisyou1').show(); // this is you - gardener
            $('#playing1').show(); // gardener playing
            $('#onlyready4').show(); // designer ready
          }
          if (p_turn_status['players_turn'] == 1 && userType == 4) {
            $('#sts_waiting').hide(); //waiting status
            $('#onlyready3').hide(); // architect ready 
            $('#onlyready1').hide(); // gardener ready 
            $('#onlyready2').hide(); // carpenter ready
            $('#onlyready4').hide(); // designer ready

            $('#sts_waiting').hide();
            $('#done3').hide(); // architect done
            $('#playing2').hide(); // carpenter playing
            $('#thisisyou4').hide(); // this is you - designer
            $('#onlyready1').hide(); // gardener ready 
            $('#onlyready4').hide(); // designer ready

            $('#sts_waiting').show();
            $('#done3').show(); // architect done
            $('#done2').show(); // carpenter done
            $('#playing1').show(); // gardener playing
            $('#thisisyou4').show(); // this is you - gardener
            $('#youarenext4').show(); // designer ready
          }

          // if player turn is 4 - Designer
          if (p_turn_status['players_turn'] == 4 && userType == 4) {
            $('#sts_waiting').hide(); //waiting status
            $('#onlyready3').hide(); // architect ready 
            $('#onlyready1').hide(); // gardener ready 
            $('#onlyready2').hide(); // carpenter ready
            $('#onlyready4').hide(); // designer ready 

            $('#sts_waiting').hide();
            $('#done3').hide(); // architect done
            $('#done2').hide(); // carpenter done
            $('#playing1').hide(); // gardener playing
            $('#thisisyou4').hide(); // this is you - gardener
            $('#youarenext4').hide();

            $('#done3').show(); // architect done
            $('#done2').show(); // carpenter done
            $('#done1').show(); // gardener done
            $('#thisisyou4').show(); // this is you - designer
            $('#playing4').show(); // designer playing
          }

        }
      })
    }
  </script>


  <script>
    $(document).ready(function() {
      var initial_canvas = $('#round1phase2_canvas_initl').val();
      $.ajax({
        url: "initialround1phase2",
        type: "POST",
        data: {
          canvas_image_initl: initial_canvas,
        },
        success: function(data) {}
      })
    });
  </script>


  <script>
    $('#submit_round1phase2').on('click', function() { // On click of submit_round1phase2 button
      src = canvas.toDataURL('image/png');
      $('#round1phase2_canvas').val(src);
      var current_canvas = $('#round1phase2_canvas').val()
      form1(current_canvas);

    })

    function form1(current_canvas) {
      // alert(current_canvas);
      $('#round1phase2_canvas').val(current_canvas);
      return $.ajax({
        url: "round1phase2",
        type: "POST",
        data: {
          canvas_image: current_canvas,
        },
        success: function(data) {}
      })
    }
  </script>
  <!-- Timer section -->
  <script>
    // $(document).ready(function() { // initially timer and finish button will only for architect
    //   var user_type = $('#current_user_type_id2').val();
    //   if (user_type == 3) {
    //     function countDown(endTime) {
    //       if (endTime > 0) {
    //         $('#showtime').text('Time :' + secondsToTime(endTime));
    //         setTimeout(function() {
    //           countDown(endTime - 1);
    //         }, 1000);
    //       } else {
    //         $('#game_Inprocess').hide();
    //         $('#phase2round1selectscreen').show();
    //       }
    //     }
    //     countDown(180);

    //     function secondsToTime(secs) {
    //       // var hours = Math.floor(secs / (60 * 60));
    //       var divisor_for_minutes = secs % (60 * 60);
    //       var minutes = Math.floor(divisor_for_minutes / 60);
    //       var divisor_for_seconds = divisor_for_minutes % 60;
    //       var seconds = Math.ceil(divisor_for_seconds);
    //       return minutes + ':' + seconds;
    //     }
    //   } else {
    //     $('#showtime').hide();
    //     $('#finish_btn2').hide();
    //   }
    // })
  </script>

  <script>
    // $(document).ready(function() {
    //   $('#next_before_p2r1').on('click', function() {
    //     $('#phase2round1selectscreen').show();
    //     $('#game_Inprocess').hide();
    //     // $('#game_complete').hide();
    //   })
    // })
  </script>

  <script>
    $(document).ready(function() {
      $('#submit_round1phase2').hide(); // added 4-18-2022
      getplayersturn();
      var interval = setInterval(function() {
        var user_type = $('#current_user_type_id2').val();
        var check_playerturn = $('#players_turn_id2').val();
        if (user_type != check_playerturn) {
          getplayersturn();
        }
        if (user_type == check_playerturn) {
          clearcanvas();

          function countDown(endTime) {
            if (endTime > 0) {
              $('#showtime').text('Time' + '\xa0\xa0\xa0' + secondsToTime(endTime));
              setTimeout(function() {
                countDown(endTime - 1);
              }, 1000);
            } else {
              $('#submit_round1phase2').trigger('click');
              // $('#game_Inprocess').hide();
              // $('#phase2round1selectscreen').show();

            }
          }

          function secondsToTime(secs) {
            // var hours = Math.floor(secs / (60 * 60));
            var divisor_for_minutes = secs % (60 * 60);
            var minutes = Math.floor(divisor_for_minutes / 60);
            var divisor_for_seconds = divisor_for_minutes % 60;
            var seconds = Math.ceil(divisor_for_seconds);
            return minutes + ':' + seconds;
          }
          $('#showtime').show();
          $('#submit_round1phase2').show(); // added 4-18-2022
          // $('#finish_btn2').show();   // commentet 4 -18- 2022
          // Start added below code 4-21-2022

          // End added below code 4-21-2022


          countDown(1800);
          turnovercanvas();
          clearInterval(interval);
        }
      }, 5000);
    })
  </script>

  <!-- onclick of finish button trigger submit round 1 button click -->
  <!-- <script>
    $('#finish_btn2').on('click', function() {
      $('#submit_round1phase2').trigger('click');
    });
  </script> -->


  <script>
    /* Drag and Drop code adapted from http://www.html5rocks.com/en/tutorials/dnd/basics/ */

    var architect_canvasimg = $('#architect_canvas').val();
    var canvas = new fabric.Canvas("drawing", {
      // Set the background image  of the Canvas
      backgroundImage: architect_canvasimg
    });

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




    // **************************** Cutout Drag and Drop startted ***********************

    function handleDragStart(e) {
      e.dataTransfer.setData('text/plain', '');
      [].forEach.call(images, function(img) {
        img.classList.remove('img_dragging');
      });
      this.classList.add('img_dragging');
      var postscore = $(this).attr('id'); //  // 2-24-2022 update score on drag start

      var current_user_role = $('#current_user_type_id2').val(); // get current user role 8-6-2022
      var shapename = $(this).attr('shapename'); // get shape name 8-6-2022

      // for architect score work start  7-12-2022
      if (current_user_role == 3) { // if current user is Architect 

        if(shapename != "Large Bed Room" && shapename != "Living with Kitchen" && shapename != "bath with shower" && shapename != "bath with bathtub"){
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
                  $('#hidden_input_score_div').append(new_input);// undo/redo end

          } else if (($('#large_bed_room3').val().length === 0)) {
            $('#large_bed_room3').val(shapename);
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
        if (shapename == "Living with Kitchen") { // if shape name is Living with Kitchen
          if ($('#living_with_kitchen').val().length === 0) {
            $('#living_with_kitchen').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input); // undo/redo end
          }
          else{
            var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;// undo/redo start
            $('#hidden_input_score_div').append(new_input);// undo/redo end
          }
        }

        if (shapename == "bath with shower") { // if shape name is  bath with shower
          if ($('#bath_with_shower').val().length === 0) {
            $('#bath_with_shower').val(shapename);
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

        if (shapename == "bath with bathtub") { // if shape name is  bath with bathtub
          if ($('#bath_with_bathtub').val().length === 0) {
            $('#bath_with_bathtub').val(shapename);
            updatescore(postscore);
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
                  $('#hidden_input_score_div').append(new_input);
          }
          else{
            var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
                  $('#hidden_input_score_div').append(new_input);
          }
        }
      }
      // for architect score work end 7-7-2022

      // for Carpenter score work start 7-7-2022
      if (current_user_role == 2) {
        if(shapename != "Big window" && shapename != "door" && shapename != "sliding doors"){
          var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
        $('#hidden_input_score_div').append(new_input);
        }

        if (shapename == "Big window") { //if shape is Big window
          if ($('#big_window1').val().length === 0) {
            $('#big_window1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);// undo/redo end
          } else if (($('#big_window2').val().length === 0)) {
            $('#big_window2').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
                  $('#hidden_input_score_div').append(new_input);// undo/redo end
          } else if (($('#big_window3').val().length === 0)) {
            $('#big_window3').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
                  $('#hidden_input_score_div').append(new_input);// undo/redo end
          } else if (($('#big_window4').val().length === 0)) {
            $('#big_window4').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);// undo/redo end
          } else if (($('#big_window5').val().length === 0)) {
            $('#big_window5').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);// undo/redo end
          }else{
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);// undo/redo end
          }
        }

        if (shapename == "door") { // if shape name is door
          if ($('#door1').val().length === 0) {
            $('#door1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);// undo/redo end
          } else if ($('#door2').val().length === 0) {
            $('#door2').val(shapename);
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

        if (shapename == "sliding doors") { //if shape is sliding doors
          if ($('#sliding_door1').val().length === 0) {
            $('#sliding_door1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);// undo/redo end
          } else if (($('#sliding_door2').val().length === 0)) {
            $('#sliding_door2').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);// undo/redo end
          } else if (($('#sliding_door3').val().length === 0)) {
            $('#sliding_door3').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);// undo/redo end
          } else if (($('#sliding_door4').val().length === 0)) {
            $('#sliding_door4').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);// undo/redo end
          } else if (($('#sliding_door5').val().length === 0)) {
            $('#sliding_door5').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);// undo/redo end
          }
          else{
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);// undo/redo end
          }
        }
      }

      // for Carpenter score work end 7-7-2022

      // for Gardener score work 7-7-2022
      if (current_user_role == 1) {

        if(shapename != "tree1" && shapename != "tree2" && shapename != "tree3" && shapename != "plant1" && shapename != "plant2" && shapename != "plant3" && shapename != "bush1" && shapename != "bush2" && shapename != "bush3" && shapename != "Family swing" && shapename != "swing" && shapename != "pool" && shapename != "seesaw" && shapename != "slide"){
          var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
        $('#hidden_input_score_div').append(new_input);
        }

        if (shapename == "tree1" || shapename == "tree2" || shapename == "tree3") { // if shape name is tree1/tree2/tree3
          if ($('#tree_1').val().length === 0) {
            $('#tree_1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#tree_2').val().length === 0) {
            $('#tree_2').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#tree_3').val().length === 0) {
            $('#tree_3').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#tree_4').val().length === 0) {
            $('#tree_4').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#tree_5').val().length === 0) {
            $('#tree_5').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#tree_6').val().length === 0) {
            $('#tree_6').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#tree_7').val().length === 0) {
            $('#tree_7').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#tree_8').val().length === 0) {
            $('#tree_8').val(shapename);
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

        if (shapename == "plant1" || shapename == "plant2" || shapename == "plant3") { // if shape name is plant1/plant2/plant3
          if ($('#plant_1').val().length === 0) {
            $('#plant_1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#plant_2').val().length === 0) {
            $('#plant_2').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#plant_3').val().length === 0) {
            $('#plant_3').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#plant_4').val().length === 0) {
            $('#plant_4').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#plant_5').val().length === 0) {
            $('#plant_5').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#plant_6').val().length === 0) {
            $('#plant_6').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#plant_7').val().length === 0) {
            $('#plant_7').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#plant_8').val().length === 0) {
            $('#plant_8').val(shapename);
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

        if (shapename == "bush1" || shapename == "bush2" || shapename == "bush3") { // if shape name is bush1/bush2/bush3
          if ($('#bush_1').val().length === 0) {
            $('#bush_1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#bush_2').val().length === 0) {
            $('#bush_2').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#bush_3').val().length === 0) {
            $('#bush_3').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#bush_4').val().length === 0) {
            $('#bush_4').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#bush_5').val().length === 0) {
            $('#bush_5').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#bush_6').val().length === 0) {
            $('#bush_6').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#bush_7').val().length === 0) {
            $('#bush_7').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#bush_8').val().length === 0) {
            $('#bush_8').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#bush_9').val().length === 0) {
            $('#bush_9').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#bush_10').val().length === 0) {
            $('#bush_10').val(shapename);
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

        if (shapename == "Family swing" || shapename == "swing") { // if shape name is Family swing/swing
          if ($('#swing_1').val().length === 0) {
            $('#swing_1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#swing_2').val().length === 0) {
            $('#swing_2').val(shapename);
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

        if (shapename == "pool") { // if shape name is pool
          if ($('#pool_1').val().length === 0) {
            $('#pool_1').val(shapename);
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

        if (shapename == "seesaw") { // if shape name is seesaw
          if ($('#seesaw_1').val().length === 0) {
            $('#seesaw_1').val(shapename);
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

        if (shapename == "slide") { // if shape name is slide
          if ($('#slide_1').val().length === 0) {
            $('#slide_1').val(shapename);
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

      // Interior Designer score work start 7-7-2022
      if (current_user_role == 4) { // if user role is Interior Designer
        
        if(shapename != "double bed" && shapename != "night stand" && shapename != "single bed" && shapename != "sofa1" && shapename != "sofa2" && shapename != "Big dining"){
          var new_input = `<input type='hidden' class='undo_redo_score' value='0' id='undo_'>`;
        $('#hidden_input_score_div').append(new_input);
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
        if (shapename == "night stand") { // if shape name is night stand
          if ($('#night_stand1').val().length === 0) {
            $('#night_stand1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#night_stand2').val().length === 0) {
            $('#night_stand2').val(shapename);
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
          if ($('#single_bed1').val().length === 0) {
            $('#single_bed1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#single_bed2').val().length === 0) {
            $('#single_bed2').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#single_bed3').val().length === 0) {
            $('#single_bed3').val(shapename);
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

        if (shapename == "sofa1" || shapename == "sofa2") { // if shape name is sofa1/sofa2
          if ($('#sofa_1').val().length === 0) {
            $('#sofa_1').val(shapename);
            updatescore(postscore);
            // undo/redo start
            var new_input = `<input type='hidden' class='undo_redo_score' value='${postscore}' id='undo_'>`;
            $('#hidden_input_score_div').append(new_input);
            // undo/redo end
          } else if ($('#sofa_2').val().length === 0) {
            $('#sofa_2').val(shapename);
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

        if (shapename == "Big dining") { // if shape name is Big dining
          if ($('#big_dining_1').val().length === 0) {
            $('#big_dining_1').val(shapename);
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
      return false;
    }

    function handleDragEnter(e) {
      this.classList.add('over'); // this / e.target is the current hover target.
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
        //scaleX: setImageWidth/img.naturalWidth,        
        //scaleY: setImageHeight/img.naturalHeight,
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
    //  ******************************* Cutout Drag and Drop Code End **********************
  </script>

  <script>
    function clearcanvas() {
      canvas.clear();
    }
  </script>

  <!-- save canvas as image Phase 1 Round 2 -->
  <script>
    function savecanvas() {
      src = canvas.toDataURL('image/png');
      $('#round1phase2_canvas').val(src);
    }

    // update scores into existing 
    function updatescore(score) {
      $('#updatescore').val(score);
      var newscore = $('#updatescore').val();

      return $.ajax({
        url: "updatescoreStep2",
        type: "POST",
        data: {
          score_update: newscore,
        },
        success: function(data) {}
      })
    }

    // delete/ undo scores into existing 13-July-2022
    function undo_from_existscore(undo_from_exist_score) { // delete/undo given score from existing score
      return $.ajax({
        url: "deletescoreStep2",
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
        url: "redoscoreStep2",
        type: "POST",
        data: {
          score_redo: redo_into_exist_score,
        },
        success: function(data) {}
      })
    }

    // function getscore() {
    //   return $.ajax({
    //     url: "getscoreStep2",
    //     type: "GET",
    //     success: function(data) {
    //       var p_score = JSON.parse(data);
    //       $('#get_your_score').text(p_score);
    //     }
    //   })
    // }

    // function topscore() {
    //   return $.ajax({
    //     url: "topscoreStep2",
    //     type: "GET",
    //     success: function(data) {
    //       var p_topscore = JSON.parse(data); //JSON.stringify(data);
    //       console.log(p_topscore);
    //       $.each(p_topscore, function(k, v) {
    //         $(`<div class="row">
    //         <div class="col-md-6 offset-md-3 arcp1r1txt"><span>${v['score']}</span></div>
    //         <div class="col-md-3"></div>
    //       </div>`).appendTo($('#topscore_id'));
    //       })
    //     }
    //   })
    // }
  </script>

</body>