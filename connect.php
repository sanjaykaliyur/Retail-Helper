<?php
    $conn = oci_connect('', '' , '//dbserver.engr.scu.edu/db11g');
    if (!$conn) {
        print "<br>connection failed:";
        exit;
    }
?>
