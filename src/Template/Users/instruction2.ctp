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
    </style>
</head>

<body>
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
            <div class="col-sm-1 offset-md-3" style="padding-top: 10px;">
            <?php 
                echo $this->Html->link(
    'Logout',
            ['controller' => 'Users', 'action' => 'logout'],['class' => 'btn btn-primary']
           
            );?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8" style="border: 1px solid grey;border-radius:20px;background-color:white;">
            <br>
                <!-- color tool instruction -->
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
                <!-- pen tool instruction -->
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
                <!-- eraser tool instruction -->
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
                <!-- paintbucket tool instruction -->
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
                <!-- text tool instruction -->
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

                <!-- shape tool instruction -->
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

                <!-- back tool instruction -->
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
                       <!-- <input type="hidden" id="user_type_idH" value="<?=$user['user_type_id'];?>">
                       <input type="hidden" id="architect_canvasH" value="<?= sizeof($p1_r2_Architect_result)>0?$p1_r2_Architect_result[0]['canvas_image']:''?>">
                       <input type="hidden" id="carpenter_canvasH" value="<?= sizeof($p1_r2_Carpenter_result)>0?$p1_r2_Carpenter_result[0]['canvas_image']:''?>">
                       <input type="hidden" id="gardener_canvasH" value="<?= sizeof($p1_r2_Gardener_result)>0?$p1_r2_Gardener_result[0]['canvas_image']:''?>">
                       <input type="hidden" id="designer_canvasH" value="<?= sizeof($p1_r2_Designer_result)>0?$p1_r2_Designer_result[0]['canvas_image']:''?>">
                        -->
                   <?php echo $this->Html->link(
                'NEXT',['controller' => 'Users', 'action' => 'round1phase2'],['class' => 'btn btn-primary','style'=>'pointer-events: block','id'=>'nextbtnID']); ?>
                </div>
               </div><br>
            </div>
            <div class="col-sm-2"></div>
        </div>


    </div>



    </div>
</body>
<!-- <script>
    $(document).ready(function(){
        //If user is architect then will go to p1 r2 round
        if($('#user_type_idH').val() == 3){
            $('#nextbtnID').css( 'pointer-events', 'auto' );
        }
    //If user is carpenter & architect canvas empty then wont go to p1 r2 round
        if($('#user_type_idH').val() == 2 && $('#architect_canvasH').val()==""){
            $('#nextbtnID').css( 'pointer-events', 'none');
            alert('This is not your turn.');
        }else{
            $('#nextbtnID').css( 'pointer-events', 'auto' );
        }
    //If user is Gardener & architect,carpenter canvas empty then wont go to p1 r2 round
        if($('#user_type_idH').val() == 1 && $('#carpenter_canvasH').val()==""){
            $('#nextbtnID').css( 'pointer-events', 'none' );
            alert('This is not your turn.');
        }else{
            $('#nextbtnID').css( 'pointer-events', 'auto' );
        }
            //If user is Designer & architect,carpenter,gardener canvas empty then wont go to p1 r2 round
        if($('#user_type_idH').val() == 4 && $('#gardener_canvasH').val()==""){
            $('#nextbtnID').css( 'pointer-events', 'none' );
        alert('This is not your turn.');
        }
        else{
            $('#nextbtnID').css( 'pointer-events', 'auto' );
        }
    });
    </script> -->
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
</script>

</html>