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
  .tooltip {
    position: absolute;
    opacity: 0;
    padding: 10px;
    background: #009B91;
    border-radius: 5px;
    -webkit-transition: all 0.2s ease-in;
    -moz-transition: all 0.2s ease-in;
    transition: all 0.2s ease-in;
    top: -30px;
    left: -15px;
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

  .canvas-container {
    position: absolute !important;
    width: 100% !important;
    height: 100% !important;
    /* background-color: white; */
  }

  canvas {
    /* background-color:white; */
    width: 100% !important;
    height: 100% !important;
  }

  /* End job description */

  .red {
    background: #d1c7c7;
  }

  .jst-hours {
    float: left;
  }
  .jst-minutes {
    float: left;
  }
  .jst-seconds {
    float: left;
  }
  .jst-clearDiv {
    clear: both;
  }
</style>

<head>
  <?php echo $this->Html->script('fabric.min'); ?>
  <?php echo $this->Html->script('jquery.simple.timer'); ?>

</head>

<body>
  <?php
  date_default_timezone_set('asia/kolkata');
  $current_time = date("d-m-y h:i:s");
  ?>

<input type="hidden" value="" id="time_in_seconds"/>
<input type="hidden" value="" id="get_db_time"/>

  <div class="container-fluid" id="round2phase1playscreen" style="display: block;">
    <div class="row" style="background-color: white;border: 1px solid black;">
      <div class="col-md-3" style="align-self: flex-end;">
        <img src="<?php echo $this->request->webroot; ?>img/username.png" width="50">
        <span class="usrname">
          <?= $userType[0]['type_name']; ?>
        </span>
      </div>
      <div class="col-md-6" style="align-self: flex-end;">
        <img src="<?php echo $this->request->webroot; ?>img/r2p1-planning.png" style="max-width: 100%;max-height: 100%;">
      </div>
      <?php $usertypeid = $userType[0]['id']; ?>
      <div class="col-md-2">
        <div style="width: fit-content;padding:7px;">
          <div class="btn btn-primary tooltip2"><?= $userType[0]['type_name']; ?>
            <div class="bottom">
              <!-- <h6>JOB DESCRIPTION</h6>
              <?php foreach ($JobDescriptions as $JobDescription) { ?>
                <?php if ($JobDescription['user_type_id'] == $usertypeid) { ?>
                  <p><?= $JobDescription['description']; ?></p>

                <?php } ?>
              <?php  } ?> -->

              <h6>Project Info</h6>
              <?php foreach ($JobDescriptions as $JobDescription) { ?>
                <b><?= $JobDescription['user_type']['type_name']; ?></b>
                <p><?= $JobDescription['project_info']; ?></p>
              <?php  } ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-1" style="padding-top:10px;">
        <?php
        // echo $this->Html->link(
        //   'Logout',
        //   ['controller' => 'Users', 'action' => 'logout'],
        //   ['class' => 'btn btn-primary']

        // ); 
        ?>
      </div>
    </div>
    <br>

    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <div>

          Brush size: <input id="brush_size" type="range" min="1" max="100" step="1" value="0.8">
        </div>
        <div id="outercanvas" style="height: 570px;position: relative;">
          <canvas id="drawing_1" width="1000" height="570" style="position:absolute;"></canvas>
          <canvas id="drawing_2" width="1000" height="570" style="position:absolute;"></canvas>
          <canvas id="drawing_3" width="1000" height="570" style="position:absolute;"></canvas>
          <canvas id="drawing_4" width="1000" height="570" style="position:absolute;border:1px solid;"></canvas>
        </div>
      </div>
      <div class="col-md-1" style="background-color:white;text-align:center;">
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
              <img src="<?php echo $this->request->webroot; ?>img/redo.png" style="padding-top:15px;padding-bottom:20px;">
            </a>
          </div>
        </div>
        <div class="row foo" style="height: 55px;">
          <div class="col-sm-12">
            <a href="javascript:undo();"><img src="<?php echo $this->request->webroot; ?>img/undo.png" style="padding-top:15px;padding-bottom:20px;"></a>
          </div>
        </div>
      </div>
    </div>

    <div class="row" style="padding-top:20px;text-align:center;">
      <div class="col-md-2" style="border: 1px solid;">
        <button class="btn btn-primary time-txt" id="showtime" style="pointer-events: none;color:black;background: white;box-shadow: none;">
      </button>
      </div>
      <!-- <div class="col-md-8"></div> -->
      <div class="col-md-2 offset-md-7">
        <?php
        echo $this->Html->link(
          'Finish',
          ['controller' => 'Users', 'action' => 'jobdescround4'],
          ['class' => 'btn btn-primary time-txt', 'id' => 'finish_btn_round2phase1','style'=>'display:none;']

        ); ?>
      </div>
      <!-- <div class="col-md-1" style="border: 1px solid grey;">
  <img onClick="clearcanvas()" src="<?php echo $this->request->webroot; ?>img/delete1_new35.png" style="padding-top:10px;">
  </div> -->
    </div>
  </div><!-- first div close -->

  <!-- screen to select phase 2 round 2 -->
  <div class="container-fluid" id="phase2round2selectscreen" style="display:none;">
    <div class="row" style="background-color: white;border: 1px solid black;">
      <div class="col-md-5" style="align-self: flex-end;">
        <img src="<?php echo $this->request->webroot; ?>img/username.png" width="50">
        <span class="usrname">
          <?= $user['name']; ?>
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
            <span class="btn btn-primary" style="pointer-events: none;box-shadow: none;border-radius: 5px 15px 5px 5px;font-size: 20px;width:250px;padding: 35px;">
              PROCEED TO <br>
               <span style="font-size: 15px;">JOB DESCRIPTION <br>PHASE -2</span></span>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-12" style="text-align: center;">
            <?php
            //  $this->Form->create('', ['type' => 'POST','url' => ['action' => 'round2phase1'],'id'=>'round2phase1form'])
            ?>
            <input type="hidden" name="canvas_image" value="" id="round2phase1_canvas" />
            <!-- <input type="hidden" name="score" value="" id="updatescore">
            <input type="hidden" name="score" value="" /> -->
            <?php
            echo $this->Html->link(
              'OK',
              ['controller' => 'Users', 'action' => 'jobdescround4'],
              ['class' => 'btn btn-primary okbtn']

            ); ?>
            <!-- go_tophase2roundtwo
          <button class= "btn btn-primary" id="go_tophase2roundtwo" value="OK" style="width: 100px;">OK</button> -->
            <!-- type="submit" name="go_tophase2roundtwo" -->
            <?php
            //  $this->Form->end();
            ?>

            <input type="hidden" id="user_type" name="user_type" value="<?= $user['user_type_id']; ?>">
          </div>
        </div>
      </div>
      <div class="col-md-3"></div>
      <div class="col-md-1" style="height:90vh;">
      </div>

    </div>
  </div>
<?php date_default_timezone_set('asia/kolkata');?>
  <input type="hidden" name="update_start_time" id="start_timeID" value="<?=date("d-m-y h:i:s");?>">
  <!-- <input type="hidden" id="getcurrentdate_timeID" value="<?=date("d-m-y h:i:s");?>"> -->
  <script>
    // var p2_r1_Architect_result_canvas = $('#p2_r1_Architect_result_canvas').val();
    // var p2_r1_Carpenter_result_canvas = $('#p2_r1_Carpenter_result_canvas').val();
    // var p2_r1_Gardener_result_canvas = $('#p2_r1_Gardener_result_canvas').val();
    // var p2_r1_Designer_result_canvas = $('#p2_r1_Designer_result_canvas').val();
  </script>
  <!-- onclick of finish button trigger submit round 1 button click -->

  

  <script>
    $('#brush_size').on('change', function() {
      canvas.freeDrawingBrush.width = parseInt($(this).val());
    });

    var changedColor = $('#color').val();
    var newcolor;
    $('#color').on('change', function() {
      newcolor = $(this).val();
      changedColor = newcolor;
      if(mode == "Pen"){
        canvas.freeDrawingBrush.color = changedColor;
        }
    });

    // alert(newcolor);


    var canvas4 = new fabric.Canvas('drawing_1', { // should be architect canavas
      isDrawingMode: false,
    });
    var ctx4 = canvas4.getContext("2d");
    ctx4.globalAlpha = 0.5;

    var canvas3 = new fabric.Canvas('drawing_2', { // should be carpenters canavas
      isDrawingMode: false,
    });

    var ctx3 = canvas3.getContext("2d");
    ctx3.globalAlpha = 0.5;


    var canvas2 = new fabric.Canvas('drawing_3', { // should be gardeners canavs
      isDrawingMode: false,
    });
    var ctx2 = canvas2.getContext("2d");
    ctx2.globalAlpha = 0.5;


    var canvas = new fabric.Canvas('drawing_4', { // should be interior designer canvas
      isDrawingMode: false,
    });
    var ctx = canvas.getContext("2d");
    ctx.globalAlpha = 1;

    //Prevent Fabric js Objects from scaling out of the canvas boundary start 4-26-2022
    canvas.on('object:moving', function(e) {
      var obj = e.target;

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
    }); // end 4-26-2022
    

    var isRedoing = false;
    var h = [];

    var oldbrush_size = parseInt($('#brush_size').val());
    var newbrush_size;
    $('#brush_size').on('change', function() {
      newbrush_size = parseInt($(this).val());
      canvas.freeDrawingBrush.width = newbrush_size;
      oldbrush_size = newbrush_size;
    });

    var mode  = "";

    function drawpen() {
      removeEvent();
      mode = "Pen";
      canvas.isDrawingMode = true;
      canvas.freeDrawingBrush.width = oldbrush_size;
      canvas.freeDrawingBrush.color = changedColor;
      canvas.freeDrawingLineWidth = 4;

canvas.on('path:created', function(e) {
  e.path.set({
//     lockMovementX :true,
// lockMovementY : true
selectable:false
  });
  canvas.renderAll();
});
      canvas.on('object:added', function(e) {
        if (!isRedoing) {
          h = [];
        }
        isRedoing = false;
      });
    }

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

    function draweraser() {
      removeEvent();
      mode = "Eraser";
      // canvas.freeDrawingBrush.width = oldbrush_size;
      // canvas.isDrawingMode = true;
      // canvas.freeDrawingBrush.color = '#fcfcfc'; // '#fcfcfc'; 
      
canvas.on('path:created', function(e) {
  e.path.set({
//     lockMovementX :true,
// lockMovementY : true
selectable:false
  });
  canvas.renderAll();
});
    }

    canvas.on('mouse:dblclick', function (e) {
        if(mode == "Eraser"){
       var delete_obj = e.target;
      //  delete_obj.remove();
       canvas.remove(delete_obj);
      //  canvas.renderAll();
  }
});


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
      Rectangle.prototype.erasable = true;

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
        })
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
        activeObj.fill = 'transparent';
        //activeObj.fill = changedColor //'transparent';


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
          hasControls: false
        });

        inst.canvas.add(rect).setActiveObject(rect);
        // $('#color').change(function(){
        //   if(act){
        //     rect.set("fill", this.value);
        //    }
        //   });

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


    // Circle shape
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
        //activeObj.fill = changedColor //'transparent';


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

