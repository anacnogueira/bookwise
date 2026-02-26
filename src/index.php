<?php

session_start();

$config = require('config.php');

require "models/Livro.php";

require "Database.php";

require "functions.php";

require "routes.php";
