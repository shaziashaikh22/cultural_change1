<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown" style="padding-top:5%">
  <div id="formContent" style="padding-top:4%">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="<?php echo $this->request->webroot; ?>img/logomain.png" class="main-logo" width="150" alt="Awesome Image" />
    </div>

    <?= $this->Form->create(); ?>
    <input type="text" id="login" class="fadeIn second" name="email" placeholder="Email">
    <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
    <input type="submit" class="fadeIn fourth" value="Log In" style="background-color: #009B91;">
    <?= $this->Form->end(); ?>

    <div id="formFooter">
      <?php
      // echo $this->Html->link("I forgot my password",['controller'=>'Users','action'=>'forgotpasswordweb']);
      ?>

    </div>

  </div>
</div>
<script>
$(document).ready(function() {
  $('.fourth').on('click', function(){
    var getoldpassword = $('#password').val();
    localStorage.setItem("password",getoldpassword);
  })

});
</script>