<!-- ********************* Functionality **************** -->

<script>

var window_state = false;
var endTime;

$(document).ready(function() { // get time after half seconds of page load
  setTimeout(getTime,500);
 });

window.addEventListener("focus", function(event)  {
    getTimeonfocus();
    window_state = false;

},false);


$(document).ready(function() {
      $('.foo').click(function() {
        $(this).toggleClass('red')
          .siblings().removeClass('red')
      });

      var get_currentTime =  $('#start_timeID').val();
      updateTime(get_currentTime);

      function updateTime(get_currentTime) { // update time initially at page load (current time)
      //  alert(get_currentTime);
        return $.ajax({
          url: "r2p1updateTime",
          type: "POST",
          data: {
            update_start_time: get_currentTime,
          },
          success: function(data) {}
        })
      }
    })

    function getTime() {
        return $.ajax({
          url: "fetchTimeR2p1",
          type: "GET",
          success: function(data) {
            var get_db_time = JSON.parse(data);
            // alert(get_db_time);
            $('#get_db_time').val(get_db_time); 
            getseconds();
          }
        })
      }
function getseconds(){ 
  var db_time = $('#get_db_time').val(); 
  // alert(db_time);
  // var start_time = new Date().getTime();
  return $.ajax({
          url: "timedifferenceR2p1",
          type: "POST",
          data:{
            db_start_time:db_time,
          },
          success: function(data) {
            // var request_time = new Date().getTime() - start_time;
            var get_seconds = JSON.parse(data);
            $('#time_in_seconds').val(get_seconds);
            var count_downTime = $('#time_in_seconds').val();

          var count_Down = count_downTime - 300;
      // var test = $('.timer').text();
      // alert(count_Down);
      // var count_Down = count_downTime - parseInt(test);         
      endTime = Math.abs(count_Down);
            countDown();//Math.abs(count_Down)

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
            endTime = endTime -1;
            countDown();
          }, 1000);
        } else {
          $('#round2phase1playscreen').hide();
          $('#phase2round2selectscreen').show();
        }
      }
      }
        })
} 
function getTimeonfocus() {
        return $.ajax({
          url: "fetchTimeR2p1",
          type: "GET",
          success: function(data) {
            var get_db_time = JSON.parse(data);
            // alert(get_db_time);
            $('#get_db_time').val(get_db_time); 
            getsecondsonfocus();
          }
        })
      }

