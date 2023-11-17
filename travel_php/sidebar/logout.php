<?php
session_start();
session_destroy();
Header('Location: ../forms/g_login.php');