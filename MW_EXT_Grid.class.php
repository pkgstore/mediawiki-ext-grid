<?php

namespace MediaWiki\Extension\PkgStore;

use MWException;
use OutputPage, Parser, PPFrame, Skin;

/**
 * Class MW_EXT_Grid
 */
class MW_EXT_Grid
{
  /**
   * Register tag function.
   *
   * @param Parser $parser
   *
   * @return void
   * @throws MWException
   */
  public static function onParserFirstCallInit(Parser $parser): void
  {
    $parser->setHook('grid', [__CLASS__, 'onRenderGrid']);
    $parser->setHook('row', [__CLASS__, 'onRenderRow']);
    $parser->setHook('column', [__CLASS__, 'onRenderColumn']);
  }

  /**
   * Render grid function.
   *
   * @param $input
   * @param array $args
   * @param Parser $parser
   * @param PPFrame $frame
   *
   * @return string
   */
  public static function onRenderGrid($input, array $args, Parser $parser, PPFrame $frame): string
  {
    // Argument: style.
    $getStyle = MW_EXT_Kernel::outClear($args['style'] ?? '' ?: '');
    $outStyle = empty($getStyle) ? '' : ' style="' . $getStyle . '"';

    // Argument: class.
    $getClass = MW_EXT_Kernel::outClear($args['class'] ?? '' ?: '');
    $outClass = empty($getClass) ? '' : ' ' . $getClass;

    // Get content.
    $getContent = trim($input);
    $outContent = $parser->recursiveTagParse($getContent, $frame);

    // Out parser.
    return '<div' . $outStyle . ' class="mw-grid' . $outClass . '">' . $outContent . '</div>';
  }

  /**
   * Render row function.
   *
   * @param $input
   * @param array $args
   * @param Parser $parser
   * @param PPFrame $frame
   *
   * @return string
   */
  public static function onRenderRow($input, array $args, Parser $parser, PPFrame $frame): string
  {
    // Argument: style.
    $getStyle = MW_EXT_Kernel::outClear($args['style'] ?? '' ?: '');
    $outStyle = empty($getStyle) ? '' : ' style="' . $getStyle . '"';

    // Argument: class.
    $getClass = MW_EXT_Kernel::outClear($args['class'] ?? '' ?: '');
    $outClass = empty($getClass) ? '' : ' ' . $getClass;

    // Get content.
    $getContent = trim($input);
    $outContent = $parser->recursiveTagParse($getContent, $frame);

    // Out parser.
    return '<div' . $outStyle . ' class="mw-grid-row' . $outClass . '">' . $outContent . '</div>';
  }

  /**
   * Render column function.
   *
   * @param $input
   * @param array $args
   * @param Parser $parser
   * @param PPFrame $frame
   *
   * @return string
   */
  public static function onRenderColumn($input, array $args, Parser $parser, PPFrame $frame): string
  {
    // Argument: style.
    $getStyle = MW_EXT_Kernel::outClear($args['style'] ?? '' ?: '');
    $outStyle = empty($getStyle) ? '' : ' style="' . $getStyle . '"';

    // Argument: class.
    $getClass = MW_EXT_Kernel::outClear($args['class'] ?? '' ?: '');
    $outClass = empty($getClass) ? '' : ' ' . $getClass;

    // Get content.
    $getContent = trim($input);
    $outContent = $parser->recursiveTagParse($getContent, $frame);

    // Out parser.
    return '<div' . $outStyle . ' class="mw-grid-column' . $outClass . '">' . $outContent . '</div>';
  }

  /**
   * Load resource function.
   *
   * @param OutputPage $out
   * @param Skin $skin
   *
   * @return void
   */
  public static function onBeforePageDisplay(OutputPage $out, Skin $skin): void
  {
    $out->addModuleStyles(['ext.mw.grid.styles']);
  }
}
