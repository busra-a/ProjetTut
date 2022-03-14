<?php

class VueGenerique
{

    function getAffichage($path, $data = null)
    {
        ob_start();
        include_once "Templates/$path";
        $contenu = ob_get_clean();
        include_once "Templates/corps/header.php";
        echo $contenu;
        include_once "Templates/corps/footer.html";
    }
}

?>