<?php

// Les connexions membre/admin : 

function connexion(){
    // structure ternaire : condition ? code à exécuter si true : code à exécuter si false.
    return !empty($_SESSION['membres']) ? $_SESSION['membres'] : false;
}

?>
