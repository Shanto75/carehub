<?php include "./db.php"?>
<?php
$success = false;
$alert = false;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        extract($_POST);
        $data = '';
        foreach($_POST as $k => $v){
			if(!is_numeric($k)){
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
    
        $sql = "INSERT INTO message set $data";
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
            $success = "Thank you for your message. We shall contact you soon.";
        } else {
            $alert = "Could not sent the message successfully !!";
        }
    }

?>


<?php include "./header.php"?>
<!-- Banner Start -->
<div class="page-banner" style="background-image: url(./img/cover)">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-text">
                    <h1>Contact Us</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<?php if($success){?>
<div style="background-color: hsl(120,100%,60%); color:white; padding: 10px 10px 10px 10px">
    <h4 style="text-align: center; color: white !important; font-weight: bold;"><?php echo $success;?></h4>
</div>
<?php } ?>

<?php if($alert){?>
    <div style="background-color: hsl(0, 100%, 50%); color:white; padding: 10px 10px 10px 10px">
    <h4 style="text-align: center; color: white !important; font-weight: bold;"><?php echo $alert;?></h4>
</div>
<?php } ?>

<section class="contact-v1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-normal">
                    <h2 style=" text-align: center;">Contact Form</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div style="width:30rem; margin: auto;">

                <form action="contact.php" method="post" class="form-horizontal cform-1">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Name" name="name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="email" class="form-control" placeholder="Email Address" name="email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Phone Number" name="phone" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <textarea name="message" class="form-control" cols="30" rows="10"
                                placeholder="Message" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success"> Submit </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

<!-- Doctors End -->
<?php include "./footer.php" ?>