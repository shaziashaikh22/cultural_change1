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
    background-color: #FFFFFF;
  }

  canvas {
    width: 100% !important;
    height: 100% !important;
  }

  .tooltip {
    position: absolute;
    opacity: 0;
    padding: 10px;
    background: #6ECAC4;
    border-radius: 5px;
    -webkit-transition: all 0.2s ease-in;
    -moz-transition: all 0.2s ease-in;
    transition: all 0.2s ease-in;
    top: -10px;
    left: -10px;
  }

  a:hover span {
    opacity: 1;
  }

  .shapesdropdown:hover {
    background-color: lightseagreen;
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
  .red {
    background: #d1c7c7;
  }
</style>

<head>
  <?php echo $this->Html->script('fabric.min');
  //  echo $this->Html->script('fabric.brushes.min');
  ?>

  <!-- <script src="https://tennisonchan.github.io/fabric-brush/bower_components/fabric-brush/dist/fabric-brush.min.js"></script> -->

</head>

<body>

  <input type="hidden" id="current_user_type_id" value="<?= $userType[0]['id']; ?>">
  <input type="hidden" id="players_turn_id" value="">

  <input type="hidden" id="selectedPen" value="">
  <input type="hidden" id="changepencolor" value="">




  <div class="container-fluid" id="round1phase1playscreen" style="display: block;">
    <input type="hidden" id="hiddenemail" value="" name="hiddenemail_val" />
    <div class="row" style="background-color: white;border: 1px solid black;">
      <div class="col-md-3" style="align-self: flex-end;">
        <img src="<?php echo $this->request->webroot; ?>img/username.png" width="50">
        <span class="usrname">
          <?= $userType[0]['type_name']; ?>
        </span>
      </div>
      <div class="col-md-6" style="align-self: flex-end;">
        <img src="<?php echo $this->request->webroot; ?>img/r1p1-planning.png" style="max-width: 100%;max-height: 100%;">
      </div>
      <?php $usertypeid = $userType[0]['id']; ?>
      <div class="col-md-2" style="align-self: flex-end;">
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
      <div class="col-md-1" style="text-align: center;padding-top:7px;">
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
      <div class="col-md-1">
      </div>
      <div class="col-md-10">
        <input type="hidden" id="architect_canvas" value="">
        <div> &nbsp;
          <div>
            Brush size: <input id="brush_size" type="range" min="1" max="100" step="1" value="0.8">
          </div>
          <div id="outercanvas" style="height: 570px;">
            <canvas id="drawing" width="1000" height="570" style="border: 1px solid gray"></canvas>
          </div>
        </div>
      </div>


      <div class="col-md-1" style="border: 1px solid;background-color:white;text-align:center;">
        <!-- <input id="color" type="color"> -->
        <div class="row foo" style="height: 55px;">
          <div class="col-sm-12" style="padding-top:15px;padding-bottom:20px;">
            <input id="color" type="color" value="#0000FF" style="height:35px;width:35px; border: 3px solid black; border-radius: 5px;">
          </div>
        </div>


        <div class="row foo" style="height: 55px;">
          <div class="col-sm-12"><img onclick="drawpen()" src="<?php echo $this->request->webroot; ?>img/brush_pen_new30.png" style="padding-top:15px;padding-bottom:20px;"></div>
        </div>

        <div class="row foo" style="height: 55px;">
          <div class="col-sm-12"><img onclick="addText()" src="<?php echo $this->request->webroot; ?>img/text_new30.png" style="padding-top:15px;padding-bottom:20px;"></div>
        </div>
        <div class="row foo" style="height: 55px;">
          <div class="col-sm-12"><img id="brush" onclick="draweraser()" src="<?php echo $this->request->webroot; ?>img/eraser.png" style="padding-top:15px;padding-bottom:20px;"></div>
        </div>
        <div class="row foo" style="height: 55px;">
          <div class="col-sm-12">
            <div class="wrapper"> <a href="javascript:void(0);" class="show">
                <img onclick="drawcle()" src="<?php echo $this->request->webroot; ?>img/circle.png" style="padding-top:15px;padding-bottom:20px;">
                <span class="tooltip">

                  <div class="row shapesdropdown">
                    <div class="col-sm-12">
                      <img onclick="drawLine()" src="<?php echo $this->request->webroot; ?>img/line.png">
                    </div>
                  </div>
                  <div class="row shapesdropdown">
                    <div class="col-sm-12">
                      <img onclick="drawrec()" src="<?php echo $this->request->webroot; ?>img/square.png" style="padding-top:5px;">
                    </div>
                  </div>
                  <div class="row shapesdropdown">
                    <div class="col-sm-12">
                      <img onclick="drawTriangle()" src="<?php echo $this->request->webroot; ?>img/triangle.png" style="padding-top:10px;">
                    </div>
                  </div>
                  <div class="row shapesdropdown">
                    <div class="col-sm-12">
                      <img onclick="drawcle()" src="<?php echo $this->request->webroot; ?>img/circle.png" style="padding-top:10px;">
                    </div>
                  </div>
                </span></a>
            </div>
          </div>
        </div>
        <div class="row foo" style="height: 55px;">
          <div class="col-sm-12">
            <a href="javascript:redo();">
              <img src="<?php echo $this->request->webroot; ?>img/redo.png" style="padding-top:15px;">
            </a>
          </div>
        </div>
        <div class="row foo" style="height: 55px;">
          <div class="col-sm-12">
            <a href="javascript:undo();"><img src="<?php echo $this->request->webroot; ?>img/undo.png" style="padding-top:15px;"></a>
          </div>
        </div>

      </div>

    </div>

    <?php
    //  print_r($alluserType);
    ?>
    <div class="row" style="padding-top: 20px;text-align:center;">

      <div class="col-md-2" style="border: 1px solid;">
        <span id="sts_waiting" style="display: none;color: #009B91;font-size: medium;font-weight: bold;">
          You can play around with the whiteboard while waiting !!</span>
        <button class="btn btn-primary time-txt" id="showtime" style="pointer-events: none;color:black;background: white;box-shadow: none;"></button>
      </div>
      <div class="col-md-8">
        <div class="row">
          <?php foreach ($alluserType as $alluser_type) { ?>
            <div class="col-md-3" style="border: 1px solid grey;">
              <span style="color: #009B91;font-size: medium;font-weight: bold;"><?= $alluser_type['type_name']; ?></span>
              <span id="thisisyou<?= $alluser_type['id']; ?>" style="display: none;color: #009B91;font-size: medium;font-weight: bold;"> : This is you!</span><br>
              <span id="playing<?= $alluser_type['id']; ?>" style="display: none;color: #009B91;font-size: medium;font-weight: bold;">Status : Playing</span>
              <span id="onlyready<?= $alluser_type['id']; ?>" style="display: none;color: #009B91;font-size: medium;font-weight: bold;">Status : Ready</span>
              <span id="youarenext<?= $alluser_type['id']; ?>" style="display: none;color: #009B91;font-size: medium;font-weight: bold;">Status : You are next</span>
              <span id="done<?= $alluser_type['id']; ?>" style="display: none;color: #009B91;font-size: medium;font-weight: bold;">Status : Done</span>
            </div>
          <?php } ?>
        </div>
      </div>

      <div class="col-md-1" style="align-content: center;display: flex;flex-wrap: wrap;">
        <button class="btn btn-primary time-txt" id="finish_btn" style="max-width: 100%;max-height: 100%;">Finish</button>
      </div>
      <!-- <div class="col-md-1" style="border: 1px solid grey;">
        <img onClick="clearcanvas()" src="<?php echo $this->request->webroot; ?>img/delete1_new35.png" style="padding-top:10px;">
      </div> -->
    </div>
  </div>
  <!-- screen to select round 2 -->
  <div class="container-fluid" id="round2selectscreen" style="display: none;">
    <div class="row" style="background-color: white;border: 1px solid black;">
      <div class="col-md-5" style="align-self: flex-end;">
        <img src="<?php echo $this->request->webroot; ?>img/username.png" width="50">
        <span class="usrname">
          <?= $userType[0]['type_name']; ?>
        </span>
      </div>
      <div class="col-md-5" style="align-self: flex-end;">
      </div>
      <div class="col-md-1">
      </div>
      <div class="col-md-1" style="text-align: center;padding-top:7px;">
        <?php
        echo $this->Html->link(
          'Logout',
          ['controller' => 'Users', 'action' => 'logout'],
          ['class' => 'btn btn-primary']

        ); ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-5" style="padding: 0px;"></div>
      <div class="col-md-3"><br><br><br><br><br><br><br><br>
        <div class="row">
          <div class="col-sm-12">
            <span class="btn btn-primary" style="box-shadow: none;border-radius: 5px 15px 5px 5px;font-size: 20px;padding: 35px;pointer-events: none;">
              PROCEED TO <br>THE JOB DESCRIPTION <br>
              PHASE - 2
              <!-- <br> -->
              <!-- <b style="font-size:15px;">Play with the coutout</b> -->
            </span>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-12" style="text-align: center;">
            <?= $this->Form->create('', ['type' => 'POST', 'url' => ['action' => 'round1phase1']]) ?>
            <input type="hidden" name="canvas_image" value="" id="get_canvasimg" />
            <input type="hidden" name="score" value="" />
            <button class="btn btn-primary" type="submit" id="go_toround1phase2" name="go_toround1phase2" onclick="savecanvas();" value="OK" style="width: 100px;">OK</button>
            <?= $this->Form->end(); ?>
          </div>
        </div>
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>


  <script>
    $(document).ready(function() {
      setInterval(function() {
        playerturnstatus();
      }, 1000);


      $('.foo').click(function() {
        $(this).toggleClass('red')
          .siblings().removeClass('red')
      });
    });

    function playerturnstatus() {
      var userType = $('#current_user_type_id').val();

      return $.ajax({
        url: "playerturn",
        type: "GET",
        success: function(data) {
          var p_turn_status = JSON.parse(data);

          // if player turn is 3 - architect
          // spans.text('');
          // $("#thisisyou3").load(location.href + " #thisisyou3"); 

          if (p_turn_status['players_turn'] == 3 && userType == 3) {

            $('#thisisyou3').show(); // this is you - architect
            $('#playing3').show(); // architect playing
            $('#onlyready1').show(); // gardener ready 
            $('#onlyready2').show(); // carpenter ready
            $('#onlyready4').show(); // designer ready
          }

          if (p_turn_status['players_turn'] == 3 && userType == '2') {
            $('#sts_waiting').show();
            $('#thisisyou2').show(); // this is you - carpenter
            $('#playing3').show(); // architect playing
            $('#youarenext2').show(); // carpenter next
            $('#onlyready1').show(); // gardener ready
            $('#onlyready4').show(); // designer ready
          }

          if (p_turn_status['players_turn'] == 3 && userType == '1') {
            $('#sts_waiting').show();
            $('#playing3').show();
            $('#onlyready2').show();
            $('#thisisyou1').show();
            $('#onlyready1').show();
            $('#onlyready4').show();
          }
          if (p_turn_status['players_turn'] == 3 && userType == '4') {
            $('#sts_waiting').show();
            $('#playing3').show();
            $('#onlyready2').show();
            $('#thisisyou4').show();
            $('#onlyready1').show();
            $('#onlyready4').show();
          }


          // if player turn is 2 - carpenter
          if (p_turn_status['players_turn'] == 2 && userType == 2) {
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


  <!-- Timer section -->
  <!-- <script>
      $(document).ready(function() { // initially timer will only for architect

        var user_type = $('#current_user_type_id').val();

        function secondsToTime(secs) {
          // var hours = Math.floor(secs / (60 * 60));
          var divisor_for_minutes = secs % (60 * 60);
          var minutes = Math.floor(divisor_for_minutes / 60);
          var divisor_for_seconds = divisor_for_minutes % 60;
          var seconds = Math.ceil(divisor_for_seconds);
          return minutes + ':' + seconds;
        }
        if (user_type == 3) {
          function countDown(endTime) {
            if (endTime > 0) {
              $('#showtime').text('Time ' + secondsToTime(endTime));
              setTimeout(function() {
                countDown(endTime - 1);
              }, 1000);
            } else {
              $('#round1phase1playscreen').hide();
              $('#round2selectscreen').show();
            }
          }
          countDown(180);
        } else {
          $('#showtime').hide();
          $('#finish_btn').hide();
          // $('#showtime').text('Time :' + '50'); // for others time will be fixed if there is no turn
        }
      })
    </script> -->

  <script>
    $(document).ready(function() {
      getplayersturn();
      var interval = setInterval(function() {
        var user_type = $('#current_user_type_id').val();
        var check_playerturn = $('#players_turn_id').val();
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
              $('#round1phase1playscreen').hide();
              $('#round2selectscreen').show();
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
          $('#finish_btn').show();
          countDown(180);
          turnovercanvas();
          clearInterval(interval);

        }
      }, 5000);

    })


    function getplayersturn() {
      return $.ajax({
        url: "getplayersturn",
        type: "GET",
        success: function(data) {
          var p_turn = JSON.parse(data);
          $('#players_turn_id').val(p_turn['players_turn']);
        }
      })
    }


    // var architect_canvasimg ;
    // = $('#architect_canvas').val();

    function turnovercanvas() {
      return $.ajax({
        url: "turnOverPlayersCanvas",
        type: "GET",
        success: function(data) {
          var p_turncanvas = JSON.parse(data);
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
  </script>

  <!-- onclick of finish button trigger submit round 1 button click -->
  <script>
    $('#finish_btn').on('click', function() {
      $('#go_toround1phase2').trigger('click');
    });
  </script>


  <script>
    // 1-13-2022 commented brush size code

    var changedColor = $('#color').val();
    var newcolor;
    $('#color').on('change', function() {
      newcolor = $(this).val();
      changedColor = newcolor;
      if (mode == "Pen") {
        canvas.freeDrawingBrush.color = changedColor;
      }
    });

    // alert(newcolor);

    var architect_canvasimg = $('#architect_canvas').val();

    // alert(architect_canvasimg);
    // var canvas = window._canvas = new fabric.Canvas('c');

    var canvas = new fabric.Canvas('drawing', {
      // selection: false,
      isDrawingMode: false,
      backgroundImage: architect_canvasimg,
      // preserveObjectStacking: false 
    });
    // canvas.selection = false
    // fabric.Object.prototype.selectable = false;// this line will make unselectable all objects 6-14-2022

    //Prevent Fabric js Objects from scaling out of the canvas boundary start 4-26-2022
    canvas.on('object:moving', function(e) {
      var obj = e.target;

      //       canvas.getObjects().forEach(o => {
      //   console.log(o.id);
      // });

      canvas.bringForward(obj); // line added for (object should not be go back at eraser) 6-23-2022
      canvas.renderAll(); // line added for (object should not be go back at eraser) 6-23-2022
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
    }); // end

    var isRedoing = false;
    var h = [];
    canvas.on('object:added', function(e) {
      if (!isRedoing) {
        h = [];
      }
      isRedoing = false;
    });

    function undo() {
      if (canvas._objects.length > 0) {
        h.push(canvas._objects.pop());
        canvas.renderAll();
      }
    }

    function redo() {
      if (h.length > 0) {
        isRedoing = true;
        canvas.add(h.pop());
      }
    }

    
    var oldbrush_size = parseInt($('#brush_size').val());
    var newbrush_size;
    $('#brush_size').on('change', function() {
      newbrush_size = parseInt($(this).val());
      canvas.freeDrawingBrush.width = newbrush_size;
      oldbrush_size = newbrush_size;
    });

    var mode = "";

    function drawpen() {
      removeEvent();
      mode = "Pen";
      // alert(mode);
      canvas.isDrawingMode = true;
      canvas.freeDrawingBrush.width = oldbrush_size;
      canvas.freeDrawingBrush.color = changedColor;

      canvas.on('path:created', function(e) {
        e.path.set({
          selectable: false,
          id: 'drawpen'
        });
        canvas.renderAll();
      });
    }

    function draweraser() {
      removeEvent();
      mode = "Eraser";
      // canvas.freeDrawingBrush.width = oldbrush_size; //20
      // canvas.isDrawingMode = true;
      // canvas.freeDrawingBrush.color = '#FFFFFF'; // '#fcfcfc'; 

      canvas.on('path:created', function(e) {
        e.path.set({
          selectable: false,
          // globalCompositeOperation:"destination-out",
        });
        canvas.renderAll();
      });
    }

    canvas.on('mouse:dblclick', function(e) {
      if (mode == "Eraser") {
        var delete_obj = e.target;
        //  delete_obj.remove();
        canvas.remove(delete_obj);
        //  canvas.renderAll();
      }
    });
    //       canvas.on('mouse:up', (options)=>{ //dblclick
    //   // console.log('on canvas mouse dblclick', options.target ? options.target.type : '');
    //   if(mode == "Eraser"){
    //        var delete_obj = options.target;
    //       //  delete_obj.remove();
    //        canvas.remove(delete_obj);
    //       //  canvas.renderAll();

    //   }
    // });

    function clearcanvas() {
      canvas.clear();
    }

    // Rectangle shape
    var Rectangle = (function() {
      function Rectangle(canvas) {
        var inst = this;
        this.canvas = canvas;
        this.className = 'Rectangle';
        this.isDrawing = false;
        mode = "rectangle";
        this.bindEvents();
      }

      Rectangle.prototype.bindEvents = function() {
        var inst = this;
        inst.canvas.on('mouse:down', function(o) {
          inst.onMouseDown(o);
        });
        inst.canvas.on('mouse:move', function(o) {
          inst.onMouseMove(o);
        });
        inst.canvas.on('mouse:up', function(o) {
          inst.onMouseUp(o);
        });
        inst.canvas.on('object:moving', function(o) {
          inst.disable();
        });

      }
      Rectangle.prototype.onMouseUp = function(o) {
        var inst = this;
        inst.disable();
      };


      Rectangle.prototype.onMouseMove = function(o) {
        var inst = this;

        if (!inst.isEnable()) {
          return;
        }

        var pointer = inst.canvas.getPointer(o.e);
        var activeObj = inst.canvas.getActiveObject();

        activeObj.stroke = changedColor,
          activeObj.strokeWidth = 2;
        activeObj.fill = 'transparent'; //changedColor
        if (origX > pointer.x) {
          activeObj.set({
            left: Math.abs(pointer.x)
          });
        }
        if (origY > pointer.y) {
          activeObj.set({
            top: Math.abs(pointer.y)
          });
        }

        activeObj.set({
          width: Math.abs(origX - pointer.x)
        });
        activeObj.set({
          height: Math.abs(origY - pointer.y)
        });

        activeObj.setCoords();
        inst.canvas.renderAll();
      };

      Rectangle.prototype.onMouseDown = function(o) {
        var inst = this;
        inst.enable();

        var pointer = inst.canvas.getPointer(o.e);
        origX = pointer.x;
        origY = pointer.y;

        var rect = new fabric.Rect({
          left: origX,
          top: origY,
          originX: 'left',
          originY: 'top',
          width: pointer.x - origX,
          height: pointer.y - origY,
          angle: 0,
          transparentCorners: false,
          hasBorders: false,
          hasControls: false,
          // selectable: false
        });
        inst.canvas.add(rect).setActiveObject(rect);
        // fabric.Object.prototype.selectable = true; // this line will make unselectable all objects 6-14-2022
      };

      Rectangle.prototype.isEnable = function() {
        return this.isDrawing;
      }

      Rectangle.prototype.enable = function() {
        this.isDrawing = true;
      }

      Rectangle.prototype.disable = function() {
        this.isDrawing = false;
      }

      return Rectangle;
    }());



    // triangle shape
    var Triangle = (function() {
      function Triangle(canvas) {
        var inst = this;
        this.canvas = canvas;
        this.className = 'Triangle';
        this.isDrawing = false;
        mode = "triangle";

        this.bindEvents();
      }

      Triangle.prototype.bindEvents = function() {
        var inst = this;
        inst.canvas.on('mouse:down', function(o) {
          inst.onMouseDown(o);
        });
        inst.canvas.on('mouse:move', function(o) {
          inst.onMouseMove(o);
        });
        inst.canvas.on('mouse:up', function(o) {
          inst.onMouseUp(o);
        });
        inst.canvas.on('object:moving', function(o) {
          inst.disable();
        });

      }
      Triangle.prototype.onMouseUp = function(o) {
        var inst = this;
        inst.disable();
      };
      Triangle.prototype.onMouseMove = function(o) {
        var inst = this;

        if (!inst.isEnable()) {
          return;
        }

        var pointer = inst.canvas.getPointer(o.e);
        var activeObj = inst.canvas.getActiveObject();

        activeObj.stroke = changedColor,
          activeObj.strokeWidth = 2;
        activeObj.fill = 'transparent';
        // activeObj.fill = changedColor //'transparent';

        if (origX > pointer.x) {
          activeObj.set({
            left: Math.abs(pointer.x)
          });
        }
        if (origY > pointer.y) {
          activeObj.set({
            top: Math.abs(pointer.y)
          });
        }

        activeObj.set({
          width: Math.abs(origX - pointer.x)
        });
        activeObj.set({
          height: Math.abs(origY - pointer.y)
        });

        activeObj.setCoords();
        inst.canvas.renderAll();

      };

      Triangle.prototype.onMouseDown = function(o) {
        var inst = this;
        inst.enable();

        var pointer = inst.canvas.getPointer(o.e);
        origX = pointer.x;
        origY = pointer.y;

        var tri = new fabric.Triangle({
          left: pointer.x,
          top: pointer.y,
          // width:2,height:2,
          // strokeWidth: 2,
          // stroke: 'red',
          // fill: 'transparent',
          originX: 'center',
          angle: 0,

          // left: origX,
          // top: origY,
          // originX: 'left',
          // originY: 'top',
          width: pointer.x - origX,
          height: pointer.y - origY,
          // angle: 0,
          transparentCorners: false,
          hasBorders: false,
          hasControls: false
        });

        inst.canvas.add(tri).setActiveObject(tri);
      };

      Triangle.prototype.isEnable = function() {
        return this.isDrawing;
      }

      Triangle.prototype.enable = function() {
        this.isDrawing = true;
      }

      Triangle.prototype.disable = function() {
        this.isDrawing = false;
      }

      return Triangle;
    }());

    var drawCircle = (function() {
      function drawCircle(canvas) {
        this.canvas = canvas;
        this.className = 'Circle';
        this.isDrawing = false;
        mode = "circle";

        this.bindEvents();
      }

      drawCircle.prototype.bindEvents = function() {
        var inst = this;
        inst.canvas.on('mouse:down', function(o) {
          inst.onMouseDown(o);
        });
        inst.canvas.on('mouse:move', function(o) {
          inst.onMouseMove(o);
        });
        inst.canvas.on('mouse:up', function(o) {
          inst.onMouseUp(o);
        });
        inst.canvas.on('object:moving', function(o) {
          inst.disable();
        })
      }

      drawCircle.prototype.onMouseUp = function(o) {
        var inst = this;
        inst.disable();
      };

      drawCircle.prototype.onMouseMove = function(o) {
        var inst = this;
        if (!inst.isEnable()) {
          return;
        }

        var pointer = inst.canvas.getPointer(o.e);
        var activeObj = inst.canvas.getActiveObject();

        activeObj.stroke = changedColor,
          activeObj.strokeWidth = 2;
        activeObj.fill = 'transparent';
        //  activeObj.fill = changedColor //'transparent';

        if (origX > pointer.x) {
          activeObj.set({
            left: Math.abs(pointer.x)
          });
        }

        if (origY > pointer.y) {
          activeObj.set({
            top: Math.abs(pointer.y)
          });
        }

        activeObj.set({
          rx: Math.abs(origX - pointer.x) / 2
        });
        activeObj.set({
          ry: Math.abs(origY - pointer.y) / 2
        });
        activeObj.setCoords();
        inst.canvas.renderAll();
      };

      drawCircle.prototype.onMouseDown = function(o) {
        var inst = this;
        inst.enable();

        var pointer = inst.canvas.getPointer(o.e);
        origX = pointer.x;
        origY = pointer.y;

        var ellipse = new fabric.Ellipse({
          top: origY,
          left: origX,
          rx: 0,
          ry: 0,
          transparentCorners: false,
          hasBorders: false,
          hasControls: false
        });

        inst.canvas.add(ellipse).setActiveObject(ellipse);
      };

      drawCircle.prototype.isEnable = function() {
        return this.isDrawing;
      }

      drawCircle.prototype.enable = function() {
        this.isDrawing = true;
      }

      drawCircle.prototype.disable = function() {
        this.isDrawing = false;
      }

      return drawCircle;
    }());

    // draw line
    var Line = (function() {
      function Line(canvas) {
        this.canvas = canvas;
        this.isDrawing = false;
        mode = "line";

        this.bindEvents();
      }

      Line.prototype.bindEvents = function() {
        var inst = this;
        inst.canvas.on('mouse:down', function(o) {
          inst.onMouseDown(o);
        });
        inst.canvas.on('mouse:move', function(o) {
          inst.onMouseMove(o);
        });
        inst.canvas.on('mouse:up', function(o) {
          inst.onMouseUp(o);
        });
        inst.canvas.on('object:moving', function(o) {
          inst.disable();
        })
      }

      Line.prototype.onMouseUp = function(o) {
        var inst = this;
        if (inst.isEnable()) {
          inst.disable();
        }
      };

      Line.prototype.onMouseMove = function(o) {
        var inst = this;
        if (!inst.isEnable()) {
          return;
        }

        var pointer = inst.canvas.getPointer(o.e);
        var activeObj = inst.canvas.getActiveObject();

        activeObj.set({
          x2: pointer.x,
          y2: pointer.y
        });
        activeObj.setCoords();
        inst.canvas.renderAll();
      };

      Line.prototype.onMouseDown = function(o) {
        var inst = this;
        inst.enable();

        var pointer = inst.canvas.getPointer(o.e);
        origX = pointer.x;
        origY = pointer.y;

        var points = [pointer.x, pointer.y, pointer.x, pointer.y];
        var line = new fabric.Line(points, {
          strokeWidth: 3,
          stroke: changedColor,
          fill: changedColor,
          originX: 'center',
          originY: 'center',
          hasBorders: false,
          hasControls: false
        });
        inst.canvas.add(line).setActiveObject(line);
      };

      Line.prototype.isEnable = function() {
        return this.isDrawing;
      }

      Line.prototype.enable = function() {
        this.isDrawing = true;
      }

      Line.prototype.disable = function() {
        this.isDrawing = false;
      }

      return Line;
    }());

    function removeEvent() {
      canvas.isDrawingMode = false;
      canvas.selection = false;
      canvas.off('mouse:down');
      canvas.off('mouse:up');
      canvas.off('mouse:move');
    }

    //add text start
    var oText;

    function addText() {
      removeEvent();
      mode = "Text_Inputfield";
      var oText = new fabric.IText('Tap and Type', {
        fontSize: 30,
        fontWeight: 'bold',
        fill: changedColor,
        left: 250,
        top: 200,
        textAlign: 'center',
        // editable: true,
      });

      canvas.add(oText);
      oText.bringToFront();
      canvas.setActiveObject(oText);
      // $('#color').trigger('change');
    }

    function drawrec() {
      removeEvent();
      var rect = new Rectangle(canvas);
    }

    // function drawpen(){
    //   removeEvent();
    //   var pentool = new Pentool(canvas);
    // }

    function drawTriangle() {
      removeEvent();
      var tri = new Triangle(canvas);
    }

    function drawcle() {
      removeEvent();
      var cir = new drawCircle(canvas);
    }

    function drawLine() {
      removeEvent();
      var line = new Line(canvas);
    }
  </script>
  <!-- save canvas as image Phase 1 Round 1 -->
  <script>
    function savecanvas() {
      src = canvas.toDataURL('image/png');
      $('#get_canvasimg').val(src);
    }
  </script>
</body>


<!-- // canvas.on('mouse:up', function() {
//   canvas.getObjects().forEach(o => {
//     // o.fill = 'blue',
//     o.lockMovementX = true,
//     o.lockMovementY = true
//   });
//   canvas.renderAll();
// }) -->

<!-- let objects = fabric.getObjects(); //return Array<objects>
objects.forEach(object=>{
    //list the attributes for each object
    alert(object.id);
}); -->

<!-- canvas.add(img1);
    getAttributes(); -->

<!-- function getAttributes() {
    canvas.getObjects().forEach(object => {
        if (!object.isType('text') && !object.isType('image')) { // object is a shape
            console.log(object.scaleX, object.fill);
        } else if (object.isType('text')) { // object is a text
            console.log(object.text, object.fontFamily, object.fontSize * 3, object.scaleX, object.fill);
        } else if (object.isType('image')) { // object is an image
            console.log(object.name, object.scaleX, object.fill);
        }
    });
} -->