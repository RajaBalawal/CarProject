<?php
            session_start();
            if(session_destroy()) {// Destroying All Session{
            header("Location: login.php"); // Redirecting To Home Page
          }
          ?>
          