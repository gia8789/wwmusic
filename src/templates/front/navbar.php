    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" id ="navigazione">
      <div class="container">
        <a class="navbar-brand" href="#"><i><b>🎸 wwMusic 🎸</b></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <i class="material-icons">menu</i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">HOME
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="index.php?filter=0&id=0">CATALOGO</a>
            </li>
            <!--<li class="nav-item active">
              <a class="nav-link" href="#">CONTATTI</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">REGISTRATI</a>
            </li>-->
            <?php
            if(!isset($_SESSION['user']) ) {
            ?>
              <li class="nav-item active">
                <a class="nav-link" href="loginPage.php">ACCEDI</a>
              </li>

            <?php 
            } else {
            ?>
              <li class="nav-item active">
                <a class="nav-link" href="logout.php">LOGOUT</a>
              </li>

              <li class="nav-item active">
                <a class="nav-link" href="admin/index.php">AMMINISTRAZIONE</a>
              </li>
            
            <?php
            }
            ?>
            <li class="nav-item active">
              <a class="nav-link" href="shoppingCart.php">CARRELLO</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>