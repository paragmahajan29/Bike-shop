<?php

/*
 Author:Parag Mahajan
 Title: login.php
 
 this file is to logout the session of vendor
 
 */

 session_start();

  session_destroy();   // function that Destroys Session 
  header("Location: index.php");
  
?>