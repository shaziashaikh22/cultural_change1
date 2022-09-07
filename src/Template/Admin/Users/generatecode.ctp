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
 <style>
     .pointnone{
  pointer-events: none;
}

 th {
    cursor: pointer;
        color: #007bff;

}
 </style>
</head>
<body>

<div class="container-fluid">
   <div class="row">
   <div class="col-sm-4">
    <?php 
    echo $this->Html->link('Back',
    ['controller' => 'Users', 'action' => 'dashboard'],['class' => 'btn backbtn']);
            ?>
    </div>
    <div class="col-sm-4">
    <input type="text" class="form-control hostgamebtn" id="setvalue" value="" name="game_code"/>
    <button class='btn hostgamebtn' id="getcode">GENERATE CODE </button>
    <?php 
    echo $this->Html->link('START',
    ['controller' => 'Users', 'action' => 'dashboard'],['class' => 'btn startbtn']);
            ?>
    <!-- <button class='btn startbtn'>START</button> -->
    </div>

    <div class="col-sm-4"></div>
  </div>
</div>

<script>
    $(document).ready(function(){
    var btntext = $('#getcode').text();
    $('#setvalue').hide();
});

    function randomString(length, chars) {
    var result = '';
    for (var i = length; i > 0; --i) result += chars[Math.round(Math.random() * (chars.length - 1))];
    return result;
}

$( "#getcode" ).click(function() {
var codevalue = randomString(6, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
$('#getcode').hide();
$('#setvalue').val(codevalue);
$('#setvalue').show();

});
</script>

<!-- <script>
  $('.startbtn').on('click', function() {
      var code = $("#setvalue").val();

      $.ajax({
        url: "generatecode",
        type: "POST",
        data: {
          game_name: code,
        },
        success: function(data) {
          // $('.table-hover').html(data);

        }
      })
    })
  </script> -->
</body>
</html>

