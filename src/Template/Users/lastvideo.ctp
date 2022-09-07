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

        /* job description tooltip */
  .tooltip2 {
    display: inline-block;
    position: relative;
    border-bottom: 1px dotted #666;
    text-align: left;
  }

  .tooltip2 .bottom {
    min-width: 200px;
    top: -100px;
    left: 50%;
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
                <!-- <img src="<?php echo $this->request->webroot; ?>img/logomain.png"> -->
            </div>
            <div class="col-sm-2 offset-md-2" style="text-align: right;padding-top:10px;">
            <?php 
                echo $this->Html->link(
    'EXIT',
            ['controller' => 'Users', 'action' => 'logout'],['class' => 'btn btn-primary']
           
            );
            ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-2">
            
            </div>
            <div class="col-sm-10">
                <div id="videostart">
                <video width="80%" height="70%" controls id="myvideo">
                    <source type="video/mp4" src="<?php echo $this->request->webroot; ?>img/Neu_EBB BrainHouse Video Conclusion_Audiosync.mp4">
                </video>
                </div>
                <div class="row"><div class="col-md-3 offset-md-8">
                <!-- style="display:none;" -->
                <div class="btn btn-primary tooltip2" id="finish_btn_ID">
                <?php
                // echo $this->Html->link(
                //     'NEXT',
                //     ['controller' => 'Users', 'action' => 'login'],['style'=>'color:white']
                // );
                 ?>
                  <a class="btn btn-primary" id="a_link" style="color: white;" href="https://forms.office.com/Pages/ResponsePage.aspx?id=M8Rk7OgevU2Dejn1bHzc6tgaFgmCrmBNo4NBFTTSyV1UN1FLNlUzNEFQUjM0UUhLM0RBUUpUMDlKWiQlQCN0PWcu">
        PROCEED TO SURVEY
        </a>
              
            <div class="bottom">
              <p style="color: white;">Click next to proceed the survey.</p>
            </div>
          </div>
               
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

  //   document.querySelector('video').addEventListener('ended',function(){
  //   $('#finish_btn_ID').show();
  // }, false);
  $('#a_link').on('click', function(e){ 
    e.preventDefault(); 
    var url = $(this).attr('href'); 
    window.open(url, 'https://forms.office.com/Pages/ResponsePage.aspx?id=M8Rk7OgevU2Dejn1bHzc6tgaFgmCrmBNo4NBFTTSyV1UN1FLNlUzNEFQUjM0UUhLM0RBUUpUMDlKWiQlQCN0PWcu');
});
</script>

</html>