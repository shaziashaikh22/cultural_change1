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
    <input type="hidden" id="game_status_r1p1" value="">

    <input type="hidden" id="waiting_screenID" name="waiting_screen" value="11">
    <input type="hidden" id="current_user_type" value="<?= $userType[0]['id']; ?>">

    <input type="hidden" id="game_status" name="game_status" value="Started">

    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <br> <br> <br>
                <br><!-- code copy end -->
                <?php
                //  print_r($userType_detail);
                //  print_r($total_r1p1_waitingcnt);
                ?>
                <div class="row">
                    <div class="col-sm-12" style="text-align:center;">
                        <span style="color: #009B91;font-weight: bold;padding: 0.375rem 0.75rem;width: -webkit-fill-available;font-size: larger;">
                            Proceed with Round 1 - Planning Phase
                        </span>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-sm-12" style="text-align:center;">
                        <span style="color: #009B91;font-weight: bold;padding: 0.375rem 0.75rem;width: -webkit-fill-available;font-size: larger;">
                            You are the <?= $userType[0]['type_name']; ?>.
                        </span>
                    </div>
                </div><br>
                <?php foreach ($userType_detail as $userType_details) {
                    // print_r($userType_details['type_name']);
                ?>
                    <div class="row">
                        <!-- player type start -->
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                            <input type="hidden" value="<?= $userType_details["id"] ?>" readonly>
                            <?php if ($userType_details['id'] == $user['user_type_id']) { ?>
                                <div class="txt2-active">
                                    <div><?= (sizeof($userType_details['joined_gamecode'])) ? $userType_details["type_name"] . '<div style="float: right;">Ready</div>' : "Waiting for Player ..."; ?>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="txt2">
                                    <div><?= (sizeof($userType_details['joined_gamecode'])) ? $userType_details["type_name"] . '<div style="float: right;">Ready</div>' : "Waiting for Player ..."; ?>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                        <div class="col-sm-1"></div>
                    </div><br><!-- player type start -->
                <?php } ?>
                <div class="row">
                    <!-- start game btn start -->
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <?php
                        if ($totalgamecode == 4 && $total_r1p1_waitingcnt == 4) {
                            echo $this->Html->link(
                                'Start Game',
                                ['controller' => 'Users', 'action' => 'waiting'],
                                ['class' => 'btn txt2 allready', 'style' => 'border: 2px solid;
                            text-align: center;']
                            );
                        } else {
                            echo $this->Html->link(
                                'Start Game',
                                ['controller' => 'Users', 'action' => 'waiting'],
                                ['class' => 'btn btn-primary txt2 allready', 'style' => 'background-color: gainsboro;text-align: center;pointer-events:none;']
                            );
                        }
                        ?>

                    </div>
                    <div class="col-sm-3"></div>
                </div><br><!-- start game btn end -->


                <div class="row">
                    <!-- start game btn start -->
                    <div class="col-sm-12" style="text-align:center;">
                        <span id="bottom-txt" style="color: #009B91;font-weight: bold;padding: 0.375rem 0.75rem;width: -webkit-fill-available;font-size: larger;">
                            Waiting for other players to join.</span>

                    </div>
                </div><br>
            </div>

            <div class="col-sm-2 offset-md-1">
                <br>
                <?php
                // echo $this->Html->link(
                // 'Log out',
                // ['controller' => 'Users', 'action' => 'logout'],['class' => 'btn btn-primary']

                //);
                ?>
            </div>
        </div>
    </div>
    <!-- check players status -->
    <script>
        $(document).ready(function() {
            $('.allready').on('click', function() {
                var game_status_val = $('#game_status').val();
                $.ajax({
                    url: "updater1p1gamestatus",
                    type: "POST",
                    data: {
                        game_status: game_status_val
                    },
                    success: function(data) {}
                })
            })
        });

        $(document).ready(function() {
            var waitingscrnval = $('#waiting_screenID').val();
            $.ajax({
                url: "updatewaitingscreenr1p1",
                type: "POST",
                data: {
                    waiting_screen: waitingscrnval,

                },
                success: function(data) {}
            })
        });

        $(document).ready(function() {
            checkr1p1status();
            checkr1p1gamestatuscount();
            var interval1 = setInterval(function() {
                var playerStatus = $('#check_status_r1p1').val();
                var gameStatusCount = $('#game_status_r1p1').val();

                if (playerStatus == '4') {
                    // alert(playerStatus);
                    clearInterval(interval1);
                    location.reload();
                    if (gameStatusCount >= 1) {
                        location.href = 'waiting';
                    }
                } else {
                    checkr1p1status();
                    checkr1p1gamestatuscount();
                    location.reload();
                }
            }, 1000);
        });

        function checkr1p1gamestatuscount() {
            return $.ajax({
                url: "round1p1started",
                type: "GET",
                success: function(data) {
                    var game_status = JSON.parse(data);
                    console.log(game_status);
                    $('#game_status_r1p1').val(game_status);
                }
            })
        }

        function checkr1p1status() {
            return $.ajax({
                url: "getr1p1playerStatus",
                type: "GET",
                success: function(data) {
                    var p_status = JSON.parse(data);
                    console.log(p_status);
                    $('#check_status_r1p1').val(p_status);
                }
            })
        }

        // function getr1p1waiting_status(){

        //     return   $.ajax({
        //         url: "getr1p1waitingcount",
        //         type: "GET",
        //         success: function(data) {
        //           var w_r1p1_count = JSON.parse(data);
        //           console.log(w_r1p1_count);
        //         //   $('#r1p1_waiting_count').val(w_r1p1_count);
        //         }
        //       })
        // }
    </script>
</body>


</html>