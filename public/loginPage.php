<?php 
require_once "../src/config.php";
include FRONTEND . "header.php";
?>

<div class="container" style="height:650px">
      
      <div class="d-flex justify-content-center" style="margin-top:100px">
          <div class="card">
              <div class="card-header">
                  <h3>Accedi</h3>
              </div>
              <div class="card-body">
                  <form action = "login.php" method = "POST">
                      <div class="input-group form-group">
                          <input type="text" class="form-control" name="username" placeholder="username">
                      </div>
                      <div class="input-group form-group">
                          <input type="password" class="form-control" name="password" placeholder="password">
                      </div>
                      <div class="form-group" style="margin-top: 30px">
                          <input type="submit" value="Accedi" class="btn float-right login_btn">
                      </div>
                  </form>
              </div>
              <div class="card-footer">
                  <div class="d-flex justify-content-center links">
                      <a href="index.php"> Torna alla Home </a>
              </div>
          </div>
      </div>
  </div>


  <div style="margin-top:50px">

  <?php
  if(isset($_GET['fail']) )

    echo "<center> <h2> Dati inseriti non corretti </h2> </center>";
  ?>

  </div>