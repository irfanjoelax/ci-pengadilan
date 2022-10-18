<?php

function select_level($level_user, $select_user)
{
    if ($level_user == $select_user) {
        return 'selected';
    }
}


function is_checked($key, $value)
{
    if ($key == $value) {
        return 'checked';
    }
}
