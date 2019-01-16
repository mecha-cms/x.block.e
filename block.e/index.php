<?php namespace fn\block;

function e($content, array $lot = []) {
    $that = $this;
    return $content ? \Block::replace('e', function($content) use($lot, $that) {
        ob_start();
        \fn(function() use($content) {
            extract(\Lot::get(), EXTR_SKIP);
            eval($content);
        }, $lot, $that, \Page::class);
        return ob_get_clean();
    }, $content) : $content;
}

\Hook::set('*.content', __NAMESPACE__ . "\\e", .9, 1);