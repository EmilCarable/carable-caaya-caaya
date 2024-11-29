 <!-- JUMBOTRON -->
 <div class="jumbotron" style="border-radius: 30px; border: 1px solid blue; background: rgb(0,228,255);
background: radial-gradient(circle, rgba(0,228,255,1) 0%, rgba(0,130,188,1) 50%); padding:0%;">
  <!-- ####################################### BS CAROUSEL ############################################ -->
  <?php
      require_once 'pdoconn.php';

      // Retrieve carousel data from the database
      $stmt = $conn->prepare("SELECT * FROM facilities ORDER BY facility_id DESC");
      $stmt->execute();
      $carouselItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <!-- carousel -->
    <div class="container">
    <div class="col-xs-12">

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
    
        <!-- Wrapper for slides -->
        <div class="carousel-inner">

          <div class="item active">
                      
            <img src="./image/atlas.jpg" class="center-block img-rounded "  alt="Front Image" width="670px" height="670px">
            <div class="carousel-caption">
              <p>All Facilities at next slide</p>
            </div>
            
            
          </div>
    

          <?php foreach ($carouselItems as $item): ?>
            <div class="item">
               
                <img src="<?php echo $item['facility_image']; ?>" class="img-responsive img-rounded center-block" 
                alt="<?php echo $item['facility_name']; ?>" height="500px" width="500">
                <div class="carousel-caption " >
                  <p style="text-shadow: 2px 2px 5px blue;">
                    <?php echo $item['facility_name']; ?>
                  </p>
                </div>
                
             </div>
           <?php endforeach; ?>


        </div>
        <!-- Wrapper for slides -->

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
       </div>
       
       </div>
    </div>
      <!-- carousel -->
  <!-- ####################################### BS CAROUSEL ############################################ -->
  </div><!-- JUMBOTRON -->