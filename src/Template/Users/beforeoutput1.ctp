<!DOCTYPE html>

<html>

<style>
    ::placeholder {
        color: #009B91;
        opacity: 1;
        /* Firefox */
    }

    :-ms-input-placeholder {
        /* Internet Explorer 10-11 */
        color: #009B91;
    }

    ::-ms-input-placeholder {
        /* Microsoft Edge */
        color: #009B91;
    }
</style>


<body>
<input type="hidden" id="check_status_r1p1" value="">

    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>

            <div class="col-sm-6">
                <br> <br> <br>
                <br><!-- code copy end -->
<?php
//  print_r($userType_detail);
//  print_r($totalgamecode);
?>
                    <div class="row">
                    <div class="col-sm-12" style="text-align:center;">
                    <span style="color: #009B91;font-weight: bold;padding: 0.375rem 0.75rem;width: -webkit-fill-available;font-size: larger;">
                Waiting for other players to finish.
                </span>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-12" style="text-align:center;">
                    <span style="color: #009B91;font-weight: bold;padding: 0.375rem 0.75rem;width: -webkit-fill-available;font-size: larger;">
                Get your Group score in the end.
                </span>
                    </div>
                    </div>
                    
                    <br>
                <?php foreach ($userType_detail as $userType_details) {
                    ?>
                    <div class="row">
                        <!-- player type start -->
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                            <input type="hidden" value="<?= $userType_details["id"] ?>" readonly>
                            <?php if($userType_details['id'] == $user['user_type_id']){?>
                            <div class="txt2-active">
                                <div><?= (sizeof($userType_details['joined_gamecode'])) ? $userType_details["type_name"] . '<div style="float: right;">Done</div>' : $userType_details["type_name"] .'<div style="float: right;">Playing</div>';?>
                                </div>
                            </div>
                            <?php }else { ?>
                                <div class="txt2">
                                <div><?= (sizeof($userType_details['joined_gamecode'])) ? $userType_details["type_name"] . '<div style="float: right;">Done</div>' : $userType_details["type_name"] . '<div style="float: right;">Playing</div>'; ?>
                                </div>
                            </div>
                                <?php }?>

                        </div>
                        <div class="col-sm-1"></div>
                    </div><br><!-- player type start -->
                <?php } ?>
                <div class="row">
                    <!-- start game btn start -->
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                    <?php
                    //  if($totalgamecode == 4){ 
                    //     echo $this->Html->link(
                    //         'START GAME',
                    //         ['controller' => 'Users', 'action' => 'waiting'],
                    //         ['class' => 'btn txt2', 'style' => 'border: 2px solid;
                    //         text-align: center;']
                    //     );
                    //     }
                    //     else{ 
                    //         echo $this->Html->link(
                    //             'START GAME',
                    //             ['controller' => 'Users', 'action' => 'waiting'],
                    //             ['class' => 'btn btn-primary txt2', 'style' => 'background-color: gainsboro;text-align: center;pointer-events:none;']
                    //         ); 
                    //     }
                     ?>

                    </div>
                    <div class="col-sm-3"></div>
                </div><br><!-- start game btn end -->
            </div>

            <div class="col-sm-2 offset-md-1">
                <br>
            <?php 
    //             echo $this->Html->link(
    // 'Log out',
    //         ['controller' => 'Users', 'action' => 'logout'],['class' => 'btn btn-primary']
           
    //         );
            ?>
            </div>
        </div>
    </div>
    <!-- check players status -->
  <script>
     $(document).ready(function() { 
    checkr1p1status();
var interval1 = setInterval(function(){
    var playerStatus = $('#check_status_r1p1').val();
  if(playerStatus == '4'){
    // alert(playerStatus);
    clearInterval(interval1);
    location.href = 'outputround1';

    // location.reload();
}else{
    checkr1p1status();
    location.reload();
}
}, 3000); 
     });

     function checkr1p1status(){
    return   $.ajax({
        url: "checkr1p2done",
        type: "GET",
        success: function(data) {
          var p_status = JSON.parse(data);
        //   alert(p_status);
          $('#check_status_r1p1').val(p_status);
        }
      })
}
    </script>
</body>


</html>