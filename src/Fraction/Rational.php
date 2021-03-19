<?php

namespace Hypatia\Number\Fraction;

class Rational
{
    protected int $numerator    = 0;
    protected int $denominator  = 1;
    protected int $sign         = 1;

    public function __get($name): int
    {
        return $this->$name;
    }

    public function __construct(int $numerator, int $denominator = 1)
    {
        if ($denominator == 0) {
            throw new \InvalidArgumentException('Denominator cannot be zero');
        }

        $this->sign         = sign($numerator, $denominator);
        $this->numerator    = $this->sign * abs($numerator);
        $this->denominator  = abs($denominator);
        // TODO check limit
    }

    public function reduce(): Rational
    {
        return new self(...reduce($this->numerator, $this->denominator));
    }

    public function toFloat(): float
    {
        return $this->numerator / $this->denominator;
    }

    public function isInt(): bool
    {
        return $this->denominator == 1;
    }

    public function toInt(): int
    {
        if ($this->denominator != 1) {
            throw new \RuntimeException('Cannot get integer. Try to reduce it before.');
        }

        return (int) $this->numerator;
    }

    public function __toString(): string
    {
        return sprintf('%d/%d', $this->numerator, $this->denominator);
    }
}