function getsecondsonfocus(){ 
  var db_time = $('#get_db_time').val(); 
  
  return $.ajax({
          url: "timedifferenceR2p1",
          type: "POST",
          data:{
            db_start_time:db_time,
          },
          success: function(data) {
            // var request_time = new Date().getTime() - start_time;
            var get_seconds = JSON.parse(data);
            $('#time_in_seconds').val(get_seconds);
            var count_downTime = $('#time_in_seconds').val();

          var count_Down = count_downTime - 300;         
      endTime = Math.abs(count_Down);           
          }
        })
} 

  </script>
  <script>
    $('#finish_btn_round2phase1').on('click', function() {
      src = canvas.toDataURL('image/png');
      form1(src);
      form2();
    });
    $('.okbtn').on('click', function() {
      src = canvas.toDataURL('image/png');
      form1(src);
      form2();
    });
  </script>
  

  <!-- save canvas as image round 2 phase 1 -->
  <script>
    $(document).ready(function() {
      setInterval(function() {
      var  src = canvas.toDataURL('image/png');
            // updatecanvas(src);
      form1(src);
      form2();
      // getTime();
      }, 1000);
    });

    function form1(current_canvas) {
      // alert(current_canvas);
      $('#round2phase1_canvas').val(current_canvas);
      current_canvas = $('#round2phase1_canvas').val();
      return $.ajax({
        url: "round2phase1",
        type: "POST",
        data: {
          canvas_image: current_canvas,
        },
        success: function(data) {
          // console.log(data);
        }
      })
    }

    function form2() {
      var user_type = $('#user_type').val();
      return $.ajax({
        url: "othercanvas",
        type: "POST",
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

        }
      })
    }

    // function updatecanvas(current_canvas) {
    //   // alert(current_canvas);
    //   $('#round2phase1_canvas').val(current_canvas);
    //   current_canvas = $('#round2phase1_canvas').val();
    //   return $.ajax({
    //     url: "updatecanvasR2p1",
    //     type: "POST",
    //     data: {
    //       canvas_image: current_canvas,
    //     },
    //     success: function(data) {
    //       // console.log(data);
    //     }
    //   })
    // }
    
    // var window_state = false;

