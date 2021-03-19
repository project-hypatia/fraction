<?php

namespace Hypatia\Number\Fraction\Binary;

use Hypatia\Number\Fraction\Rational;
use Garp\Functional AS f;



function add(Rational $a, Rational $b): Rational
{
    return new Rational(
        f\add(
            f\multiply($a->numerator)($b->denominator)
        )
        (
            f\multiply($a->denominator)($b->numerator)
        ),
        f\multiply($a->denominator)($b->denominator)
    );
}



function substract(Rational $a, Rational $b): Rational
{
    return add($a, multiply(new Rational(-1), $b));
}



function multiply(Rational $a, Rational $b): Rational
{
    return new Rational(
        f\multiply($a->numerator)($b->numerator),
        f\multiply($a->denominator)($b->denominator)
    );
}


function divide(Rational $a, Rational $b): Rational
{
    return multiply($a, inverse($b));
}

function pow(Rational $r, int $power): Rational
{
    $p = \abs($power);

    if ($power < 0 && $n == 0) {
        throw new \RuntimeException('Cannot raise zero to a negative exponent.');
    }

    return new Rational(
        $power < 0 ? $d ** $p : $n ** $p,
        $power < 0 ? $n ** $p : $d ** $p
    );
}

const add       = '\Hypatia\Number\Fraction\Binary\add';
const substract = '\Hypatia\Number\Fraction\Binary\substract';
const multiply  = '\Hypatia\Number\Fraction\Binary\multiply';
const divide    = '\Hypatia\Number\Fraction\Binary\divide';
const pow       = '\Hypatia\Number\Fraction\Binary\pow';