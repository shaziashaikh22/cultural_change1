<!DOCTYPE html>

<html>

<head>
    <style>
        .ImageLink {
            height: 300px;
            width: 350p;
            position: relative;
            display: block;
        }

        .ItemImage {
            height: 350px;
            width: -webkit-fill-available;
        }

        .OverlayIcon {
            position: absolute;
            top: 150px;
            left: 450px;
        }
        .tooltip2 {
    display: inline-block;
    position: relative;
    border-bottom: 1px dotted #666;
    text-align: left;
  }

  .tooltip2 .bottom {
    min-width: 150px;
    top: -100px;
    left: 10%;
    transform: translate(-50%, 0);
    padding: 10px 20px;
    color: #444444;
    background-color: #00000045;
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
    </style>
</head>
<body>
    <br><br>
    <div class="container">
        <?php
        //  print_r($user);
        ?>
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <img src="<?php echo $this->request->webroot; ?>img/logomain.png">
            </div>
            <div class="col-sm-2 offset-md-2" style="text-align: right;"><br>
            <?php 
    //             echo $this->Html->link(
    // 'Log out',
    //         ['controller' => 'Users', 'action' => 'logout'],['class' => 'btn btn-primary']
           
    //         );
            ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <div id="videostart">
                <video width="80%" height="70%" controls id="myvideo">
                    <source type="video/mp4" src="<?php echo $this->request->webroot; ?>img/Round 1 Phase 1.mp4">
                </video>
                </div>
                <div class="row"><div class="col-md-2 offset-md-9">
                <div class="btn btn-primary tooltip2" id="finish_btn_ID" style="display:none;">
                <?php
                echo $this->Html->link(
                    'Next',
                    ['controller' => 'Users', 'action' => 'startgameround1'],['style'=>'color:white;font-weight:bold;font-size:20px;']
                );
                ?>
            <div class="bottom">
            <p style="color: white;">Click next to proceed the whiteboard.</p>
            </div>
          </div>
               
                </div></div>
            </div>


            <!-- <div class="col-sm-8" style="border: 1px solid grey;border-radius:20px;background-color:white;">
            <br>
                <div class="row">
                    <div class="col-sm-1" style="padding: 5px;"></div>
                    <div class="col-sm-10" style="padding-top: 5px;"><br>
                        <span style="font-size: 18px;font-weight:bold">Click and select option from the color tool to open <span style="color: #009B91;">COLOR SELECTION</span></span>
                    </div>
                    <div class="col-sm-1" style="padding: 5px;">
                        <span>
                            <input id="color" type="color" value="#FF0000" style="height:30px;width:30px; border:1px solid black; border-radius: 5px;">
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-1" style="padding: 5px;">
                    </div>
                    <div class="col-sm-10" style="padding-top: 5px;">
                        <span style="font-size: 18px;font-weight:bold"><span style="color: #009B91;">THE PEN TOOL</span> is like a pencil tool that creating rough ideas.</span>
                    </div>
                    <div class="col-sm-1" style="padding: 5px;">
                        <span>
                        <img src="<?php echo $this->request->webroot; ?>img/brush_pen_new30.png" style="height:30px;width:30px;">
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-1" style="padding: 5px;">
                    </div>
                    <div class="col-sm-10" style="padding-top: 5px;">
                        <span style="font-size: 18px;font-weight:bold"><span style="color: #009B91;">THE SIZE TOOL</span> is to define size of the pen tool</span>
                    </div>
                    <div class="col-sm-1" style="padding: 5px;">
                        <span>
                        <img src="<?php echo $this->request->webroot; ?>img/brush_size_new30.png" style="height:30px;width:30px;">
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-1" style="padding: 5px;">
                    </div>
                    <div class="col-sm-10" style="padding-top: 5px;">
                        <span style="font-size: 18px;font-weight:bold"><span style="color: #009B91;">THE PAINT BUCKET TOOL</span> is to fill colors in a shape or area</span>
                    </div>
                    <div class="col-sm-1" style="padding: 5px;">
                        <span>
                        <img src="<?php echo $this->request->webroot; ?>img/paint_new30.png" style="height:30px;width:30px;">
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-1" style="padding: 5px;">
                    </div>
                    <div class="col-sm-10" style="padding-top: 5px;">
                        <span style="font-size: 18px;font-weight:bold"><span style="color: #009B91;">THE TEXT TOOL</span> is for adding text to your art work.</span>
                    </div>
                    <div class="col-sm-1" style="padding: 5px;">
                        <span>
                        <img src="<?php echo $this->request->webroot; ?>img/text_new30.png" style="height:30px;width:30px;">
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-1" style="padding: 5px;">
                    </div>
                    <div class="col-sm-10" style="padding-top: 5px;">
                        <span style="font-size: 18px;font-weight:bold"><span style="color: #009B91;">THE SHAPE TOOL</span> has different shapes too choose from, you can quickly draw different shapes by using it.</span>
                    </div>
                    <div class="col-sm-1" style="padding: 5px;">
                        <span>
                        <img src="<?php echo $this->request->webroot; ?>img/triangle.png" style="height:30px;width:30px;">
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-1" style="padding: 5px;">
                    </div>
                    <div class="col-sm-10" style="padding-top: 5px;">
                        <span style="font-size: 18px;font-weight:bold">With the <span style="color: #009B91;">DELETE OPTION </span>you can delete any element you want to delete on screen.</span>
                    </div>
                    <div class="col-sm-1" style="padding: 5px;">
                        <span>
                        <img src="<?php echo $this->request->webroot; ?>img/delete1_new35.png" style="height:30px;width:30px;">
                        </span>
                    </div>
                </div>
               <br>
               <div class="row">
                   <div class="col-md-2 offset-md-10">
                   <div class="btn btn-primary tooltip2">
                <?php
                echo $this->Html->link(
                    'NEXT',
                    ['controller' => 'Users', 'action' => 'startgameround1'],['style'=>'color:white']
                );
                ?>
            <div class="bottom">
              <p style="color: white;">Click next to proceed the whiteboard.</p>
            </div>
          </div>
                </div>
               </div><br>
            </div> -->
            <div class="col-sm-2"></div>
        </div>


    </div>



    </div>
</body>
<script>
    var elem = document.getElementById("myvideo");

    function openFullscreen() {
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.webkitRequestFullscreen) {
            /* Safari */
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) {
            /* IE11 */
            elem.msRequestFullscreen();
        }
    }
    document.querySelector('video').addEventListener('ended',function(){
    $('#finish_btn_ID').show();
    // alert('Video has ended!');
  }, false);
</script>

</html>