<?php

spl_autoload_register(function ($class){ // $class = nome da classe
    include 'classe/' .$class . '.class.php';
});

?>