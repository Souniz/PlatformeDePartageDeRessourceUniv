<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>AccueilSectionInformatique</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="../animate.css/animate.min.css" rel="stylesheet">
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../CSS/style.css" rel="stylesheet">
  <style> a:hover {
    font-weight:bold;
    font-style:italic;
  
  }</style>
</head>

<body>
  <header id="header" class="d-flex align-items-center fixed-top bg-primary text-light">
    <div class="container  d-flex justify-content-between align-items-center">

      <div class="logo ">
        <h1 class="card-header " style="font-family: algerian;">Section Informatique</h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="authentEtud.php">Espace Etudiant</a></li>
          <li><a  href="authentProf.php">Espace Enseignant</a></li>
          <li><a href="authentAdmi.php">Administrateur</a></li>
        </ul>
       
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="mt-5">
    <div class="hero-container ">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active" style="background-image: url(../image/slide-1.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown mt-4"><span class=" text-primary">Bienvenu à la Section Informatique</span></h2>
                <p class="animate__animated animate__fadeInUp ">Ce portail est destine aux Etudiants et aux Enseignents de la Section informatique pour la gestion des ressources <br>Merci de Choisir votre statut et de vous identifiez</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->
    <section id="featured" class="featured">
      <div class="container">

        <div class="row">
          <div class="col-lg-4">
            <div class="icon-box">
              <i><img class="bi-image-alt ms-5 rounded-circle" src="../bootstrap-icons/icons8-graduation-cap-48.png" alt="soun"></i>
              <h3><a href="authentEtud.php">Espace Etudiant</a></h3>
              <p>Les Eudiants peuvent consulter et telecharger des ressources et voir des infos concernant leur classe</p>
            </div>
          </div>
          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="icon-box">
              <i class=""><img class="ms-5 " src="../bootstrap-icons/icons8-directeur-d'école-48.png" alt=""></i>
              <h3><a href="authentProf.php" alt="sn">Espace Enseignant</a></h3>
              <p>Les Enseignants peuvent ajouter de nouvelles ressources et gerer leurs eventuelles classes</p>
            </div>
          </div>
          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="icon-box">
              <i class=""><img class="h-25 w-25 ms-5 " src="../bootstrap-icons/admin_gear.png" alt=""></i>
              <h3><a href="authentAdmi.php">Espace Administrateur</a></h3>
              <p>C'est pour l'administarteur qui gere la plateforme c'est a dire les classes , les Etudiants ainsi que les professeurs</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Featured Section -->
   <?php
    echo"<!-- Footer -->
    <footer class=\"text-center text-lg-start bg-white text-muted\">
      <!-- Section: Social media -->
      <section class=\"d-flex justify-content-center justify-content-lg-between p-4 border-bottom\">
        <!-- Left -->
        <div class=\"me-5 d-none d-lg-block\">
          <span>Connectez-vous avec nous via nos plateformes:</span>
        </div>
        <!-- Left -->
    
        <!-- Right -->
        <div>
          <a href=\" class=\"me-4 link-secondary\">
            <i class=\"fab fa-facebook-f\"></i>
          </a>
          <a href=\" class=\"me-4 link-secondary\">
            <i class=\"fab fa-twitter\"></i>
          </a>
          <a href=\" class=\"me-4 link-secondary\">
            <i class=\"fab fa-google\"></i>
          </a>
          <a href=\" class=\"me-4 link-secondary\">
            <i class=\"fab fa-instagram\"></i>
          </a>
          <a href=\" class=\"me-4 link-secondary\">
            <i class=\"fab fa-linkedin\"></i>
          </a>
          <a href=\" class=\"me-4 link-secondary\">
            <i class=\"fab fa-github\"></i>
          </a>
        </div>
        <!-- Right -->
      </section>
      <!-- Section: Social media -->
    
      <!-- Section: Links  -->
      <section class=\">
        <div class=\"container text-center text-md-start mt-5\">
          <!-- Grid row -->
          <div class=\"row mt-3\">
            <!-- Grid column -->
            <div class=\"col-md-3 col-lg-4 col-xl-3 mx-auto mb-4\">
              <!-- Content -->
              <h6 class=\"text-uppercase fw-bold mb-4\">
                <i class=\"fas fa-gem me-3 text-secondary\"></i>Section Informatique
              </h6>
              <p>
               Dans notre section vous pouvez beneficier d'une formation de qualite avec
               les prix les plus abordable.Votre Satisfation est notre plus grande priorite!
               Alors qu'attentez-vous!
              </p>
            </div>
            <!-- Grid column -->
    
            <!-- Grid column -->
            <div class=\"col-md-2 col-lg-2 col-xl-2 mx-auto mb-4\">
              <!-- Links -->
              <h6 class=\"text-uppercase fw-bold mb-4\">
                FORMATION
              </h6>
              <p>
                Licence I,II,III
              </p>
              <p>
                Master RESEAUX
              </p>
              <p>
               Master SIR
              </p>
              <p>
                Master BI
              </p>
            </div>
            <!-- Grid column -->
    
            <!-- Grid column -->
            <div class=\"col-md-3 col-lg-2 col-xl-2 mx-auto mb-4\">
              <!-- Links -->
              <h6 class=\"text-uppercase fw-bold mb-4\">
                Liens Utiles
              </h6>
              <p>
                <a href=\"https://www.ucad.sn/\" class=\"text-reset\">Plateforme UCAD</a>
              </p>
              <p>
              <a href=\"https://fad.fst.ucad.sn/\" class=\"text-reset\">Faculte des Sciences et Techniques</a>
                
              </p>
             
              <p>
                <a href=\"https://www.plume-unaves.com/\" class=\"text-reset\">Section-Informatique</a>
              </p>
             
            </div>
            <!-- Grid column -->
    
            <!-- Grid column -->
            <div class=\"col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4\">
              <!-- Links -->
              <h6 class=\"text-uppercase fw-bold mb-4\">Contact</h6>
              <p><i class=\"fas fa-home me-3 text-secondary\"></i>Dakar,UCAD, FST</p>
              <p>
                <i class=\"fas fa-envelope me-3 text-secondary\"></i>
               plumeunaves@gmail.com
              </p>
              <p><i class=\"fas fa-phone me-3 text-secondary\"></i>+221 77 573 89 03</p>
              <p><i class=\"fas fa-print me-3 text-secondary\"></i>+221 77 143 90 17</p>
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->
    
      <!-- Copyright -->
      <div class=\"text-center p-4\" style=\"background-color: rgba(0, 0, 0, 0.025);\">
        © 2022 Copyright  SectionInformatique Designed by Asta&Souna  Tous droits reservés
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
        
    </body>
    </html>";
    ?>
</body>

</html>