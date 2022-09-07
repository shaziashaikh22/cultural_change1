<!DOCTYPE html>

<html>

<head>
    <!-- <style>
       
    </style> -->
        <?= $this->Html->css('tabs.css') ?>
        
        <?php echo $this->Html->script('jquery-survey1.3.2.min');?>

      <?php echo $this->Html->script('jquery-survey-ui-1.7.custom.min');?>

    <script>
        $(function() {

var $tabs = $('#tabs').tabs();

$(".ui-tabs-panel").each(function(i){

  var totalSize = $(".ui-tabs-panel").size() - 1;

  if (i != totalSize) {
      next = i + 2;
         $(this).append("<a href='#' class='next-tab mover' rel='" + next + "'>Next  &#187;</a>");
  }

  if (i != 0) {
      prev = i;
         $(this).append("<a href='#' class='prev-tab mover' rel='" + prev + "'>&#171; Prev </a>");
  }

});

$('.next-tab, .prev-tab').click(function() { 
       $tabs.tabs('select', $(this).attr("rel"));
       return false;
   });


});
        </script>
</head>

<body><br><br><br>
<div id="page-wrap">
		
		<div id="tabs">
		
    		<ul>
			<?php foreach($plyers_surveyQuestionsList as $plyers_surveyQuestions){ ?>
        		<li><a href="#fragment-<?=$plyers_surveyQuestions['id'];?>"><?=$plyers_surveyQuestions['id'];?></a></li>
        		<!-- <li><a href="#fragment-2">2</a></li>
        		<li><a href="#fragment-3">3</a></li>
        		<li><a href="#fragment-4">4</a></li>
        		<li><a href="#fragment-5">5</a></li>
        		<li><a href="#fragment-6">6</a></li> -->
				<?php   } ?>
        		<li><a href="#fragment-10">10</a></li>

    	   </ul>
		   <?= $this->Form->create('', ['type' => 'POST','url' => ['action' => 'surveyquestion']]) ?>

		   <?php foreach($plyers_surveyQuestionsList as $plyers_surveyQuestions){ ?>
<div id="fragment-<?=$plyers_surveyQuestions['id'];?>" class="ui-tabs-panel">
<p style="color: #009B91;font-size: medium;font-weight: bold;">
<?php print_r($plyers_surveyQuestions['question_txt']); ?>
</p>  

<input type="hidden" name="player_survey_question_id[]" value="<?=$plyers_surveyQuestions['id'];?>" id="id-<?=$plyers_surveyQuestions['id'];?>">
<!-- <input type="hidden" name="user_type_id[]" value="" id="user_type_id-<?=$plyers_surveyQuestions['id'];?>">
<input type="hidden" name="user_id[]" value="" id="user_id-<?=$plyers_surveyQuestions['id'];?>">
<input type="hidden" name="online_game_id[]" value="" id="gamecode-<?=$plyers_surveyQuestions['id'];?>">
<input type="hidden" name="status[]" value="" id="status-<?=$plyers_surveyQuestions['id'];?>"> -->
<!-- <input type="hidden" name="answer_txt[]" value="" id="answer-<?=$plyers_surveyQuestions['id'];?>"> -->

<input type="text" class="form-control" name="answer_txt[]" value="" id="answer-<?=$plyers_surveyQuestions['id'];?>">

<!-- <input type="radio" id="yes" name="fav_language" value="yes">
<label for="yes" style="color: #009B91;font-size: medium;font-weight: bold;">YES</label><br>
<input type="radio" id="no" name="fav_language" value="no">
<label for="no" style="color: #009B91;font-size: medium;font-weight: bold;">NO</label><br> -->
</div>
		<?php   } ?>    
        	<div id="fragment-10" class="ui-tabs-panel ui-tabs-hide">
            <p>The end.</p>
			<button class="btn btn-primary" type="submit">Submit</button>

        	</div>
			<?= $this->Form->end();?>      

        </div>
		
	</div>
    
</body>
</html>