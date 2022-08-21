<?php include "./db.php"?>
<?php include "./header.php" ?>

<!-- Banner Start -->
<div class="page-banner" style="background-image: url(./img/cover)">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-text">
                    <h1>FAQ</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<section class="faq">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>General Questions and Answer</h1>
                <?php 
                    $i=1;
                    $sql = "SELECT * from faq";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {?>
                <div class="panel-group" id="accordion<?php echo $row['id']?>" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading1">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion<?php echo $row['id']?>"
                                    href="#collapse<?php echo $row['id']?>" aria-expanded="false" aria-controls="collapse1">
                                    <?php echo $i, ". ", $row['question'] ?>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse<?php echo $row['id']?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                            <div class="panel-body">
                                <p><?php echo $row['ans']?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i+=1; }?>
            </div>
        </div>
    </div>
</section>


<?php include "./footer.php" ?>