<?php include "session.php"?>
<?php include "./db.php"?>
<?php
$success = false;
$alert = false;

if (isset($_GET['delete'])) {
   
    $sno = $_GET['delete'];
    $sql = "DELETE FROM `service` WHERE `id` = '$sno'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $success = "Deleted successfully.";
    }
    else{
        $alert = "Could not Delete the Information successfully.";
    }
}


if (isset($_GET['deleteimg'])) {
   
    $sno = $_GET['deleteimg'];
    $sql = "UPDATE service SET photo = null WHERE `id` = '$sno'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
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

        $sql =  "UPDATE service SET `photo` = '$imgContent' WHERE `service`.`id` = '$id'";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $success = "Photo Added Successfully !!";
        }
        else{
            $alert = "Could not Added the Photo successfully !!";
        }
    }else{
        $alert = "Could not Added the Photo successfully !!";
    }
}

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['snoEdit'])) {
        
        $id = $_POST["id"];
        $title = $_POST['title'];
        $des = $_POST['des'];

        $sql = "UPDATE service set `title` = '$title', `description` = '$des' where `service`.`id` = '$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $success = "Information Updated Successfully !!";
        } else {
            $alert = "Could not update the Information successfully !!";
        }
    }

    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add']) ) {

        $title = $_POST['title'];
        $des = $_POST['des'];

        $sql = "INSERT INTO service set `title` = '$title', `description` = '$des'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $success = "Information Added Successfully !!";
        } else {
            $alert = "Could not Added the Information successfully !!";
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
            <form class=" mx-auto p-5 " action="service-list.php" method="post">
                <h1 class="text-center pb-4">Update Service</h1>
                <input type="hidden" name="snoEdit" id="snoEdit">
                <div class="mb-3">
                    <label class="form-label">ID</label>
                    <input type="number" class="form-control" name="id" id="editid" required readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="edittitle" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="des" id="editdes" rows="6"></textarea required>
                </div>

                <div class="d-flex align-items-center justify-content-center ">
                    <button type="submit" class="py-3 mt-4 px-5 btn btn-outline-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade mx-auto" id="addModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class=" mx-auto p-5 " action="service-list.php" method="post">
                <h1 class="text-center pb-4">Add New Service</h1>
                <input type="hidden" name="add" id="add" value="add">

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="des"  rows="6"></textarea required>
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
            <form class=" mx-auto p-5" action="service-list.php" method="post" enctype="multipart/form-data">
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
    <h1 class="text-center mt-3">Service List</h1>
    <button id="add-service" class="float-end mb-5 py-2 btn btn-sm btn-outline-primary"> <i
            class="bi bi-person-plus-fill pe-2"></i>Add New Service</button>

    <table id="table" class="table table-bordered table-hover table-sm text-sm">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Photo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * from service";
                $result = mysqli_query($conn, $sql);
               while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $row['id']?></td>
                <td ><?php echo $row['title']?></td>
                <td><?php echo $row['description']?></td>
                <td>
                    <?php
                    if(!empty($row['photo'])){?>
                        <img class="p-2" style="width: 10rem;" src='data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['photo']);?>' />
                    <?php } ?>
                    <button class="addimg bi bi-images btn btn-sm btn-outline-primary"></button>
                    <?php
                    if(!empty($row['photo'])){?>
                        <button class="deleteimg bi bi-trash btn btn-sm btn-outline-danger"></button>
                    <?php } ?>
                </td>
                <td>
                    <button class="update bi bi-pencil-square btn btn-sm btn-outline-primary"></button>
                    <button class="delete bi bi-trash btn btn-sm btn-outline-danger"></button>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>

<script>
updates = document.getElementsByClassName('update');
Array.from(updates).forEach((element) => {
    element.addEventListener("click", (e) => {
        tr = e.target.parentNode.parentNode;

        id = tr.getElementsByTagName("td")[0].innerText;
        title = tr.getElementsByTagName("td")[1].innerText;
        des = tr.getElementsByTagName("td")[2].innerText;

        editid.value = id;
        edittitle.value = title;
        editdes.value = des;

        snoEdit.value = id;

        $('#editModal').modal('toggle');
    })
})

deletes = document.getElementsByClassName('delete');
Array.from(deletes).forEach((element) => {
    element.addEventListener("click", (e) => {

        tr = e.target.parentNode.parentNode;
        sno = tr.getElementsByTagName("td")[0].innerText;

        if (confirm("Are you sure you want to Delete this!")) {
            window.location = `service-list.php?delete=${sno}`;
        }
    })
})

document.getElementById("add-service").addEventListener("click", function() {
    $('#addModal').modal('toggle');
});

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
            window.location = `service-list.php?deleteimg=${sno}`;
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