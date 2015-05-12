<?php
        /* Connect to MySQL Database */
            $host = "HOSTNAME";
            $user = "USERNAME";
            $password = "PASSWORD";
            
            $connect = mysql_connect($host, $user, $password);
            if (!$connect)
            {
                die('Something is wrong. Could not connect: ' . mysql_error());
            }
        ?>