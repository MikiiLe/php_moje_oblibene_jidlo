<?php
function validate_input($data) {
    if (isset($data) && is_numeric($data) && $data > 0) {
        return (int)$data;
    }
    return false;
}
?>


