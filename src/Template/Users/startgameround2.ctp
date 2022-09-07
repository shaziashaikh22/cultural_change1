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
    <input type="hidden" id="check_status_r2p1" value="">
    <input type="hidden" id="game_status_r2p1" value="">
    <input type="hidden" id="game_status" name="game_status" value="Started">

    <!-- check user should be on waiting screen -->
    <input type="hidden" id="waiting_screenID" name="waiting_screen" value="21">

    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>

            <div class="col-sm-6">
                <br> <br> <br> <br>
                <?php
                //  print_r($userType_detail);
                //  print_r($totalgamecode);
                ?>
                <div class="row">
                    <div class="col-sm-12" style="text-align:center;">
                    <span style="color: #009B91;font-weight: bold;padding: 0.375rem 0.75rem;width: -webkit-fill-available;font-size: larger;">
                 Proceed with Round 2 - Planning Phase   
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
                <?php foreach ($userType_detail as $userType_details) { ?>
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
                        if ($totalgamecode == 4 && $total_r2p1_waitingcnt == 4) {
                            echo $this->Html->link(
                                'Start Game',
                                ['controller' => 'Users', 'action' => 'waiting3'],
                                ['class' => 'btn txt2 allready', 'style' => 'border: 2px solid;
                            text-align: center;']
                            );
                        } else {
                            echo $this->Html->link(
                                'Start Game',
                                ['controller' => 'Users', 'action' => 'waiting3'],
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
            Waiting for other players to join.
        </span>
                    </div>
                </div><br>
            </div>

            <div class="col-sm-2 offset-md-1">
                <br>
                <?php
                // echo $this->Html->link(
                //     'Log out',
                //     ['controller' => 'Users', 'action' => 'logout'],
                //     ['class' => 'btn btn-primary']

                // );
                 ?>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var waitingscrnval = $('#waiting_screenID').val();
            $.ajax({
                url: "updatewaitingscreenr2p1",
                type: "POST",
                data: {
                    waiting_screen: waitingscrnval,
                },
                success: function(data) {}
            })
        });
    </script>
    <script>
        $(document).ready(function() {
            checkr1p1status();
            checkr2p1gamestatuscount();

            var interval1 = setInterval(function() {
                var playerStatus = $('#check_status_r2p1').val();
                var gameStatusCount = $('#game_status_r2p1').val();
                // alert(gameStatusCount);
                if (playerStatus == '4') {
                    clearInterval(interval1);
                    location.reload();
                    if (gameStatusCount >= 1) {
                        location.href = 'waiting3';
                    }
                } else {
                    checkr1p1status();
                    checkr2p1gamestatuscount();
                    location.reload();
                }
            }, 1000);

            $('.allready').on('click', function() {
                // alert('m');
                var game_status_val = $('#game_status').val();
                $.ajax({
                    url: "updater2p1gamestatus",
                    type: "POST",
                    data: {
                        game_status: game_status_val
                    },
                    success: function(data) {}
                })
            })
        });

        function checkr1p1status() {
            return $.ajax({
                url: "getr2p1playerStatus",
                type: "GET",
                success: function(data) {
                    var p_status = JSON.parse(data);
                    console.log(p_status);
                    $('#check_status_r2p1').val(p_status);
                }
            })
        }


        function checkr2p1gamestatuscount() {
            return $.ajax({
                url: "round2p1started",
                type: "GET",
                success: function(data) {
                    var game_status = JSON.parse(data);
                    console.log(game_status);
                    $('#game_status_r2p1').val(game_status);
                }
            })
        }
    </script>
</body>


</html>