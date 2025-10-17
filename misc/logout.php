<?php
session_start();
session_unset();
session_destroy();

// return a plain success message for AJAX
echo "success";
exit;