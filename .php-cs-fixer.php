<?php

$finder = PhpCsFixer\Finder::create()
    ->in([
        __DIR__ . '/app',
        __DIR__ . '/public',
    ]);

return new PhpCsFixer\Config()
    ->setRules(rules: [
        '@PSR12' => true,
        'array_syntax' => ['syntax' => 'short'],
        'binary_operator_spaces' => [
            'operators' => ['=' => 'align_single_space', '=>' => 'align_single_space']
        ],
        'blank_line_after_namespace' => true,
        'blank_line_after_opening_tag' => true,
        'blank_line_before_statement' => ['statements' => ['return']],
        'cast_spaces' => true,
        'class_attributes_separation' => [
            'elements' => ['method' => 'one', 'property' => 'one']
        ],
        'concat_space' => ['spacing' => 'one'],
        'declare_equal_normalize' => true,
        'function_typehint_space' => true,
        'no_unused_imports' => true,
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'single_quote' => true,
        'no_whitespace_before_comma_in_array' => true,
        'trailing_comma_in_multiline' => ['elements' => ['arrays']],
        'no_extra_blank_lines' => [
            'tokens' => ['extra', 'throw', 'use', 'return']
        ],
        'phpdoc_align' => true,
        'phpdoc_scalar' => true,
        'phpdoc_trim' => true,
    ])
    ->setFinder($finder);