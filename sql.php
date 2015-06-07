<?php
        /* Connect to MySQL Database */
            $host = "localhost";
            $user = "root";
            $password = "jmedtyqw";
            
            $connect = mysql_connect($host, $user, $password);
            if (!$connect)
            {
                die('Something is wrong. Could not connect: ' . mysql_error());
            }
        ?>