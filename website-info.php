<?php include "session.php"?>
<?php include "./db.php"?>
<?php
$success = false;
$alert = false;


if (isset($_GET['deleteimg'])) {
   
    $sno = $_GET['deleteimg'];
    // $sql = "UPDATE info SET photo = null ";
    // $result = mysqli_query($conn, $sql);
    
    if(file_exists('./img/cover')){
        unlink('./img/cover');
        $success = "Deleted successfully.";
    }
    else{
        $alert = "Could not Delete the Information successfully.";
    }
}

if(isset($_POST['addphoto']) && !empty($_FILES["img"]["name"]) ){

    // Get file info 
    $id = $_POST['addphoto'];
    $allowTypes = array('jpg','png','jpeg','gif'); 

    $fileName = basename($_FILES["img"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

    if(in_array($fileType, $allowTypes)){
        $image = $_FILES['img']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        // $sql =  "UPDATE info SET `photo` = '$imgContent' ";
        // $result = mysqli_query($conn, $sql);

        $target_file="img/cover";
        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);


        if(file_exists($target_file)){
            $success = "Photo Added Successfully !!";
        }
        else{
            $alert = "Could not Added the Photo successfully !!";
        }
    }else{
        $alert = "Could not Added the Photo successfully !!";
    }
}


    if (!isset($_POST['addphoto']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
 
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
        // Sql query to be executed
        $sql = "UPDATE info set $data";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $success = "Information Updated Successfully !!";
        } else {
            $alert = "Could not update the Information successfully !!";
        }
        }
?>

<?php include "./admin-header.php";  include "./success-alert.php";  include "./error-alert.php"; ?>
<!-- Edit Modal -->
<div class="modal fade mx-auto" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class=" mx-auto p-5 " action="website-info.php" method="post" enctype="multipart/form-data">
                <h1 class="text-center pb-4">Website Information</h1>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="editemail" required>
                </div>

                <div class="mb-3">
                    <label for="pass" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" id="editphone" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">About</label>
                    <textarea class="form-control" name="about" id="editabout" rows="6"></textarea required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" id="editaddress" required>
                    </div>

                    <div class="d-flex align-items-center justify-content-center ">
                        <button type="submit" class="py-3 mt-4 px-5 btn btn-outline-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--add img modal -->
<div class="modal fade mx-auto" id="imgmodal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class=" mx-auto p-5" action="website-info.php" method="post" enctype="multipart/form-data">
                <h5 class="text-center">Upload Image</h5>
                <input type="hidden" name="addphoto" id="addphoto">
                <div class="mb-3">
                    <label for="menu" class="form-label">Image</label>
                    <input type="file" class="form-control" name="img" id="img" required>
                </div>
                <div class="d-flex align-items-center justify-content-center ">
                    <button type="submit" class="py-3 mt-4 px-5 btn btn-outline-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="container overflow-auto">
    <h1 class="text-center mt-3">Website Information</h1>

    <table class="table table-bordered table-sm text-sm">
        <thead class="table-dark">
            <tr>
                <th>Email</th>
                <th>Phone</th>
                <th>About</th>
                <th>Address</th>
                <th>Cover Photo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $sql = "SELECT * from info";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
            ?>
            <tr>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['phone']?></td>
                <td class="text-break"><?php echo $row['about']?></td>
                <td><?php echo $row['address']?></td>
                <td>
                    <?php
                    $target_file="img/cover";
                    if(file_exists($target_file)){?>
                        <img class="py-2" style="width: 10rem;" src='<?php echo $target_file ;?>' />
                    <?php } ?>
                    <button class="addimg bi bi-images btn btn-sm btn-outline-primary"></button>
                    <?php
                    if(file_exists($target_file)){?>
                        <button class="deleteimg bi bi-trash btn btn-sm btn-outline-danger"></button>
                    <?php } ?>
                </td>
                <td>
                    <button class="update bi bi-pencil-square btn btn-sm btn-outline-primary"></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<script>
updates = document.getElementsByClassName('update');
Array.from(updates).forEach((element) => {
    element.addEventListener("click", (e) => {
        tr = e.target.parentNode.parentNode;

        email = tr.getElementsByTagName("td")[0].innerText;
        phone = tr.getElementsByTagName("td")[1].innerText;
        about = tr.getElementsByTagName("td")[2].innerText;
        address = tr.getElementsByTagName("td")[3].innerText;

        editemail.value = email;
        editphone.value = phone;
        editabout.value = about;
        editaddress.value = address;


        $('#editModal').modal('toggle');
    })
})


// add img
addimgs = document.getElementsByClassName('addimg');
Array.from(addimgs).forEach((element) => {
    element.addEventListener("click", (e) => {

        tr = e.target.parentNode.parentNode;
        id = tr.getElementsByTagName("td")[0].innerText;
        addphoto.value = id;
        
        $('#imgmodal').modal('toggle');
    })
})

deleteimgs = document.getElementsByClassName('deleteimg');
Array.from(deleteimgs).forEach((element) => {
    element.addEventListener("click", (e) => {

        tr = e.target.parentNode.parentNode;
        sno = tr.getElementsByTagName("td")[0].innerText;

        if (confirm("Are you sure you want to Delete this!")) {
            window.location = `website-info.php?deleteimg=${sno}`;
        }
    })
})
</script>

<?php include "./admin-footer.php" ?>
<script>
$(document).ready(function() {
    $('#table').DataTable();
});
</script>