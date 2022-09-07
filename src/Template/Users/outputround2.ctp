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
    min-width: 150px;
    top: -80px;
    left: 50%;
    transform: translate(-50%, 0);
    padding: 10px 20px;
    color: #444444;
    background-color: #666;
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
    /* border: #c0c0c0 1px dotted; */
    padding: 5px 20px 5px 5px;
    display: block;
    z-index: 100;
    /* background: url(../images/status-info.png) #f0f0f0 no-repeat 100% 5%; */
    /* left: 0px; */
    margin: 10px;
    width: 250px;
    position: absolute;
    top: 20px;
    text-decoration: none;
    right: 15px;
    text-align: center;
  }

  /* End job description */

  .Content {
    height: 450px;
    overflow: auto;
    width:-webkit-fill-available;

  }
</style>

<head>
  <?php echo $this->Html->script('fabric.min'); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>

<body>
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
     <h1> Round -2 Phase -2 Output</h1>
      </div>

      <?php $usertypeid = $userType[0]['id']; ?>
      <div class="col-md-2">
      </div>
      <div class="col-md-1" style="padding-top: 10px;">
      </div>
    </div>

    <div class="row">
      <!-- <div class="col-md-2">
        <div class="row">
          <div class="col-sm-12" style="background-color: white;box-shadow: 0px 6px 10px 0px #c8d1d9;border-bottom: 1px solid #e3eaf1;">
            <img src="<?= $p2_r1_result[0]['canvas_image']; ?>" width="290" height="300"/>
          </div>
        </div>
      </div> -->
      <div class="col-md-2" style="border:1px solid;background-color:white;height: fit-content;">
      </div>
      <div class="col-md-9">&nbsp;
      <div id="outercanvas" style="height: 570px;position: relative;">
        <canvas id="drawing_1" width="1000" height="570" style="position:absolute;top:0;"></canvas>
          <canvas id="drawing_2" width="1000" ; height="570" ; style="position:absolute;"></canvas>
          <canvas id="drawing_3" width="1000" height="570" style="position:absolute;"></canvas>
          <canvas id="drawing_4" width="1000" height="570" style="position:absolute;border: 1px solid gray;"></canvas>
        </div>
      </div>

      <div class="col-md-1">
       
      </div>
    </div>
<input type="hidden" id="architect_canvas" value="<?= (sizeof($r1_p2_Architect_result)> 0)?$r1_p2_Architect_result[0]['canvas_image']:''; ; ?>"/>
<input type="hidden" id="carpenter_canvas" value="<?= (sizeof($r1_p2_Carpenter_result)> 0)?$r1_p2_Carpenter_result[0]['canvas_image']:''; ?>"/>
<input type="hidden" id="gardener_canvas" value="<?= (sizeof($r1_p2_Gardener_result)> 0)?$r1_p2_Gardener_result[0]['canvas_image']:''; ?>"/>
<input type="hidden" id="designer_canvas" value="<?= (sizeof($r1_p2_Designer_result)> 0)? $r1_p2_Designer_result[0]['canvas_image']:''; ?>"/>

