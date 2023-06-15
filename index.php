<?php namespace x\block__e;

function block__e(string $content, array $lot = []) {
    if (isset($lot[1]) && \is_string($lot[1])) {
        \ob_start();
        \fire(function () use ($lot) {
            \extract($GLOBALS, \EXTR_SKIP);
            eval($lot[1]);
        }, [], $this);
        return \ob_get_clean();
    }
    return null;
}

\Hook::set('block.e', __NAMESPACE__ . "\\block__e", 0);