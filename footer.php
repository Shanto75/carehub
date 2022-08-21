<?php
$sql = "SELECT * from info";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!-- Footer Social Start -->
<section class="footer-social">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
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
</section>
<!-- Footer Social End -->


<!-- Footer Main Start -->
<section class="footer-main">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-lg-6 footer-col text-justify ">
                <h3>About Us</h3>
                <p>
                <p><?php echo $row['about']?></p><br />
                </p>
            </div>
            <div class="col-sm-8 col-md-6 col-lg-3 footer-col">
                <h3>Quick Links</h3>
                <div class="contact-item">
                    <a class="mb-2 copyright" href="index.php">
						Home
					</a>
                </div>
				<div class="contact-item">
                    <a class="mb-2 copyright" href="about.php">
						About
					</a>
                </div>
				<div class="contact-item">
					<a class="mb-2 copyright" href="doctors.php">
						Doctors
					</a>
				</div>
				<div class="contact-item">
                    <a class="mb-2 copyright" href="faq.php">
						FAQ
					</a>
                </div>
                <div class="contact-item">
                    <a class="mb-2 copyright" href="blog.php">
						Blog
					</a>
                </div>
                <div class="contact-item">
                    <a class="mb-2 copyright" href="contact.php">
						Contact Us
					</a>
                </div>
            </div>

            <div class="col-sm-6 col-md-3 col-lg-3 footer-col">
                <h3>Contact Us</h3>
                <div class="contact-item">
                    <div class="icon"><i class="fa fa-map-marker"></i></div>
                    <div class="text"><?php echo $row['address']?></div>
                </div>
                <div class="contact-item">
                    <div class="icon"><i class="fa fa-phone"></i></div>
                    <div class="text"><?php echo $row['phone']?></div>
                </div>
                <div class="contact-item">
                    <div class="icon"><i class="fa fa-envelope-o"></i></div>
                    <div class="text"><?php echo $row['email']?></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer Main End -->


<!-- Footer Bottom Start -->
<section class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12 copyright" style="text-align: center;">
                Copyright � <?php echo date('Y')?> . All Rights Reserved by <a href="index.php" class="text-primary">Carehub Disability PTY LTD.</a>
            </div>
            <div class="col-md-12 copyright" style="text-align: center;">
                Designed and Developed by <a href="http://facesoftbd.com/" target="_blank" class="text-primary">Face of Art Technologies.</a>
            </div>
        </div>
    </div>
</section>
<!-- Footer Bottom End -->

<a href="#" class="scrollup">
    <i class="fa fa-angle-up"></i>
</a>

</div>


<!-- Scripts -->
<script src="assets/js/jquery-2.2.4.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.slicknav.min.js"></script>
<script src="assets/js/hoverIntent.js"></script>
<script src="assets/js/superfish.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/owl.animate.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/jquery.bxslider.min.js"></script>
<script src="assets/js/jquery.mixitup.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/custom.js"></script>

</body>

</html>