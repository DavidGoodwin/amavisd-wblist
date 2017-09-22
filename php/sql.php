<?php

function db_query($sql, $params = [])
{

    $db = new \AmavisWblist\Database();

    return $db->query($sql, $params);
    
}
