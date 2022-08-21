<?php include "./db.php"?>
<?php include "./header.php" ?>

<!-- Banner Start -->
<div class="page-banner" style="background-image: url(./img/cover)">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-text">
                    <h1>Doctors</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->


<!-- Doctors Start -->
<section class="doctor-v1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Our Expert Doctors</h2>
                    <p>Meet with All Our Qualified Doctors</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <!-- Doctor Carousel Start -->
                <div class="doctor-carousel">
                    <?php
                        $sql = "SELECT * from doctor";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {?>
                    <div class="item">
                        <div class="thumb">
                            <div class="photo">
                                <img style="weight: 20rem;  height: 30rem;overflow: hidden;" src='data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['photo']);?>' />
                            </div>
                            <div class="overlay"></div>
                        </div>
                        <div class="text" style=" height: 10rem;overflow: hidden;">
                            <h3><a href="doctor-info.php?doctorid=<?php echo $row['id']?>"><?php echo $row['name']?></a></h3>
                            <p><?php echo $row['title']?></p>
                        </div>
                    </div>
                    <?php }?>
                </div>
                <!-- Doctor Carousel End -->
            </div>
        </div>
    </div>
</section>
<!-- Doctors End -->

<?php include "./footer.php" ?>