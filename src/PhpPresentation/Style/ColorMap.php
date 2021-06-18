<?php
/**
 * This file is part of PHPPresentation - A pure PHP library for reading and writing
 * presentations documents.
 *
 * PHPPresentation is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPPresentation/contributors.
 *
 * @link        https://github.com/PHPOffice/PHPPresentation
 * @copyright   2009-2015 PHPPresentation contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpPresentation\Style;

/**
 * PhpOffice\PhpPresentation\Style\ColorMap
 */
class ColorMap
{
    public const COLOR_BG1 = 'bg1';
    public const COLOR_BG2 = 'bg2';
    public const COLOR_TX1 = 'tx1';
    public const COLOR_TX2 = 'tx2';
    public const COLOR_ACCENT1 = 'accent1';
    public const COLOR_ACCENT2 = 'accent2';
    public const COLOR_ACCENT3 = 'accent3';
    public const COLOR_ACCENT4 = 'accent4';
    public const COLOR_ACCENT5 = 'accent5';
    public const COLOR_ACCENT6 = 'accent6';
    public const COLOR_HLINK = 'hlink';
    public const COLOR_FOLHLINK = 'folHlink';

    /**
     * Mapping - Stores the mapping betweenSlide and theme
     *
     * @var array<string, string>
     */
    protected $mapping = array();

    /**
     * @var array<string, string>
     */
    public static $mappingDefault = array(
        self::COLOR_BG1 => 'lt1',
        self::COLOR_TX1 => 'dk1',
        self::COLOR_BG2 => 'lt2',
        self::COLOR_TX2 => 'dk2',
        self::COLOR_ACCENT1 => 'accent1',
        self::COLOR_ACCENT2 => 'accent2',
        self::COLOR_ACCENT3 => 'accent3',
        self::COLOR_ACCENT4 => 'accent4',
        self::COLOR_ACCENT5 => 'accent5',
        self::COLOR_ACCENT6 => 'accent6',
        self::COLOR_HLINK => 'hlink',
        self::COLOR_FOLHLINK => 'folHlink'
    );

    /**
     * ColorMap constructor.
     * Create a new ColorMap with standard values
     */
    public function __construct()
    {
        $this->mapping = self::$mappingDefault;
    }

    /**
     * Change the color of one of the elements in the map
     *
     * @param string $item
     * @param string $newThemeColor
     * @return self
     */
    public function changeColor(string $item, string $newThemeColor): self
    {
        $this->mapping[$item] = $newThemeColor;
        return $this;
    }

    /**
     * Store a new map. For use with the reader
     *
     * @param array<string, string> $arrayMapping
     * @return self
     */
    public function setMapping(array $arrayMapping = array()): self
    {
        $this->mapping = $arrayMapping;
        return $this;
    }

    /**
     * Get the whole mapping as an array
     *
     * @return array<string, string>
     */
    public function getMapping(): array
    {
        return $this->mapping;
    }
}
