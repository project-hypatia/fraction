<?php

namespace Hypatia\Number\Fraction\Comparison;

use Hypatia\Number\Fraction\Rational;


function equals(Rational $a, Rational $b): bool
{
    return (
        fn($a, $b) => 
        ($a->denominator === $b->denominator)
        &&
        ($a->numerator === $b->numerator)
    )($a->reduce(), $b->reduce());
}

function gt(Rational $a, Rational $b): bool
{
    
}

function gte(Rational $a, Rational $b): bool
{

}

function lt(Rational $a, Rational $b): bool
{
    
}

function lte(Rational $a, Rational $b): bool
{

}

const equals    = '\Hypatia\Number\Fraction\Comparison\equals';
const gt        = '\Hypatia\Number\Fraction\Comparison\gt';
const gte       = '\Hypatia\Number\Fraction\Comparison\gte';
const lt        = '\Hypatia\Number\Fraction\Comparison\lt';
const lte       = '\Hypatia\Number\Fraction\Comparison\lte';