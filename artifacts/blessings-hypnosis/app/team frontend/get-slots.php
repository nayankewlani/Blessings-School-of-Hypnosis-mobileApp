<?php
include 'db.php';

$date = $_POST['date'];
$trainer_id = $_POST['trainer_id'];

// All slots
$allSlots = mysqli_query($conn, "SELECT slot_time FROM time_slots");

// Booked slots
$booked = mysqli_query($conn, "SELECT time_slot FROM appointments 
WHERE booking_date='$date' AND trainer_id='$trainer_id'");

$bookedSlots = [];
while($row = mysqli_fetch_assoc($booked)){
    $bookedSlots[] = $row['time_slot'];
}

// Available slots
$available = [];

while($slot = mysqli_fetch_assoc($allSlots)){
    if(!in_array($slot['slot_time'], $bookedSlots)){
        $available[] = $slot['slot_time'];
    }
}

echo json_encode($available);
?>