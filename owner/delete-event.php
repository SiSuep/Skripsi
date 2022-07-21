<?php
// include database connection file
include_once("koneksi.php");

// Get id from URL to delete that user
$id_event = $_GET['id_event'];

// Delete user row from table based on given id
$result = mysqli_query($koneksi, "DELETE FROM dt_event WHERE id_event=$id_event");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:data-event.php");
?>