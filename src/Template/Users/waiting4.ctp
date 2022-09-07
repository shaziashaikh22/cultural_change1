
<html>

<style>

.count
{
  /* line-height: 100px; */
  color:#009B91;
  /* margin-left:30px; */
  font-size:45px;
  font-weight: bold;
}


</style>


<body>
    <br><br><br><br><br><br><br><br><br><br><br>
<div class="container">
<div class="row"> 
<div class="col-md-3 offset-md-5"><span class="count" id="showtime"></span><span style="color:#009B91;font-size:45px;font-weight: bold;">..</span></div>
</div>
</div>
    <!-- check players status -->
<script>
      $(document).ready(function() {
        function secondsToTime(secs) {
          // var hours = Math.floor(secs / (60 * 60));
          var divisor_for_minutes = secs % (60 * 60);
        //   var minutes = Math.floor(divisor_for_minutes / 60);
          var divisor_for_seconds = divisor_for_minutes % 60;
          var seconds = Math.ceil(divisor_for_seconds);
        //   return minutes + ':' + seconds;
          return seconds;
        }
          function countDown(endTime) {
            if (endTime > 0) {
              $('#showtime').text(secondsToTime(endTime));
              setTimeout(function() {
                countDown(endTime - 1);
              }, 1000);
            } else {
                location.href = 'round2phase2';
            }
          }
          countDown(3);
      })
     </script>
</body>
</html>