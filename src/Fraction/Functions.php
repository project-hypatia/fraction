<?php

namespace Hypatia\Number\Fraction;

use Garp\Functional AS f;

function float_to_rational(float $float): Rational
{
    return f\compose(
        fn($d) => new Rational($float * $d, $d),
        fn($l) => pow(10, $l),
        'strlen',
        fn($s) => trim($s, '.'),
        fn($s) => strstr($s, '.'),
        fn($s) => rtrim($s, '0'),
        fn($f) => sprintf('%.10F', $f)
    )($float)->reduce();
}


function gcd(int $a, int $b): int
{
    return $b ? gcd($b, $a % $b) : $a;
}

function reduce(int $numerator, int $denominator): array
{
    return (fn($div, $sign) => [
        $sign * (abs($numerator) / $div), 
        abs($denominator) / $div
    ])(
        abs(gcd($numerator, $denominator)), 
        ($numerator / $denominator) < 0 ? -1 : 1
    );
}

function sign(int $numerator, int $denominator): int
{
    if ($numerator == 0) {
        return 0;
    }

    return ($numerator / $denominator) > 0 ? 1 : -1;
}

const float_to_rational = '\Hypatia\Number\Fraction\float_to_rational';
const gcd               = '\Hypatia\Number\Fraction\gcs';
const reduce            = '\Hypatia\Number\Fraction\reduce';
const sign              = '\Hypatia\Number\Fraction\sign';