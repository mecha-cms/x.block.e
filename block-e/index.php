<?php

function fn_block_replace_e($content, $lot) {
    return Block::replace('e', function($content) {
        ob_start();
        extract(Lot::get(null, []));
        eval($content);
        return ob_get_clean();
    }, $content);
}

Hook::set('page.content', 'fn_block_replace_e', .9);