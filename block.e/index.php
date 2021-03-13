<?php namespace x\block__e;

function block($content, array $lot = []) {
    $that = $this;
    return $content ? \Block::alter('e', function($content) use($lot, $that) {
        \ob_start();
        \fire(function() use($content) {
            extract($GLOBALS, \EXTR_SKIP);
            eval($content);
        }, $lot, $that);
        return \ob_get_clean();
    }, $content) : $content;
}

\Hook::set('page.content', __NAMESPACE__ . "\\block", .9);
