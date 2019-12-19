<?php require_once("../../src/config.php");  ?> 
<?php require_once("../../src/functions.php"); ?>
 <?php include(BACKEND . "header.php"); ?>  

<!-- INIZIO INDEX -->
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Amministrazione

                           <?php
                           if($_SESSION['user'] == 'fakeadmin')
                                echo " (versione demo): i dati non verranno modificati";
                           ?> 
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="material-icons">dashboard</i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <?php 
                if($_SERVER['REQUEST_URI'] == "/wwmusic/public/admin/" || $_SERVER['REQUEST_URI'] == "/wwmusic/public/admin/index.php" ){

                    include(BACKEND . "/content.php");
                }

                if(isset($_GET['orders'])){
                    include(BACKEND . "/orders.php");
                }

                if(isset($_GET['prod-admin'])){
                    include(BACKEND . "/prod-admin.php");
                }

                if(isset($_GET['add-pdt'])){
                    include(BACKEND . "/add-pdt.php");
                }

                if(isset($_GET['update-pdt'])){
                    include(BACKEND . "/update-pdt.php");
                }

                if(isset($_GET['delete-pdt'])){
                    include(BACKEND . "/delete-pdt.php");
                }



                if(isset($_GET['categ-admin'])){
                    include(BACKEND . "/categ-admin.php");
                }
                if(isset($_GET['reports'])){
                    include(BACKEND . "/reports.php");
                }

                ?>
               

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
  
    
    <?php include(BACKEND . "/footer.php"); ?>
