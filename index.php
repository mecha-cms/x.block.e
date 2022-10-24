<?php namespace x;

function block__e(string $content, array $data = []) {
    if (isset($data[1]) && \is_string($data[1])) {
        \ob_start();
        \fire(function () use ($data) {
            \extract($GLOBALS, \EXTR_SKIP);
            eval($data[1]);
        }, [], $this);
        return \ob_get_clean();
    }
    return null;
}

\Hook::set('block.e', __NAMESPACE__ . "\\block__e", 0);