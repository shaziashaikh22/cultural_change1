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
            <div class="col-sm-2 offset-md-2" style="text-align: right;padding-top:10px;">
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
                    <source type="video/mp4" src="<?php echo $this->request->webroot; ?>img/Cultural Change - round2 phase 1.mp4">
                </video>
                </div>
                <div class="row">
                    <div class="col-md-2 offset-md-9" id="finish_btn_ID" style="display:none;">
                <?php
                echo $this->Html->link(
                    'NEXT',
                    ['controller' => 'Users', 'action' => 'startgameround2'],['class'=>'btn btn-primary']
                );
                ?>
                </div></div>
            </div>
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