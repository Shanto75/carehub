<?php include "./db.php"?>
<?php include "./header.php" ?>

<!-- Banner Start -->
<div class="page-banner" style="background-image: url(./img/cover)">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-text">
                    <h1>About Us</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<section class="about-v2">
    <div class="container">
        <div class="row" style="max-width:70rem; margin: auto;">
            <?php 
                $sql = "SELECT about from info";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
            ?>
            <div class="col-md-12 text-justify">
                <p><?php echo $row['about']?></p>
            </div>
        </div>
    </div>
</section>

<!-- Doctors End -->
<?php include "./footer.php" ?>