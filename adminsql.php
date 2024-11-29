<?php
require 'verify.php';

// #############################_FACILITY SQL_############################## //
// ADD FACILITY //
if (isset($_POST['btnfacilityadd'])) {

  $target_dir = "facilities/";
  $target_file = $target_dir . basename($_FILES["facility_image"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
  ) {
    echo "sorry, only jpg, jpeg, png, jpeg, and gif files are allowed.";
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    echo "sorry, your file was not uploaded.";
  } else {
    if (move_uploaded_file($_FILES["facility_image"]["tmp_name"], $target_file)) {
      echo "the file " . htmlspecialchars(basename($_FILES["facility_image"]["name"])) . "has been uploaded.";

      $facility_status = $_POST["facility_status"];

      $facility_name = $_POST["facility_name"];

      $facility_type = $_POST["facility_type"];

      $facility_capacity  = $_POST["facility_capacity"];

      $facility_price = $_POST["facility_price"];

      $sql = "INSERT INTO `facilities`(`facility_image`,`facility_status`,`facility_name`,`facility_type`,`facility_capacity`,`facility_price`) 
  
    VALUES ('$target_file','$facility_status','$facility_name','$facility_type','$facility_capacity','$facility_price')";

      if ($conn->query($sql) === TRUE) {
        echo '';
        header("location: adminfacilityadd.php");
      } else {
        header("location: error.php");
      }
    }
  }
}
// ADD FACILITY //

// UPDATE FACILITY //
if (isset($_POST['btnfacilityupdate'])) {

  $facility_id = $_GET['facility_id'];

  $facility_status = $_POST['facility_status'];
  $facility_capacity = $_POST['facility_capacity'];
  $facility_price = $_POST['facility_price'];

  $sql = "UPDATE `facilities` SET facility_status='$facility_status', facility_capacity='$facility_capacity',
  facility_price='$facility_price' WHERE facility_id='$facility_id'";

  if (mysqli_query($conn, $sql)) {
    echo "";
    header("location: adminfacilitydetails.php?facility_id=$facility_id");
    return;
  } else {
    echo "" . mysqli_error($conn);
    header("location: admin.php");
    return;
  }
}
// UPDATE FACILITY //


// UPDATE FACILITY IMAGE MAIN//
if (isset($_POST['btnimgmain'])) {

  $facility_id = $_GET['facility_id'];

  $target_dir = "facilities/";
  $target_file = $target_dir . basename($_FILES["facility_image"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
  ) {
    echo "sorry, only jpg, jpeg, png, jpeg, and gif files are allowed.";
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    echo "sorry, your file was not uploaded.";
  } else {
    if (move_uploaded_file($_FILES["facility_image"]["tmp_name"], $target_file)) {
      echo "the file " . htmlspecialchars(basename($_FILES["facility_image"]["name"])) . "has been uploaded.";

      $sql = "UPDATE `facilities` SET facility_image='$target_file' WHERE facility_id='$facility_id'";

      if ($conn->query($sql) == TRUE) {
        echo '';
        header("location: adminfacilitydetails.php?facility_id=$facility_id");
      }
    }
  }
}
// UPDATE FACILITY IMAGE MAIN//


// UPDATE FACILITY IMAGE (1)//
if (isset($_POST['btnimg1'])) {

  $facility_id = $_GET['facility_id'];

  $target_dir = "facilities/";
  $target_file = $target_dir . basename($_FILES["img_1"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
  ) {
    echo "sorry, only jpg, jpeg, png, jpeg, and gif files are allowed.";
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    echo "sorry, your file was not uploaded.";
  } else {
    if (move_uploaded_file($_FILES["img_1"]["tmp_name"], $target_file)) {
      echo "the file " . htmlspecialchars(basename($_FILES["img_1"]["name"])) . "has been uploaded.";

      $sql = "UPDATE `facilities` SET img_1='$target_file' WHERE facility_id='$facility_id'";

      if ($conn->query($sql) == TRUE) {
        echo '';
        header("location: adminfacilitydetails.php?facility_id=$facility_id");
      }
    }
  }
}
// UPDATE FACILITY IMAGE (1)//



// UPDATE FACILITY IMAGE (2)//
if (isset($_POST['btnimg2'])) {

  $facility_id = $_GET['facility_id'];

  $target_dir = "facilities/";
  $target_file = $target_dir . basename($_FILES["img_2"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
  ) {
    echo "sorry, only jpg, jpeg, png, jpeg, and gif files are allowed.";
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    echo "sorry, your file was not uploaded.";
  } else {
    if (move_uploaded_file($_FILES["img_2"]["tmp_name"], $target_file)) {
      echo "the file " . htmlspecialchars(basename($_FILES["img_2"]["name"])) . "has been uploaded.";

      $sql = "UPDATE `facilities` SET img_2='$target_file' WHERE facility_id='$facility_id'";

      if ($conn->query($sql) == TRUE) {
        echo '';
        header("location: adminfacilitydetails.php?facility_id=$facility_id");
      }
    }
  }
}
// UPDATE FACILITY IMAGE (2)//



// UPDATE FACILITY IMAGE (3)//
if (isset($_POST['btnimg3'])) {

  $facility_id = $_GET['facility_id'];

  $target_dir = "facilities/";
  $target_file = $target_dir . basename($_FILES["img_3"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
  ) {
    echo "sorry, only jpg, jpeg, png, jpeg, and gif files are allowed.";
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    echo "sorry, your file was not uploaded.";
  } else {
    if (move_uploaded_file($_FILES["img_3"]["tmp_name"], $target_file)) {
      echo "the file " . htmlspecialchars(basename($_FILES["img_3"]["name"])) . "has been uploaded.";

      $sql = "UPDATE `facilities` SET img_3='$target_file' WHERE facility_id='$facility_id'";

      if ($conn->query($sql) == TRUE) {
        echo '';
        header("location: adminfacilitydetails.php?facility_id=$facility_id");
      }
    }
  }
}
// UPDATE FACILITY IMAGE (3)//



// UPDATE FACILITY IMAGE (4)//
if (isset($_POST['btnimg4'])) {

  $facility_id = $_GET['facility_id'];

  $target_dir = "facilities/";
  $target_file = $target_dir . basename($_FILES["img_4"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
  ) {
    echo "sorry, only jpg, jpeg, png, jpeg, and gif files are allowed.";
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    echo "sorry, your file was not uploaded.";
  } else {
    if (move_uploaded_file($_FILES["img_4"]["tmp_name"], $target_file)) {
      echo "the file " . htmlspecialchars(basename($_FILES["img_4"]["name"])) . "has been uploaded.";

      $sql = "UPDATE `facilities` SET img_4='$target_file' WHERE facility_id='$facility_id'";

      if ($conn->query($sql) == TRUE) {
        echo '';
        header("location: adminfacilitydetails.php?facility_id=$facility_id");
      }
    }
  }
}
// UPDATE FACILITY IMAGE (4)//



// UPDATE FACILITY IMAGE (1,2,3,4)//
if (isset($_POST['btnimgall'])) {

  $facility_id = $_GET['facility_id'];

  $target_dir = "facilities/";
  $target_file = $target_dir . basename($_FILES["img_1"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
  ) {
    echo "sorry, only jpg, jpeg, png, jpeg, and gif files are allowed.";
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    echo "sorry, your file was not uploaded.";
  } else {
    if (move_uploaded_file($_FILES["img_1"]["tmp_name"], $target_file)) {
      echo "the file " . htmlspecialchars(basename($_FILES["img_1"]["name"])) . "has been uploaded.";

      $sql1 = "UPDATE `facilities` SET img_1='$target_file' WHERE facility_id='$facility_id'";

      if ($conn->query($sql1) == TRUE) {
        echo '';

        $facility_id = $_GET['facility_id'];

        $target_dir = "facilities/";
        $target_file = $target_dir . basename($_FILES["img_2"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (
          $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif"
        ) {
          echo "sorry, only jpg, jpeg, png, jpeg, and gif files are allowed.";
          $uploadOk = 0;
        }

        if ($uploadOk == 0) {
          echo "sorry, your file was not uploaded.";
        } else {
          if (move_uploaded_file($_FILES["img_2"]["tmp_name"], $target_file)) {
            echo "the file " . htmlspecialchars(basename($_FILES["img_2"]["name"])) . "has been uploaded.";

            $sql2 = "UPDATE `facilities` SET img_2='$target_file' WHERE facility_id='$facility_id'";

            if ($conn->query($sql2) == TRUE) {
              echo '';

              $facility_id = $_GET['facility_id'];

              $target_dir = "facilities/";
              $target_file = $target_dir . basename($_FILES["img_3"]["name"]);
              $uploadOk = 1;
              $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

              if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
              ) {
                echo "sorry, only jpg, jpeg, png, jpeg, and gif files are allowed.";
                $uploadOk = 0;
              }

              if ($uploadOk == 0) {
                echo "sorry, your file was not uploaded.";
              } else {
                if (move_uploaded_file($_FILES["img_3"]["tmp_name"], $target_file)) {
                  echo "the file " . htmlspecialchars(basename($_FILES["img_3"]["name"])) . "has been uploaded.";

                  $sql3 = "UPDATE `facilities` SET img_3='$target_file' WHERE facility_id='$facility_id'";

                  if ($conn->query($sql3) == TRUE) {
                    echo '';

                    $facility_id = $_GET['facility_id'];

                    $target_dir = "facilities/";
                    $target_file = $target_dir . basename($_FILES["img_4"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    if (
                      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                      && $imageFileType != "gif"
                    ) {
                      echo "sorry, only jpg, jpeg, png, jpeg, and gif files are allowed.";
                      $uploadOk = 0;
                    }

                    if ($uploadOk == 0) {
                      echo "sorry, your file was not uploaded.";
                    } else {
                      if (move_uploaded_file($_FILES["img_4"]["tmp_name"], $target_file)) {
                        echo "the file " . htmlspecialchars(basename($_FILES["img_4"]["name"])) . "has been uploaded.";

                        $sql4 = "UPDATE `facilities` SET img_4='$target_file' WHERE facility_id='$facility_id'";

                        if ($conn->query($sql4) == TRUE) {
                          echo '';

                          header("location: admin.php");
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}
// UPDATE FACILITY IMAGE (1,2,3,4)//


// #############################_FACILITY SQL_############################## //

// #############################_USER SQL_############################## //

// ADD USER //
if (isset($_POST['btnuseradd'])) {

  $name = $_POST["name"];

  $user_type = $_POST["user_type"];

  $user_name = $_POST["user_name"];

  $user_password  = $_POST["user_password"];

  $sql = "INSERT INTO `users`(`name`,`user_type`,`user_name`,`user_password`) 

  VALUES ('$name','$user_type','$user_name','$user_password')";

if ($conn->query($sql) === TRUE) {
  
  header("location: admin.php");

  return;

} else {

  header("location: error.php");

}
}

// ADD USER //

// UPDATE USER //
if (isset($_POST['btnuserupdate'])) {

  $user_id = $_GET['user_id'];

  $name = $_POST['name'];
  $user_status = $_POST['user_status'];
  $user_name = $_POST['user_name'];
  $user_password = $_POST['user_password'];

  $sql = "UPDATE `users` SET name='$name',user_status='$user_status', user_name='$user_name',
  user_password='$user_password' WHERE user_id='$user_id'";

  $query = mysqli_query($conn, $sql);

  if ($conn->query($sql) === TRUE) {

   
  
    header("location: adminuseredit.php?user_id=$user_id");
  
    return;
  
  } else {
  
    header("location: error.php");
  
  }
}
// UPDATE USER //

// #############################_USER SQL_############################## //

// #############################_FEEDBACK SQL_############################## //

// ADD FEEDBACK //
if (isset($_POST['btnfeedback'])) {

  $email = $_POST["email"];

  $comment = $_POST["comment"];

  $date = $_POST["date"];

  $sql = "INSERT INTO `feedback`(`feedback_email`,`feedback_comment`,`feedback_date`) 

  VALUES ('$email','$comment','$date')";

if ($conn->query($sql) === TRUE) {
  
  header("location: index.php");

  return;

} else {

  header("location: error.php");

}

}
// ADD FEEDBACK //

// UPDATE GCASH //
if (isset($_POST['btngcashupdate'])) {

  $gcash_id = $_GET['gcash_id'];

  $gcash_name = $_POST['gcash_name'];
  $gcash_number = $_POST['gcash_number'];

  $target_dir = "gcash/";
  $target_file = $target_dir . basename($_FILES["gcash_image"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
  ) {
    echo "sorry, only jpg, jpeg, png, jpeg, and gif files are allowed.";
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    echo "sorry, your file was not uploaded.";
  } else {
    if (move_uploaded_file($_FILES["gcash_image"]["tmp_name"], $target_file)) {
      echo "the file " . htmlspecialchars(basename($_FILES["gcash_image"]["name"])) . "has been uploaded.";

      $sql = "UPDATE `gcash` SET gcash_image='$target_file', gcash_name='$gcash_name', gcash_number='$gcash_number' WHERE gcash_id='$gcash_id'";

      

      if ($conn->query($sql) == TRUE) {

     
        
        header("location: admin.php?");

        return;

      } else {
        header("location: error.php");
      }
    }
  }
}
// UPDATE GCASH //



// #############################_FEEDBACK SQL_############################## //


// #############################_GALLERY SQL_############################## //

// ADD GALLERY //

if (isset($_POST['btngalleryadd'])) {


  $gallery_name = $_POST['gallery_name'];
  $gallery_caption = $_POST['gallery_caption'];

  $target_dir = "gallery/";
  $target_file = $target_dir . basename($_FILES["gallery_image"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
  ) {
    echo "sorry, only jpg, jpeg, png, jpeg, and gif files are allowed.";
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    echo "sorry, your file was not uploaded.";
  } else {
    if (move_uploaded_file($_FILES["gallery_image"]["tmp_name"], $target_file)) {
      echo "the file " . htmlspecialchars(basename($_FILES["gallery_image"]["name"])) . "has been uploaded.";

      $sql = "INSERT INTO `gallery`(`gallery_image`,`gallery_name`,`gallery_caption`) 

  VALUES ('$target_file','$gallery_name','$gallery_caption')";

      if ($conn->query($sql) == TRUE) {

     
        
        header("location: admin.php?");

        return;

      } else {
        header("location: error.php");
      }
    }
  }

}

// ADD GALLERY //

// UPDATE GALLERY //

if (isset($_POST['btngalleryupdate'])) {

$gallery_id = $_GET['gallery_id'];

$gallery_status = $_POST['gallery_status'];
$gallery_name = $_POST['gallery_name'];
$gallery_caption = $_POST['gallery_caption'];

$sql = "UPDATE `gallery` SET gallery_status='$gallery_status', gallery_name='$gallery_name', gallery_caption='$gallery_caption'
 WHERE gallery_id='$gallery_id'";



if ($conn->query($sql) === TRUE) {

  header("location: admin.php?");

  return;

} else {

  header("location: error.php");

}
}
// UPDATE GALLERY //

// #############################_GALLERY  SQL_############################## //



// #############################_RESERVATION  SQL_############################## //
// APPROVE RESERVATION //



// APPROVE RESERVATION //

// #############################_RESERVATION  SQL_############################## //


?>