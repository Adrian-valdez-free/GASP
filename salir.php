<?php

session_start();
session_destroy();
echo '
    <script>
    alert("SALISTE DEL SISTEMA");
    location.href = "index.php";
    </script>
    ';