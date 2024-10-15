<?php
session_start();
session_unset();
session_destroy();

header('Location: pg_login.html');
exit();
