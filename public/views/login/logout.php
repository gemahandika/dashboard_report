<?php
session_name("dashboard_report_session");
session_start();
session_destroy();
header("location:index.php");
