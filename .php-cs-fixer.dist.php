<?php
/* ╔═════════════════════════════════════════════════════════════════════════════════════════════════════╗
/* ║       _____                                      _____                   _                          ║ */
/* ║      / ___ \       _                            (____ \                 | |                         ║ */
/* ║     | |   | | ____| |_  ___  ____  _   _  ___    _   \ \ ____ _   _ ____| | ___  ____   ____  ____  ║ */
/* ║     | |   | |/ ___)  _)/ _ \|  _ \| | | |/___)  | |   | / _  ) | | / _  ) |/ _ \|  _ \ / _  )/ ___) ║ */
/* ║     | |___| ( (___| |_| |_| | | | | |_| |___ |  | |__/ ( (/ / \ V ( (/ /| | |_| | | | ( (/ /| |     ║ */
/* ║      \_____/ \____)\___)___/| ||_/ \____(___/   |_____/ \____) \_/ \____)_|\___/| ||_/ \____)_|     ║ */
/* ║                             |_|                                                 |_|                 ║ */
/* ║                                                                                                     ║ */
/* ║   Last update: 07/08/2025 22:47:14                                                                  ║ */
/* ║   User update: Gustavo Filgueiras <gfilgueirasrj@gmail.com>                                         ║ */
/* ║   Project:     Sou Nail Desing                                                                      ║ */
/* ║                                                                                                     ║ */
/* ║   Author:      Gustavo Filgueiras <gfilgueirasrj@gmail.com>                                         ║ */
/* ║   Created at:  07/08/2025 22:47:14                                                                  ║ */
/* ║   License:     MIT                                                                                  ║ */
/* ║   Copyright:   2025 Octopus Developer                                                               ║ */
/* ╚═════════════════════════════════════════════════════════════════════════════════════════════════════╝ */

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in(__DIR__ . '/app')
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

$config = new Config();

return $config
    ->setRiskyAllowed(true)
    ->setFinder($finder)
    ->setRules([
        '@PSR12'                          => true,
        'blank_line_after_opening_tag'    => false,
        'strict_param'                    => true,
        'array_syntax'                    => ['syntax' => 'short'],
        'binary_operator_spaces'          => ['default' => 'align_single_space_minimal'],
        'cast_spaces'                     => ['space' => 'single'],
        'concat_space'                    => ['spacing' => 'one'],
        'no_leading_namespace_whitespace' => true,
        'blank_lines_before_namespace'    => true,
        'blank_line_after_namespace'      => true,
        'declare_strict_types'            => true,
        'phpdoc_align'                    => ['align' => 'vertical'],
        'phpdoc_order'                    => true,
        'phpdoc_separation'               => true,
        'phpdoc_summary'                  => false,
        'return_type_declaration'         => ['space_before' => 'none'],
        'single_quote'                    => true,
        'trailing_comma_in_multiline'     => ['elements' => ['arrays']],
        'no_unused_imports'               => true,
        'psr_autoloading'                 => true,
        'ordered_imports'                 => [
            'sort_algorithm' => 'alpha',
            'imports_order'  => ['class', 'function', 'const'],
        ],
        // 'class_attributes_separation' => [
        //     'elements' => ['method' => 'one', 'property' => 'one', 'const' => 'one'],
        // ],
        'method_argument_space' => [
            'on_multiline'                     => 'ensure_fully_multiline',
            'keep_multiple_spaces_after_comma' => false,
        ],
        'no_extra_blank_lines' => [
            'tokens' => [
                'extra',
                'use',
                'throw',
                'return',
                'continue',
                'break',
                'curly_brace_block',
                'parenthesis_brace_block',
                'square_brace_block',
                'switch',
                'case',
                'default',
            ],
        ],
    ]);
