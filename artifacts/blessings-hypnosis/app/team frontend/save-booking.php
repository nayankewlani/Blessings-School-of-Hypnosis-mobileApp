<?php
include 'db.php';

$trainer_id = $_POST['trainer_id'];
$service_id = $_POST['service_id'];
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$date = $_POST['booking_date'];
$time = $_POST['time_slot'];

// Check slot already booked
$check = mysqli_query($conn, "SELECT * FROM appointments 
WHERE trainer_id='$trainer_id' 
AND booking_date='$date' 
AND time_slot='$time'");
?>

<!DOCTYPE html>
<html>
<head>
<title>Booking Status</title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<?php
if(mysqli_num_rows($check) > 0){
?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Slot Already Booked',
    text: 'Please select another time.',
}).then(() => {
    window.history.back();
});
</script>
<?php
} else {

mysqli_query($conn, "INSERT INTO appointments
(trainer_id,service_id,name,mobile,email,booking_date,time_slot)
VALUES
('$trainer_id','$service_id','$name','$mobile','$email','$date','$time')");
?>

<script>
Swal.fire({
    icon: 'success',
    title: 'Booking Confirmed!',
    html: 'Your session is booked on <br><b><?php echo $date; ?></b> at <b><?php echo $time; ?></b>',
}).then(() => {
    window.location.href = 'book-session.php?trainer_id=<?php echo $trainer_id; ?>';
});
</script>

<?php } ?>

</body>
</html>