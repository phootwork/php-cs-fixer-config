<?php
namespace phootwork\fixer;

use PhpCsFixer\Config as BaseConfig;

class Config extends BaseConfig {

	public function __construct() {
		parent::__construct('phootwork');
		$this->setRiskyAllowed(true);
		$this->setIndent("\t");
		$this->setLineEnding("\n");
	}

	public function getRules(): array {
		return [
			'align_multiline_comment' => [
				'comment_type' => 'phpdocs_only'
			],
			'array_syntax' => [
				'syntax' => 'short'
			],
			'binary_operator_spaces' => [
				'default' => 'single_space',
				'operators' => []
			],
			'blank_line_after_namespace' => true,
			'blank_line_before_statement' => [
				'statements' => [
					'return', 'throw', 'try', 'die'
				]
			],
			'braces' => [
				'position_after_functions_and_oop_constructs' => 'same'
			],
			'cast_spaces' => [
				'space' => 'single'
			],
			'compact_nullable_typehint' => true,
			'concat_space' => [
				'spacing' => 'one'
			],
			'declare_strict_types' => true,
			'encoding' => true,
			'elseif' => true,
			'full_opening_tag' => true,
			'function_declaration' => [
				'closure_function_spacing' => 'one'
			],
			'function_typehint_space' => true,
			'indentation_type' => true,
			'lowercase_cast' => true,
			'lowercase_constants' => true,
			'lowercase_keywords' => true,
			'lowercase_static_reference' => true,
			'method_argument_space' => true,
			'no_blank_lines_after_phpdoc' => true,
			'no_closing_tag' => true,
			'no_empty_statement' => true,
			'no_extra_blank_lines' => [
				'tokens' => ['use', 'extra']
			],
			'no_leading_import_slash' => true,
			'no_leading_namespace_whitespace' => true,
			'no_multiline_whitespace_around_double_arrow' => true,
			'no_spaces_after_function_name' => true,
			'no_spaces_inside_parenthesis' => true,
			'no_trailing_comma_in_singleline_array' => true,
			'no_trailing_whitespace' => true,
			'no_unused_imports' => true,
			'no_whitespace_before_comma_in_array' => true,
			'no_whitespace_in_blank_line' => true,
			'ordered_imports' => true,
			'phpdoc_order' => true,
			'phpdoc_scalar' => true,
			'phpdoc_separation' => true,
			'phpdoc_types' => true,
			'return_type_declaration' => [
				'space_before' => 'none'
			],
			'self_accessor' => true,
			'single_blank_line_at_eof' => true,
			'single_import_per_statement' => true,
			'single_line_after_imports' => true,
			'single_quote' => true,
			'visibility_required' => true,
			'whitespace_after_comma_in_array' => true
		];
	}
}
