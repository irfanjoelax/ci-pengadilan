<?php

/**
 * ALERT
 * ========
 * 
 * alert dinamis menggunakan Javascript
 */
function alert($message, $redirect = false)
{
    echo "<script>window.alert('$message')</script>";

    if ($redirect) {
        echo "<script>window.location.href = '$redirect'</script>";
    }
}
