<?php

use Hypatia\Number\Fraction\Unary as op;
use Hypatia\Number\Fraction\Rational;

test('Inverse of positive Rational should have its numerator = denominator and vice versa', function(){
    array_map(function($a){
        $i = op\inverse($a);
        
        expect($i->numerator)->toBe($a->denominator);
        expect($i->denominator)->toBe($a->numerator);
    }, [
        new Rational(3, 2),
        new Rational(-3, -2)
    ]);
});

test('Inverse of negative Rational should have negative numerator and positive denominator', function(){
    array_map(function($a){
        $i = op\inverse($a);
        
        expect($i->numerator)->toBe(-1 * $a->denominator);
        expect($i->denominator)->toBe(abs($a->numerator));
    }, [
        new Rational(-3, 2),
        new Rational(3, -2)
    ]);
});

test('inverse const call')->skip();