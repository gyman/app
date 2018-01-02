<?php

return PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR2' => true,
        '@PHP56Migration' => true,
        // '@PHP70Migration' => true,
        // '@PHP70Migration:risky' => true,
        '@Symfony' => true,
        '@Symfony:risky' => true,
        'array_syntax' => ['syntax' => 'short'],
        'binary_operator_spaces' => ['align_double_arrow' => true, 'align_equals' => false],
        'cast_spaces' => true,
        'concat_space' => ['spacing' => 'one'],
        'combine_consecutive_unsets' => true,
        'encoding' => true,
        'full_opening_tag' => true,
        'indentation_type' => true,
        'is_null' => true,
        'heredoc_to_nowdoc' => true,
        'list_syntax' => ['syntax' => 'long'],
        'line_ending' => true,
        'method_argument_space' => ['keep_multiple_spaces_after_comma' => false],
        'no_extra_consecutive_blank_lines' => ['break', 'continue', 'extra', 'return', 'throw', 'use', 'parenthesis_brace_block', 'square_brace_block', 'curly_brace_block'],
        'no_short_echo_tag' => true,
        'no_unreachable_default_argument_value' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'ordered_class_elements' => true,
        'ordered_imports' => true,
        'php_unit_strict' => false,
        'php_unit_test_class_requires_covers' => true,
        'phpdoc_add_missing_param_annotation' => true,
        'phpdoc_order' => true,
        'semicolon_after_instruction' => true,
        'strict_comparison' => true,
        'strict_param' => true,
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
        ->exclude('tests')
        ->exclude('vendor')
        ->exclude('var')
        ->exclude('web')
        ->in(__DIR__ . '/src')
    )
;
