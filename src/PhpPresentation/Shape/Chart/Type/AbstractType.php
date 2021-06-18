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

namespace PhpOffice\PhpPresentation\Shape\Chart\Type;

use PhpOffice\PhpPresentation\ComparableInterface;
use PhpOffice\PhpPresentation\Shape\Chart\Series;

/**
 * \PhpOffice\PhpPresentation\Shape\Chart\Type
 */
abstract class AbstractType implements ComparableInterface
{
    /**
     * Has Axis X?
     *
     * @var boolean
     */
    protected $hasAxisX = true;

    /**
     * Has Axis Y?
     *
     * @var boolean
     */
    protected $hasAxisY = true;

    /**
     * Hash index
     *
     * @var int
     */
    private $hashIndex;

    /**
     * @var array<int, Series>
     */
    private $series = array();

    /**
     * Has Axis X?
     *
     * @return boolean
     */
    public function hasAxisX(): bool
    {
        return $this->hasAxisX;
    }

    /**
     * Has Axis Y?
     *
     * @return boolean
     */
    public function hasAxisY(): bool
    {
        return $this->hasAxisY;
    }

    /**
     * Get hash index
     *
     * Note that this index may vary during script execution! Only reliable moment is
     * while doing a write of a workbook and when changes are not allowed.
     *
     * @return int|null Hash index
     */
    public function getHashIndex(): ?int
    {
        return $this->hashIndex;
    }

    /**
     * Set hash index
     *
     * Note that this index may vary during script execution! Only reliable moment is
     * while doing a write of a workbook and when changes are not allowed.
     *
     * @param int $value Hash index
     * @return AbstractType
     */
    public function setHashIndex(int $value)
    {
        $this->hashIndex = $value;
        return $this;
    }

    /**
     * Add Series
     *
     * @param Series $value
     * @return $this
     */
    public function addSeries(Series $value)
    {
        $this->series[] = $value;
        return $this;
    }

    /**
     * Get Series
     *
     * @return array<int, Series>
     */
    public function getSeries(): array
    {
        return $this->series;
    }

    /**
     * Set Series
     *
     * @param array<int, Series> $series
     * @return $this
     */
    public function setSeries(array $series = array())
    {
        $this->series = $series;
        return $this;
    }

    /**
     * Get Data
     *
     * @deprecated getSeries
     * @return array<int, Series>
     */
    public function getData(): array
    {
        return $this->getSeries();
    }

    /**
     * Set Data
     *
     * @deprecated setSeries
     * @param array<int, Series> $value
     * @return AbstractType
     */
    public function setData(array $value = array())
    {
        return $this->setSeries($value);
    }

    /**
     * @link http://php.net/manual/en/language.oop5.cloning.php
     */
    public function __clone()
    {
        $arrayClone = array();
        foreach ($this->series as $itemSeries) {
            $arrayClone[] = clone $itemSeries;
        }
        $this->series = $arrayClone;
    }
}
