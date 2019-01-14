<?php namespace fn\block;

function e($content, array $lot = []) {
    return $content ? \Block::replace('e', function($content) {
        ob_start();
        extract(\Lot::get(), EXTR_SKIP);
        eval($content);
        return ob_get_clean();
    }, $content, $this, \Page::class) : $content;
}

\Hook::set('*.content', __NAMESPACE__ . "\\e", .9, 1);