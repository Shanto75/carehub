<?php include "./db.php" ?>

<?php include "./header.php" ?>
<!-- Banner Start -->
<div class="page-banner" style="background-image: url(./img/cover)">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-text">
                    <h1>Blog</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<section class="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <!-- Blog Classic Start -->
                <div class="blog-grid">
                    <div class="row">
                        <div style="max-width:60rem; margin: auto;" class="col">

                            <?php
                            $sql = "SELECT * from blog";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <div class="post-item">
                                    <?php if (!empty($row['photo'])) { ?>
                                        <div class="image-holder">
                                            <img class="img-fullwidth" src='data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['photo']); ?>' />
                                        </div>
                                    <?php } ?>
                                    <div class="text">
                                        <h3><?php echo $row['title'] ?></h3>
                                        <ul class="status">
                                            <li><i class="fa fa-calendar"></i>Date: <?php echo $row['date'] ?></li>
                                        </ul>
                                        <p><?php echo $row['details'] ?> </p>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Doctors End -->
<?php include "./footer.php" ?>