// $(document).ready(function() {// get time after 2 seconds of page load
//   window_state = true;
//   setTimeout(getTime,500);
//  });

//  document.addEventListener('visibilitychange', function() {
//     if(document.hidden) {
//       clearTimeout();
//         // tab is now inactive
//         // temporarily clear timer using clearInterval() / clearTimeout()
//     }
//     else {
//       // setTimeout(getTime,500);
//         // tab is active again
//         // restart timers
//     }
// });

// window.onblur = function() {
//   if(window_state === true){
//     clearTimeout();
//     setTimeout(getTime,500);
//   }
// };

// window.onfocus = function() {
//   if(window_state == true){
//     // alert(window_state);
//     // $('#showtime').text('');
//     setTimeout(getTime,500);
//     this.off("focus");
//   }
// };

// var nCounter = 0;
// // Set up event handler to produce text for the window focus event
// window.addEventListener("focus", function(event) 
// { 
//     nCounter = nCounter + 1; 
//     // alert(nCounter);
//     if(nCounter == 1){
//         setTimeout(getTime,500);
//     }
// }, false);

// $(document).ready(function() {// get time after 2 seconds of page load
//   setTimeout(getTime,500);
//   var count_downTime = $('#time_in_seconds').val();
//           var count_Down = count_downTime - 300;
//       var test = $('.timer').html();
//       alert(test);
//       // var count_Down = count_downTime - parseInt(test);
// $('.timer').startTimer({
//     onComplete: function(element){
//       alert('time completed')
//       // $('html, body').addClass('bodyTimeoutBackground');
//     }
//   })
//  });
  </script>
</body>