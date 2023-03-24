<?php 
    function getDatabaseConnection() {
        return new PDO("sqlite:../news.db");
    }
?>