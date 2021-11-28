<?php
session_start();
session_destroy();
echo "<script>alert('Logout successfully.');location='home.html';</script>";
?>