<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<div class="alert alert-dismissible alert-warning" onclick="$(this).remove()"><?= $message ?></div>

