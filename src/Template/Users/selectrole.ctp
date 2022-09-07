<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
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
<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="icon" href="img/log.png">

  <!--  <title>NutFlix - admin</title>-->
  <!-- <style>
    .multipleSelection {
      width: 300px; 
      background-color: #BCC2C1;
    }

    .selectBox {
      position: relative;
    }

    .selectBox select {
      width: 100%;
      font-weight: bold;
    }

    .overSelect {
      position: absolute;
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
    }

    #checkBoxes {
      display: none;
      border: 1px #8DF5E4 solid;
    }

    #checkBoxes label {
      display: block;
    }

    #checkBoxes label:hover {
      background-color: #4F615E;
    }
  </style> -->


</head>

<body>
  <?php
        // print_r($user['email']);

  // print_r($userType_detail);
  ?>
  <!-- <div class="multipleSelection">
            <div class="selectBox" 
                onclick="showCheckboxes()">
                <select class="form-control" style="background-color:lightgrey;position: relative;top:5px;color:#009B91;font-weight:bold">
                    <option>Select Role</option>
                </select>
                <div class="overSelect"></div>
            </div>
  
            <div id="checkBoxes">
            <?php
            foreach ($userType_detail as $userType_details) {
              if ($userType_details['check_usertype'] == '1') { ?>
     <label for="first" style="background-color: #BCC2C1;">
                    <input type="checkbox" value="<?= $userType_details['id'] ?>" id="<?= $userType_details['id'] ?>" checked onclick="return false;"/>
                    <?php print_r($userType_details['type_name']); ?>
                </label> 
     <?php
              } else { ?>
 <label for="first">
                    <input type="checkbox" value="<?= $userType_details['id'] ?>" id="<?= $userType_details['id'] ?>"/>
                    <?php print_r($userType_details['type_name']); ?>
                </label> 
    <?php }
    ?>
   <?php
              // }
            }
    ?>  
