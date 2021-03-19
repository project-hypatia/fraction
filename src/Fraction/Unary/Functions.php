<?php

namespace Hypatia\Number\Fraction\Unary;

use Hypatia\Number\Fraction\Rational;

function inverse(Rational $r): Rational
{
    return new Rational($r->denominator, $r->numerator);
}

function abs(Rational $r): Rational
{
    return new Rational(\abs($r->numerator), $r->denominator);
}

const inverse   = '\Hypatia\Number\Fraction\Unary\inverse';
const abs       = '\Hypatia\Number\Fraction\Unary\abs';