<?php include "./db.php"?>
<?php include "./header.php" ?>
<!-- Slider Start -->
<section class="main-slider">
    <div class="slider">
        <ul class="bxslider">
            <?php 
                $sql = "SELECT * from cover";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <li style="background-image:url(cover/img<?php echo $row['id']?>);">
                <div class="overlay"></div>
                <div class="content">
                    <div class="inner tar">
                        <div class="text">
                            <h2>
                                <?php echo $row['title']?>
                            </h2>
                            <p>
                                <?php echo $row['details']?>
                            </p>
                        </div>
                    </div>
                </div>
            </li>
            <?php }?>
        </ul>
    </div>
</section>
<!-- Slider End -->

<!-- Service Start -->

<section class="service-v1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Our Services</h2>
                    <p>We Are Here to Provide You Awesome Service Always</p>
                </div>
            </div>
        </div>

        <div class="row">

            <?php
            $sql = "SELECT * from service";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-sm-8 col-md-6 col-lg-4 overflow-hidden" style="padding: 25px 25px 25px 25px;">
                <a href="service.php?id=<?php echo $row['id']?>">
                    <div class="item">
                        <div class="department-content">
                            <img class="img-fullwidth" style="width: 40rem;  height: 30rem;overflow: hidden;"
                                src='data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['photo']); ?>' />
                        </div>
                        <div class="department-content" style="padding: 25px 25px 0px 0px;">
                            <h3 class="text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-heart-pulse" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053.918 3.995.78 5.323 1.508 7H.43c-2.128-5.697 4.165-8.83 7.394-5.857.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17c3.23-2.974 9.522.159 7.394 5.856h-1.078c.728-1.677.59-3.005.108-3.947C13.486.878 10.4.28 8.717 2.01L8 2.748ZM2.212 10h1.315C4.593 11.183 6.05 12.458 8 13.795c1.949-1.337 3.407-2.612 4.473-3.795h1.315c-1.265 1.566-3.14 3.25-5.788 5-2.648-1.75-4.523-3.434-5.788-5Zm8.252-6.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.5a.5.5 0 0 0 0 1H4a.5.5 0 0 0 .416-.223l1.473-2.209 1.647 4.118a.5.5 0 0 0 .945-.049l1.598-5.593 1.457 3.642A.5.5 0 0 0 12 9h3.5a.5.5 0 0 0 0-1h-3.162l-1.874-4.686Z" />
                                </svg>
                                <?php echo $row['title'] ?>
                            </h3>
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>

        </div>
    </div>
</section>
<!-- Service End -->


<!-- Department Start -->
<section class="department-v2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Our Departments</h2>
                    <p>We have All Major Departments to Serve Patients</p>
                </div>
            </div>
        </div>
        <div class="department-tab" style="background-color:white">
            <?php 
                $sql = "SELECT * from department";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
            <div class="tab-pane fade active in text-justify">
                <div class="row">
                    <div class="col-md-5">
                        <div class="department-content">
                        <h2><?php echo $row['name']?></h2>
                            <img class="img-fullwidth"
                                src='data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['photo']);?>' />
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="department-content">
                            <p><?php echo $row['description']?></p>
                            <p>Time: <?php echo $row['time']?></p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <?php }?>
        </div>
        <!-- Department Tab End -->
    </div>
</section>
<!-- Department End -->


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
                                <img style="width: 30rem;  height: 30rem;overflow: hidden;"
                                    src='data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['photo']);?>' />
                            </div>
                            <div class="overlay"></div>
                        </div>
                        <div class="text" style=" height: 10rem;overflow: hidden;">
                            <h3><a href="doctor-info.php?doctorid=<?php echo $row['id']?>"><?php echo $row['name']?></a>
                            </h3>
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