</div>
</div> -->

  <div class="container-fluid">

    <div class="row">
      <div class="col-sm-4">

      </div>
      <div class="col-sm-4"><br><br><br><br>
        <div class="row">
          <div class="col-sm-10 offset-md-1">
            <span style="font-size: xx-large;font-weight: bold;color: #009B91;">Select Your Role</span>
          </div>
        </div><br>

        <?= $this->Form->create('', ['type' => 'POST', 'url' => ['action' => 'selectrole']]) ?>
        <div class="row">
          <div class="col-sm-10 offset-md-1">
            <div class="form-control welInputdtxt" style="box-shadow: 0 0 5pt 2pt #D3D3D3;outline-width: 0px;">
              <span style="position: relative;top: 10px;">Email</span>
              <span style="float: right !important;position: relative;top: 10px;">
                <input type="text" id="email_check" name="email" value="<?=$user['email'];?>" placeholder="Enter email" style="font-weight:bold;width:180px;" readonly>
              </span>
            </div>
          </div>
          <div class="col-sm-1"></div>
        </div><br>
        <div class="row">
          <div class="col-sm-10 offset-md-1">
            <div class="form-control welInputdtxt" style="box-shadow: 0 0 5pt 2pt #D3D3D3;outline-width: 0px;">
              <span style="position: relative;top: 10px;">Gamecode</span>
              <span style="float: right !important;position: relative;top: 10px;">
                <input type="text" id="gamecode_nameID" name="gamecode_name" value="<?=$user['gamecode_name'];?>" style="width: 180px;font-weight:bold" readonly>
                <input type="hidden" id="password_ID" name="password" value="<?=$user['gamecode_name'];?>">

              </span>
            </div>
          </div>
          <div class="col-sm-1"></div>
        </div><br>
        <div class="row">
          <div class="col-sm-10 offset-md-1">
            <div class="form-control welInputdtxt" style="box-shadow: 0 0 5pt 2pt #D3D3D3;outline-width: 0px;">
              <span style="position: relative;top: 10px;">Role</span>
              <span style="position: relative;top: 10px;" id="selected_roleID"></span>
            <input type="hidden" id="selected_roleIDhidden" name="user_type_id" value="">

              <span style="float: right !important;">
                <select  id="selectRoleDropdown" class="form-control" style="background-color:lightgrey;position: relative;top:5px;color:#009B91;font-weight:bold">
                  <!-- <?php
                  // foreach ($userType_detail as $userType_details) {
                    // if ($userType_details['check_usertype'] == '1') { 
                      ?>
                      ?>
                      <option value="<?= $userType_details['id'] ?>" style="background-color:#BCC2C1;" disabled><?php print_r($userType_details['type_name']); ?></option>
                    <?php
                    // } else {
                    ?>
                      <option value="<?= $userType_details['id'] ?>" style="background-color:white;"><?php print_r($userType_details['type_name']); ?></option>
                  <?php
                    // }
                  // }
                  ?> -->
                </select>
              </span>
            </div>
          </div>
          <div class="col-sm-1"></div>
        </div>

        <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-sm-6">
            <?php
            //      echo $this->Html->link(
            //     'Start',
            //     ['controller' => 'Users', 'action' => 'video'],
            //     ['class' => 'btn startbtn'],
            // ); 

            ?>
            <button class="btn startbtn" type="submit">Start</button>

          </div>
          <div class="col-sm-3"></div>
        </div><br>
        <?= $this->Form->end(); ?>
      </div>

      <div class="col-sm-2"></div>
    </div>
    <script>
          $(document).ready(function() {
            setInterval(function() {
              var gamecode_val = $("#gamecode_nameID").val();
            // alert(gamecode_val);
      // $("#gamecode_nameID").keyup(function() {
        if (gamecode_val !== "") {
  // alert("My input has a value!");
        var gamecode = $('#gamecode_nameID').val();
    $.ajax({
        url: "fetchRole",
        type: "POST",
        data:{
          gamecode_name:gamecode
        },
        success: function(data) {
          var fetch_usertype = JSON.parse(data);

  var formoption = "";
  formoption += "<option value='' style='background-color:white;'>"+'Select Options'+ "</option>";

          $.each(fetch_usertype,function(key, value)
                {
                  // alert(value['type_name']);
                  if(value['check_usertype'] == 0){
                    formoption += "<option value='" + value['id'] + "' style='background-color:white;'>" + value['type_name'] + "</option>";

                    // formoption += "<option value='" + value['id'] + "' style='background-color:#BCC2C1;' disabled>" + value['type_name'] + "</option>";
                    // $("#selectRoleDropdown").append('<option value=' + value['id'] + ' style="background-color:#BCC2C1;" disabled>' + value['type_name'] + '</option>');
                  }
                  // else{
                  //   formoption += "<option value='" + value['id'] + "' style='background-color:white;'>" + value['type_name'] + "</option>";
                  //   // $("#selectRoleDropdown").append('<option value=' + value['id'] + 'style="background-color:white;">' + value['type_name'] + '</option>');

                  // }
                });
                $('#selectRoleDropdown').html(formoption);
        }
      })
    }
    checkrole();
      }, 2000);  
      function checkrole() {
      var role_name = $('#selected_roleIDhidden').val();
      var game_name = $('#gamecode_nameID').val();
      return $.ajax({
        url: "checkuserrole",
        type: "POST",
        data: {
          user_type_id: role_name,
          gamecode_name : game_name
        },
        success: function(response) {
          var parsedJson = JSON.parse(response);
          var role_exist = parsedJson[0].user_type_id;
          if(role_exist)
          $('#selected_roleID').text('');
        }
      })
    }         
      });

          // });
          $(document).ready(function() {
          $('#selectRoleDropdown').change(function(){ 
    var selected_value = $(this).val();
    var selected_text = $('option:selected', this).text(); //to get selected text
    $('#selected_roleIDhidden').val(selected_value);
    $('#selected_roleID').text(selected_text);
});
});

</script>
</body>
</html>
<!-- var get_selected_value = $('#selected_roleID').text();

$("#selectRoleDropdown > option").each(function(index,element) {
 if(get_selected_value != element.text){
  //  alert('Not matched!')
  $('#selected_roleID').text('');
 }
 else{
   alert('Matched!');
   return false;
 }
}); -->


<!-- // $(document).ready(function() {
//             setInterval(function() {
//               var get_selected_value =   $('#selected_roleIDhidden').val();
// //  alert(get_selected_value);
// //  var exists = false;
// $('#selectRoleDropdown option').each(function(){
//     if (this.value != get_selected_value) {
//       $('#selected_roleID').val('');
//         // exists = true;
//         // alert(exists);
//         // return false;
//     }
//             }, 1000);           
//       });
//     }); -->

<!-- $('.startbtn2').on('click', function(){

var get_selected_value = $('#selected_roleID').text();

 $("#selectRoleDropdown > option").each(function(index,element) {
  if(get_selected_value != element.text){
    alert('Not matched!')
  }
  else{
    alert('Matched!')
  }
});
}); -->