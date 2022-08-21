<!-- Top Bar Start -->
<?php
$sql = "SELECT * from info";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-4 top-contact">
                <div class="list">
                    <i class="fa fa-envelope"></i><?php echo $row['email'] ?>
                </div>
                <div class="list">
                    <i class="fa fa-phone"></i> <?php echo $row['phone'] ?>
                </div>
            </div>
            <div class="col-md-8 top-social">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Top Bar End -->

<!-- Header Start -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-4 logo">
                <a style="display: flex; justify-content: center;align-items: end;" href="index.php"><img
                        src="img/logo.png" alt="img">
                    <h3 style="padding: 10px 10px;">Carehub</h3>
                </a>
            </div>
            <div class="col-md-8 nav-wrapper">

                <!-- Nav Start -->
                <div class="nav">
                    <ul class="sf-menu">

                        <li>
                            <a href="index.php">
                                <span class="menu-title">Home</span>
                            </a>
                        </li>
                        <li> <a href="about.php">About Us</a></li>
                        <li> <a href="service.php?id=all">Service</a>
                            <ul>
                                <?php
                                    $sql = "SELECT * from service";
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <li> <a href="service.php?id=<?php echo $row['id']?>"><?php echo $row['title']?></a></li>
                                <?php }?>
                                <li> <a href="service.php?id=all">All Services</a></li>
                            </ul>
                        </li>
                        <li> <a href="doctors.php">Doctors</a></li>
                        <li> <a href="blog.php">Blog</a></li>
                        <li> <a href="faq.php">FAQ</a></li>
                        <li> <a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
                <!-- Nav End -->

            </div>
        </div>
    </div>
</header>
<!-- Header End -->