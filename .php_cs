<?php

$header = trim(file_get_contents(__DIR__ . "/.php_cs_header"));

return PhpCsFixer\Config::create()
    ->setRules([
        'header_comment' => array('header' => $header)
    ])
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR2' => true,


        'braces' => ["position_after_control_structures" => "next"],
        'align_multiline_comment' => true,
        'binary_operator_spaces' => true,
        'blank_line_after_namespace' => true,
        'blank_line_before_statement' => ["statements" => ['break', 'continue', 'declare', 'return', 'throw', 'try']],
        'combine_consecutive_unsets' => true,
        'declare_strict_types' => true,
        'dir_constant' => true,
        'function_to_constant' => true,
        'function_typehint_space' => true,
        'is_null' => ['use_yoda_style' => false],
        'linebreak_after_opening_tag' => true,
        'native_function_casing' => true,
        'new_with_braces' => true,
        'no_blank_lines_after_class_opening' => true,
        'no_blank_lines_after_phpdoc' => true,
        'no_empty_comment' => true,
        'no_empty_phpdoc' => true,
        'no_empty_statement' => true,
        'no_extra_consecutive_blank_lines' => true,
        'no_leading_import_slash' => true,
        'no_leading_namespace_whitespace' => true,
        'no_mixed_echo_print' => true,
        'no_multiline_whitespace_around_double_arrow' => true,
        'no_multiline_whitespace_before_semicolons' => true,
        'no_short_bool_cast' => true,
        'no_singleline_whitespace_before_semicolons' => true,
        'no_trailing_comma_in_singleline_array' => true,
        'no_trailing_whitespace' => true,
        'no_unneeded_control_parentheses' => true,
        'no_unused_imports' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'no_whitespace_before_comma_in_array' => true,
        'normalize_index_brace' => true,
        'ordered_class_elements' => true,
        'ordered_imports' => true,
        'phpdoc_add_missing_param_annotation' => true,
        'phpdoc_align' => true,
        'phpdoc_annotation_without_dot' => true,
        'phpdoc_indent' => true,
        'phpdoc_inline_tag' => true,
        'phpdoc_return_self_reference' => true,
        'phpdoc_scalar' => true,
        'phpdoc_var_without_name' => true,
        'pow_to_exponentiation' => true,
        'random_api_migration' => true,
        'semicolon_after_instruction' => true,
        'single_blank_line_before_namespace' => true,
        'single_line_comment_style' => true,
        'single_quote' => true,
        'space_after_semicolon' => true,
        'ternary_operator_spaces' => true,
        'ternary_to_null_coalescing' => true,
        'visibility_required' => true,
    ])
    ->setFinder(PhpCsFixer\Finder::create()->in(__DIR__))
    ->setCacheFile(sys_get_temp_dir() . '/.php_cs.cache');