<br>
    <div class="row">
    <div class="col-md-2 offset-md-4" style="padding: 0px;">
        <div style="background-color: #009B91;text-align: center;color: white;font-size: medium;font-weight: bold;">
        <p>Your Group Score</p>
        <p id="group_scorer2"><?php print_r($totalscorer2p2[0]->sum);?></p>
      </div>
      </div>
      <div class="col-md-2" style="padding: 0px;">
        <div style="background-color: #009B91;text-align: center;color: white;font-size: medium;font-weight: bold;">
        <p>Max Score</p>
      <p id="max-score-id2">6400</p>
      </div>
      </div>
    <div class="col-md-2 offset-md-1">
    <div class="btn-primary tooltip2" value="NEXT" id="output-finish-btn" style="font-weight:bold;font-size:20px;border-radius:5px;padding:10px;">
                Finish
            <div class="bottom">
              <p style="color: white;">VIEW YOUR SCORE</p>
            </div>
          </div>
    <!-- <button class="btn btn-primary" value="NEXT" id="output-finish-btn" style="width: 100px;">FINISH</button> -->
    </div>
    </div>
  </div>
  <div class="container-fluid" id="score_screen" style="display:none;">
    <div class="row" style="background-color: white;box-shadow: 0px 6px 10px 0px #c8d1d9;border-bottom: 1px solid #e3eaf1;">
      <div class="col-md-5" style="align-self: flex-end;">
        <img src="<?php echo $this->request->webroot; ?>img/username.png" width="50">
        <span class="usrname">
          <?php print_r($userType[0]['type_name']); ?>
        </span>
      </div>
      <div class="col-md-6"></div>
      <!-- <div class="col-md-1" style="border-left: 1px solid #8080808c;"></div> -->
      <div class="col-md-1" style="padding-top: 10px;">
        <?php
        // echo $this->Html->link(
        //   'EXIT',
        //   ['controller' => 'Users', 'action' => 'logout'],
        //   ['class' => 'btn btn-primary']

        // ); 
        ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div id="scoreborad_p1r1r2" style="background-color: #009B91;width: -webkit-fill-available;">
          <div class="row">
            <div class="col-md-5 offset-md-1 arcp1r1txt"><span style="font-size: larger;font-weight: bold;">ROUND 1</span></div>
            <div class="col-md-5 offset-md-1 arcp1r1txt"><span style="font-size: larger;font-weight: bold;">ROUND 2</span></div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-5 offset-md-1 arcp1r1txt">
              <span>YOUR SCORE : </span>
              <span id="totalgroupscorer1"><?php print_r($totalscorer1p2[0]->sum);?></span><br/>

            <span>MAX SCORE : </span>
            <span id="max_score_r1">6000</span>

            </div>
            <div class="col-md-5 offset-md-1 arcp1r1txt">
            <span>YOUR SCORE : </span>
            <span id="totalgroupscorer2"><?php print_r($totalscorer2p2[0]->sum);?></span><br/>
            
            <span>MAX SCORE : </span>
            <span id="max_score_r2">6400</span>
            
          </div>
          </div>
          <br/><br/>
          <div class="row">
            <div class="col-md-5 offset-md-1 arcp1r1txt"><span style="font-size: larger;font-weight: bold;">USERS: </span></div>
          </div>
          <?php
          foreach($userType_detail as $playernames){ ?>
          <div class="row">
            <div class="col-md-10 offset-md-1 arcp1r1txt">
              <span style="font-size: x-large;
    font-weight: bold;"><?php print_r($playernames['type_name']);?> -&nbsp;&nbsp; </span>
               <?php  foreach($playernames['players_name'] as $players){ ?>
              <span><?php print_r($players['user']['name']); ?></span>
              <?php }?>
            </div>
          </div>
          <?php }?>   
          <br><br>
      
        </div>
      </div>
      <!-- <div class="col-md-3"> </div> -->
    </div>

    <div class="row">
            <div class="col-md-12" style="text-align:center;">
        <!-- <a class="btn btn-primary" style="color: #009B91;
          background-color: white;position: fixed;
          bottom: 10px;
          border-radius: 20px; box-shadow: 0px 4px 5px 0px rgb(73 108 79 / 43%)" href="https://forms.office.com/Pages/ResponsePage.aspx?id=M8Rk7OgevU2Dejn1bHzc6tgaFgmCrmBNo4NBFTTSyV1UN1FLNlUzNEFQUjM0UUhLM0RBUUpUMDlKWiQlQCN0PWcu">
        PROCEED TO SURVEY
        </a> -->
        <!-- <a href="http://google.com" onclick="window.open('http://yahoo.com');">Click to open Google and Yahoo</a> -->

        <?php
                echo $this->Html->link(
                    'PROCEED TO SURVEY',
                    ['controller' => 'Users', 'action' => 'logout'],
                    ['class' => 'btn btn-primary','style'=>'color: white;margin-top: 120px;
         border-radius: 20px; box-shadow: 0px 4px 5px 0px rgb(73 108 79 / 43%)']
                );
                ?>
            </div>
          </div><br/>

          
  </div>
  

  <script>
    $(document).on("click", "a", function(){
  // alert("It works!");
  window.open('https://forms.office.com/Pages/ResponsePage.aspx?id=M8Rk7OgevU2Dejn1bHzc6tgaFgmCrmBNo4NBFTTSyV1UN1FLNlUzNEFQUjM0UUhLM0RBUUpUMDlKWiQlQCN0PWcu');
});

        $(document).ready(function() {
var architect_img = $('#architect_canvas').val();
var carpenter_img = $('#carpenter_canvas').val();
var gardener_img = $('#gardener_canvas').val();
 var designer_img = $('#designer_canvas').val();

    //   var canvas4 = new fabric.Canvas('drawing', {
    //   isDrawingMode: false,
    //   backgroundImage: architect_img,
    // });
    var canvas4 = new fabric.Canvas('drawing_1', {
      isDrawingMode: false,
      backgroundImage: architect_img,
    });
    var ctx4 = canvas4.getContext("2d");
    ctx4.globalAlpha = 0.5;

    var canvas3 = new fabric.Canvas('drawing_2', {
      isDrawingMode: false,
      backgroundImage: carpenter_img,
    });

    var ctx3 = canvas3.getContext("2d");
    ctx3.globalAlpha = 0.5;


    var canvas2 = new fabric.Canvas('drawing_3', {
      isDrawingMode: false,
      backgroundImage: gardener_img,
    });
    var ctx2 = canvas2.getContext("2d");
    ctx2.globalAlpha = 0.5;


    var canvas = new fabric.Canvas('drawing_4', { // current is drawing_4
      isDrawingMode: false,
      backgroundImage: designer_img,
    });
    var ctx = canvas.getContext("2d");
    ctx.globalAlpha = 1;

// score should be equal to max score
    var group_score =  parseInt($('#group_scorer2').text());
 var max_score =  parseInt($('#max-score-id2').text());

 if(group_score > max_score){
 $('#group_scorer2').text(max_score);
 }
//  score should be equal to max score


var totalgroupscorer1 = parseInt($('#totalgroupscorer1').text());
var max_score_r1 =  parseInt($('#max_score_r1').text());

var totalgroupscorer2 = parseInt($('#totalgroupscorer2').text());
var max_score_r2 =  parseInt($('#max_score_r2').text());
            
if(totalgroupscorer1 > max_score_r1){
 $('#totalgroupscorer1').text(max_score_r1);
 }

 if(totalgroupscorer2 > max_score_r2){
 $('#totalgroupscorer2').text(max_score_r2);
 }
            
            

    $('#output-finish-btn').on('click', function(){
      $('#outputcanvas').hide();
      // getscore4();
      // topscore4();
      $('#score_screen').show();
    })

    // function getscore4() {
    //   return $.ajax({
    //     url: "getscoreStep4",
    //     type: "GET",
    //     success: function(data) {
    //       var p_score = JSON.parse(data);
    //       // alert(p_score);
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


});

    </script>

</body>

