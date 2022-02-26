<?php

$dbconn = pg_connect("host=localhost dbname=login port=5432 user=postgres password=1085")
            or die ('No se ha podido conectar: ' . pg_last_error());

?>