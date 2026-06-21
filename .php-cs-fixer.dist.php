<?php

$finder = (new PhpCsFixer\Finder())
    ->files()
    ->in([
        __DIR__.'\bin',
        __DIR__.'\config',
        __DIR__.'\migrations',
        __DIR__.'\src',
        __DIR__.'\tests',
    ])
    ->name('*.php')
    ->exclude([
        'var',
        'vendor',
    ])
    ->notPath('config/reference.php')
;

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(false)
    ->setRules([
        '@Symfony' => true,
        'binary_operator_spaces' => [
            'operators' => [
                '=>' => 'align_single_space_minimal',
            ],
        ],
        'ordered_imports' => [
            'imports_order' => ['class', 'function', 'const'],
            'sort_algorithm' => 'alpha',
        ],
        'single_line_empty_body' => true,
    ])
    ->setFinder($finder)
;
