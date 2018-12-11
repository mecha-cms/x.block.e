<?php namespace fn\block;

function e($content, array $lot = []) {
    return $content ? \Block::replace('e', function($content) {
        ob_start();
        extract(\Lot::get());
        eval($content);
        return ob_get_clean();
    }, $content) : $content;
}

\Hook::set('*.content', __NAMESPACE__ . "\\e", .9, 1);