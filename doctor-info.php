<?php include "./db.php"?>
<?php include "./header.php" ?>

<?php
if(isset($_GET['doctorid'])){
    $id = $_GET['doctorid'];
    $sql = "SELECT * from doctor where id='$id' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>

<!-- Banner Start -->
<div class="page-banner" style="background-image: url(./img/cover)">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-text">
                    <h1>Doctor: <?php echo isset($_GET['doctorid']) ? $row['name'] : ''?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->


<!-- Doctor Start -->
<section class="doctor-detail">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="doctor-single">
                    <div class="thumb">
                        <?php
                            if(isset($_GET['doctorid']) && !empty($row['photo'])){?>
                                <img src='data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['photo']);?>' />
                        <?php } ?>
                    </div>
                    <div class="text">
                        <h2><?php echo isset($_GET['doctorid']) ? $row['name'] : ''?></h2>
                        <h3><?php echo isset($_GET['doctorid']) ? $row['title'] : ''?></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-8">

                <!-- Doctor Detail Tab Start -->
                <div class="doctor-detail-tab">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true">About</a></li>
                        <li class=""><a href="#tab2" data-toggle="tab" aria-expanded="false">Contact</a></li>
                    </ul>

                    <!-- Tab Content Start -->
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="tab1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="content">
                                        <h2>About</h2>
                                        <p><?php echo isset($_GET['doctorid']) ? $row['about'] : ''?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tab2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="contact">
                                                    <div class="icon"><i class="fa fa-map-o"></i></div>
                                                    <div class="text">
                                                        <h4>Address</h4>
                                                        <p><?php echo isset($_GET['doctorid']) ? $row['address'] : ''?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="contact">
                                                    <div class="icon"><i class="fa fa-phone"></i></div>
                                                    <div class="text">
                                                        <h4>Phone</h4>
                                                        <p><?php echo isset($_GET['doctorid']) ? $row['phone'] : ''?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="contact">
                                                    <div class="icon"><i class="fa fa-envelope"></i></div>
                                                    <div class="text">
                                                        <h4>Email</h4>
                                                        <p><?php echo isset($_GET['doctorid']) ? $row['email'] : ''?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tab Content End -->
                </div>
                <!-- Doctor Detail Tab End -->

            </div>
        </div>
    </div>
</section>
<!-- Doctor End -->

<?php include "./footer.php" ?>