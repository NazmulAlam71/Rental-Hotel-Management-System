<?php
   SESSION_START();
   session_destroy();
   header('Location: index.html');
   exit;

?>