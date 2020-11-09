<?php
    $db = mysqli_init();
    mysqli_real_connect($db, 'localhost', 'yoan', 'kongo','employer');

    if (mysqli_connect_errno()) {
        print_r("Echec de la connexion : %s\n", mysqli_connect_error());
        exit();
    }

    $rs = mysqli_query($db, 'SELECT * FROM emp');
    $data = mysqli_fetch_array($rs, MYSQLI_ASSOC);
    print_r($data);


    mysqli_free_result($rs);
    mysqli_close($db);
?>