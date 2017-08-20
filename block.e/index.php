<?php

function fn_block_e($content, $lot) {
    Hook::reset('page.content', 'fn_block_replace_e'); // do it once…
    return Block::replace('e', function($content) {
        ob_start();
        extract(Lot::get(null, []));
        eval($content);
        return ob_get_clean();
    }, $content);
}

Hook::set('page.content', 'fn_block_e', .9);