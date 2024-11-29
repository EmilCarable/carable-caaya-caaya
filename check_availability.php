<?php
// Assuming you have established a database connection
require_once 'pdoconn.php';

$inputDate = $_POST['datein'];
$check_out = $_POST['dateout'];

// User-defined date range
$startRange = '2023-08-10';
$endRange = '2023-08-15';

// Prepare the query to select available facilities
$query = "SELECT *
FROM facilities
  WHERE facility_status = 'Available' AND facility_id NOT IN (
  SELECT facility_id FROM reservation
  WHERE reservation_status BETWEEN 'Pending' AND 'Reserved' AND check_in <= :check_out AND check_out >= :inputDate
  )";

// Prepare and execute the statement
$stmt = $conn->prepare($query);
$stmt->bindParam(':inputDate', $inputDate);
$stmt->bindParam(':check_out', $check_out);
$stmt->execute();

// Fetch the available facilities
$availableFacilities = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($availableFacilities) > 0) {
    echo "Available Facilities for the selected date range:\n";
    foreach ($availableFacilities as $facility) {
?>
<!-- //////////////////////////////////////// FACILITIES //////////////////////////////////////// -->

<div class="row"><div class="col-sm-12">
<a href="facilitydetailsdate.php?facility_id=<?php echo $facility['facility_id']; ?>&&check_in=<?php echo $inputDate; ?>
&&check_out=<?php echo $check_out; ?>">
<div class="alert alert-info" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
  
<img src="<?php echo $facility['facility_image']; ?>" alt="" class="img-rounded center" width="150px"> <br>


<div class="label label-info" style="font-size: small;">


Name: <span class="label label-default" style="font-size: small;"><?php echo $facility['facility_name']; ?></span> |
Type: <span class="label label-success" style="font-size: small;"><?php echo $facility['facility_type']; ?></span> |
Good For: <span class="label label-danger" style="font-size: small;"><?php echo $facility['facility_capacity']; ?></span> |
Price: <span class="label label-warning" style="font-size: small;"><?php echo $facility['facility_price']; ?></span> 

</div>
</div>
</a>
</div></div>



<!-- //////////////////////////////////////// FACILITIES //////////////////////////////////////// -->
<?php
    }
} else {
    echo "No available facilities for the selected date range.";
}
?>
