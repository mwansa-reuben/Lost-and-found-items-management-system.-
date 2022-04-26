<?php
    include('connect.php');
         $conn->query("CREATE TABLE IF NOT EXISTS users(
            uid INT AUTO_INCREMENT PRIMARY KEY,
            fname VARCHAR(200) NOT NULL,
            lname VARCHAR(200) NOT NULL,
            pn VARCHAR(200) NOT NULL,            
            nrc VARCHAR(200) NOT NULL,
            loc VARCHAR(200) NOT NULL,
            em VARCHAR(200) NOT NULL,
            pwd VARCHAR(200) NOT NULL,            
            date TIMESTAMP
        )") or die('Failed to create users table');
        $conn->query("CREATE TABLE IF NOT EXISTS inventory(
            iid  INT AUTO_INCREMENT PRIMARY KEY,
            cid  VARCHAR(200) NOT NULL,
            uid  VARCHAR(200) NOT NULL,
            name VARCHAR(200) NOT NULL,
            des  TEXT NOT NULL,
            img VARCHAR(200) NOT NULL DEFAULT '',
            owner VARCHAR(200) NOT NULL,
            status VARCHAR(200) NOT NULL DEFAULT '0',
            rdate TIMESTAMP,
            cdate VARCHAR(200) NOT NULL DEFAULT ''
        )") or die('Failed to create inventory table');

        $conn->query("CREATE TABLE IF NOT EXISTS cat(
            cid  INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(200) NOT NULL            
        )") or die('Failed to create cat table');
        