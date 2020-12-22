<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Rank list</title>
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
  <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>


  <style>
  .tableFixHead    { overflow-y: auto; height: 100px; }
  .tableFixHead th { position: sticky; top: 0; }

  /* Just common table stuff. Really. */
  table  { border-collapse: collapse; width: 100%; }
  th, td { padding: 8px 16px; }
  th     { background:  #C0C0C0; }
  tr:nth-child(even) {
  background-color: #f2f2f2
}
</style>

</head>




<body>

  <div class=container>
    <div class="row">
      <div class="col-12">
        <h3 align="center" style="margin-top: 20px">Rank List</h3>
        <h5 align="center" style="margin-top: 20px"><?php echo $yourRank?></h5>
      </div>
    </div>
  </div>
  <br/>

  <div class="container">
    <div class="row" style="margin-bottom: 50px">
      <div class="col-1"></div>
      <div class="col-10">
        <div class="tableFixHead" style="height: 350px;overflow-x:auto; overflow-y: auto;">

          <table class="table" >
            <thead>
              <tr>
                <th scope="col">Rank</th>
                <th scope="col">Username</th>
                <th scope="col">Average Speed</th>
                <th scope="col">Best Speed</th>
                <th scope="col">Average Accuracy</th>

              </tr>
            </thead>
            <tbody>

              <?php 
              $sl=1;

              foreach ($ranklist as $res){
                if("Your rank is #".$sl==$yourRank)
                  echo '<tr style="background-color: #ABEBC6;">';
                else
                  echo '<tr>';
                echo '<td><b>#'.$sl.'</b></td>';
                echo '<td>'.$res->userName.'</td>';
                echo '<td>'.number_format((float) $res->avgSpeed, 2, '.', '').' wpm</td>';
                echo '<td>'.$res->bestSpeed.' wpm</td>';
                echo '<td>'.number_format((float) $res->avgAccuracy, 2, '.', '').'%</td>';
                echo '</tr>';
                $sl++;
              }
              ?>

            </tbody>
          </table>

        </div>
      </div>
      <div class="col-1"></div>

    </div>
  </div>
  <br/><br/>
</body>
</html>