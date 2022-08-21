<?php include "./db.php" ?>
<?php include "./header.php" ?>

<!-- Banner Start -->
<div class="page-banner" style="background-image: url(./img/cover)">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-text">
                    <h1>Service</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->


<!-- Service Start -->

<section class="service-v1">
    <div class="container">

        <?php if (isset($_GET['id']) && $_GET['id'] != 'all') { ?>

            <div class="department-tab" style="background-color:white">
                <?php
                $id = $_GET['id'];
                $sql = "SELECT * from  service where id=$id";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                ?>
                <div class="tab-pane fade active in text-justify">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="department-content">
                                <img class="img-fullwidth" src='data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['photo']); ?>' />
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="department-content">
                                <h2><?php echo $row['title'] ?></h2>
                                <p><?php echo $row['description'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        <?php } ?>

        <?php if (isset($_GET['id']) && $_GET['id'] == 'all') { ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>Our Services</h2>
                        <p>We Are Here to Provide You Awesome Service Always</p>
                    </div>
                </div>
            </div>

            <div class="department-tab" style="background-color:white">
                <?php
                $id = $_GET['id'];
                $sql = "SELECT * from  service";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="tab-pane fade active in text-justify" style="padding: 25px 25px 25px 25px;">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="department-content">
                                    <img class="img-fullwidth" src='data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['photo']); ?>' />
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="department-content">
                                    <h2><?php echo $row['title'] ?></h2>
                                    <p><?php echo $row['description'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <hr>
            </div>
        <?php } ?>

        <?php if (isset($_GET['id']) && $_GET['id'] != 'all') { ?>
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
                        <a href="service.php?id=<?php echo $row['id'] ?>">
                            <div class="item">
                                <div class="department-content">
                                    <img class="img-fullwidth" style="width: 40rem;  height: 30rem;overflow: hidden;" src='data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['photo']); ?>' />
                                </div>
                                <div class="department-content" style="padding: 25px 25px 0px 0px;">
                                    <h3 class="text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-pulse" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053.918 3.995.78 5.323 1.508 7H.43c-2.128-5.697 4.165-8.83 7.394-5.857.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17c3.23-2.974 9.522.159 7.394 5.856h-1.078c.728-1.677.59-3.005.108-3.947C13.486.878 10.4.28 8.717 2.01L8 2.748ZM2.212 10h1.315C4.593 11.183 6.05 12.458 8 13.795c1.949-1.337 3.407-2.612 4.473-3.795h1.315c-1.265 1.566-3.14 3.25-5.788 5-2.648-1.75-4.523-3.434-5.788-5Zm8.252-6.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.5a.5.5 0 0 0 0 1H4a.5.5 0 0 0 .416-.223l1.473-2.209 1.647 4.118a.5.5 0 0 0 .945-.049l1.598-5.593 1.457 3.642A.5.5 0 0 0 12 9h3.5a.5.5 0 0 0 0-1h-3.162l-1.874-4.686Z" />
                                        </svg>
                                        <?php echo $row['title'] ?>
                                    </h3>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>

            </div>
        <?php } ?>
    </div>
</section>
<!-- Service End -->

<?php include "./footer.php" ?>