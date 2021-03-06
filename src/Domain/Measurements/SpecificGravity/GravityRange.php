<?php

namespace Beeriously\Domain\Measurements\SpecificGravity;

use Beeriously\Domain\Measurements\AlcoholConcentration\AlcoholByVolume;
use Beeriously\Domain\Measurements\AlcoholConcentration\AlcoholByWeight;

class GravityRange
{
    /**
     * @var OriginalGravity
     */
    private $og;
    /**
     * @var FinalGravity
     */
    private $fg;

    public function __construct(OriginalGravity $og, FinalGravity $fg)
    {
        if($fg->getValue() < $og->getValue()) {
            throw new \InvalidArgumentException("Final Gravity Must Be Less Than Original Gravity");
        }
        $this->og = $og;
        $this->fg = $fg;
    }

    public function getAlcoholByVolume(): AlcoholByVolume
    {
        return AlcoholByVolume::fromGravityRange($this);
    }

    public function getAlcoholByWeight(): AlcoholByWeight
    {
        return AlcoholByWeight::fromGravityRange($this);
    }

    public function getOriginalGravity(): OriginalGravity
    {
        return $this->og;
    }

    public function getFinalGravity(): FinalGravity
    {
        return $this->fg;
    }

}