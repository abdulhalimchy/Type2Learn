<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Typing View</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

	<style>
	#txtArea {
		border-radius: 25px;
		border: 4px solid #17a2b8;
		padding: 20px;
		width: 500px;
		height: 220px;
	}

	.unselectable {
		-moz-user-select: -moz-none;
		-khtml-user-select: none;
		-webkit-user-select: none;
		-o-user-select: none;
		user-select: none;
		overflow-wrap: break-word;
		overflow-y: scroll;
	}

	::-webkit-scrollbar {
		width: 0px;  /* Remove scrollbar space */
		background: transparent;  /* Optional: just make scrollbar invisible */
	}
	/* Optional: show position indicator in red */
	::-webkit-scrollbar-thumb {
		background: #FF0000;
	}
</style>
</head>
<body>
	<div class=container>
		<div class="row">
			<div class="col-12">
				<h3 align="center" style="margin-top: 20px">Test your typing Speed</h3>
			</div>
		</div>
	</div>
	<br/>

	<div class=container>
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8" align="center">
				<label id="timer" style="font-weight: 600; font-size: 14pt;">Timer: 00:00:00</label>
			</div>
			<div class="col-2"></div>
		</div>
	</div>

	<div class=container>
		<div class="row">
			<div class="col-12">
				<label id="runningSpeed" style="display: none;text-align: center; font-weight: 600; font-size: 15pt;">Running Speed: 23 WPM</label>
			</div>
		</div>
	</div>
	<div class=container>
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8" align="center">
				<div id="txtArea" unselectable="on" class="unselectable"><?php $str=$text;$len=strlen($str);for($i=0; $i<$len; $i++){echo "<span id=id".$i." style='font-weight: 500; font-size: 13pt'>".$str[$i]."</span>";}?></div>
				<br/>
				<input class="form-control" type="text" id="txtField" oninput="updateColor()" placeholder="type to start" style=" border: 4px solid #17a2b8; height: 42px; width: 500px;">
			</div>
			<div class="col-2"></div>
		</div>
	</div>

	<div class=container>
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8" align="center">
				<label id="speed" style="font-weight: 500; font-size: 13pt; display: none">Speed: 23 WPM</label>
				<br/>
				<a id="restart" class="btn btn-info" href="<?php echo base_url();?>typing-speed" style="display: none; margin-bottom: 50px;">restart</a>
				<label id="accuracy" style="font-weight: 500; font-size: 13pt; display: none">Accuracy: 95%</label>
				<br/><br/>

				<a id="tryagain" class="btn btn-info" href="<?php echo base_url();?>typing-speed" style="display: none">try again</a>
			</div>
			<div class="col-2"></div>
		</div>
	</div>
	<br/>
	<br/>
	<br/>
	<!-- <span id="testSpan">sdfj</span> -->

	<script type="text/javascript">
		

		var cnt=0;
		var curPos=0;
		var txt="";
		var typedTxt="";
		var flag=false;
		var runningSpeed = document.getElementById("runningSpeed");
		var spd= document.getElementById("speed");
		var accry= document.getElementById("accuracy");
		var tryagain= document.getElementById("tryagain");
		var restart= document.getElementById("restart");
		var txtField = document.getElementById("txtField");


		function updateColor() {

			if(flag==false)
			{
				flag=true;
				showElements();
				startTimer();

			}
			var txtArea = document.getElementById("txtArea");
			// var testSpan = document.getElementById("testSpan");
			
			txt = txtArea.textContent;
			typedTxt=txtField.value;
			cnt=typedTxt.length;
			
			curPos=0;
			for(i=0; i<txt.length; i++)
			{
				var spn = document.getElementById("id"+i);
				if(txt[curPos]==typedTxt[i] && curPos==i)
				{
					spn.style.color="green";
					curPos++;
				}
				else if(i<cnt)
				{
					spn.style.color="red";
				}
				else
				{
					spn.style.color="black";
				}
			}

			if(curPos==txt.length)
			{
				stopTimer();
				setSpeedAndAccuracy();
				hideElements();
				showAfterComplete();
				txtField.value="";

			}
		}

		function setEverything()
		{
			cnt=0;
			curPos=0;
			flag=false;
			txtField.value="";

		}

		function hideElements()
		{
			runningSpeed.style.display="none";
			txtField.style.display="none";
			restart.style.display="none";

		}

		function showAfterComplete()
		{
			spd.style.display="inline";
			accry.style.display="inline";
			tryagain.style.display="inline";

		}

		function hideAfterTryAgain()
		{
			spd.style.display="none";
			accry.style.display="none";
			tryagain.style.display="none";
		}

		function showElements()
		{
			runningSpeed.style.display="block";
			txtField.style.display="block";
			restart.style.display="inline";

		}

		var hr = 0;
		var min = 0;
		var sec = 0;
		var timerId;

		function stopTimer()
		{
			clearTimeout(timerId);
		}

		function clearTimer()
		{
			clearTimeout(timerId);
			sec=0;
			min=0;
			hr=0;
			setTimer();
		}

		function setTimer()
		{
			var timer = document.getElementById("timer");
			var str="Timer: ";
			if(hr<10)
				str+="0";
			str+=hr+":"
			if(min<10)
				str+="0";
			str+=min+":";
			if(sec<10)
				str+="0";
			str+=sec;
			timer.textContent=str;
		}

		function startTimer() {
			if (sec == 60) {
				min++;
				sec = 0;
			}
			if (min == 60) {
				hr++;
				min = 0;
			}

			timerId = setTimeout("startTimer()", 1000);
			setTimer();
			sec++;
			setRunningSpeed();
		}

		function setRunningSpeed()
		{
			var second=(hr*3600)+(min*60)+sec;
			var speed=parseInt((curPos/5.0)/(second/60.0));
			runningSpeed.textContent="Running Speed: "+speed+" WPM";
		}

		

		function setSpeedAndAccuracy()
		{
			var second=(hr*3600)+(min*60)+sec;
			var speed=parseInt((curPos/5.0)/(second/60.0));
			var acc = curPos/txt.length;
			acc = (acc*100).toFixed(2);
			spd.textContent="Speed: "+speed+" WPM";
			accry.textContent="Accuracy: "+acc+"%";

			//:::::::::::::sending for saving to database:::::::::
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>"+"/Home_Controller/save_speed_acc",
				data: {"speed": speed, "acc": acc}, 
				success: function (data) {
				}
			});

		}
	</script>

</body>
</html>