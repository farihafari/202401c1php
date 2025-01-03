<?php
session_start();
session_unset();
echo "<script>
    alert('logged out successfully');
    location.assign('index.php')
    </script>";
?>