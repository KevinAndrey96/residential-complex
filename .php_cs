<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude(['storage', 'bootstrap/cache'])
    ->in(__DIR__);

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR12' => true,
        'array_syntax' => ['syntax' => 'short'],
        'concat_space' => ['spacing' => 'one'],
        'binary_operator_spaces' => true,
        'not_operator_with_successor_space' => true,
        'no_superfluous_elseif' => true,
        'single_quote' => true,
        'operator_linebreak' => true,
    ])
