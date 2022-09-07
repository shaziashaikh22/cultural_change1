<!DOCTYPE html>

<html>

<head>
    <style>
       body{
		   background-color: white;
	   }
	   progress {
  border: 2px solid lavender;
  /* width: auto;  */
 }

 /* progress {
  color: lightblue;
} */

progress::-moz-progress-bar {
  background: lightcolor;
} 

progress::-webkit-progress-value {
  background: #009B91;
}

progress::-webkit-progress-bar {
  background: white;
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
      
        </script>
</head>

<body><br>
	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<button class="btn btn-primary" style="pointer-events: none;width: -webkit-fill-available;">SUMMARY</button>
			</div>
		</div>
			<br><br>
		<div class="row">
			<div class="col-md-4">
				<span style="color: #009B91;font-size: large;font-weight: bold;">Second Round Faster</span>
			</div>
			<div class="col-md-5">
			<progress id="surveyquestionID" value="80" max="100" style="padding: 7px;width: -webkit-fill-available;height: 50px;"> 32% </progress>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-4">
				<span style="color: #009B91;font-size: large;font-weight: bold;">Less Mistakes</span>
			</div>
			<div class="col-md-5">
			<progress id="surveyquestionID" value="60" max="100" style="padding: 7px;width: -webkit-fill-available;height: 50px;"> 32% </progress>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-4">
				<span style="color: #009B91;font-size: large;font-weight: bold;">Closer to Requirements</span>
			</div>
			<div class="col-md-5">
			<progress id="surveyquestionID" value="80" max="100" style="padding: 7px;width: -webkit-fill-available;height: 50px;"> 32% </progress>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-4">
				<span style="color: #009B91;font-size: large;font-weight: bold;">Transparent Information Flow</span>
			</div>
			<div class="col-md-5">
			<progress id="surveyquestionID" value="50" max="100" style="padding: 7px;width: -webkit-fill-available;height: 50px;"> 32% </progress>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-4">
				<span style="color: #009B91;font-size: large;font-weight: bold;">Real-time change possible</span>
			</div>
			<div class="col-md-5">
			<progress id="surveyquestionID" value="90" max="100" style="padding: 7px;width: -webkit-fill-available;height: 50px;"> 32% </progress>
			</div>
		</div>

		<div class="row"><div class="col-md-2 offset-md-9">
                <div class="btn btn-primary tooltip2">
                <?php
                echo $this->Html->link(
                    'NEXT',
                    ['controller' => 'Users', 'action' => 'lastvideo'],['style'=>'color:white']
                );
                ?>
            <div class="bottom">
              <p style="color: white;">Click next to watch video conclusion.</p>
            </div>
          </div>
               
                </div></div>
	</div>

    
</body>
</html>