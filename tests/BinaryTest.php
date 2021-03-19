<?php

use Hypatia\Number\Fraction\Binary as op;
use Hypatia\Number\Fraction\Rational;



test('Adding 1/2 and 2/2 should return Rational 6/4', function(){
    (function($r){
        expect($r->numerator)->toBe(6);
        expect($r->denominator)->toBe(4);
    })(op\add(new Rational(1, 2), new Rational(2, 2)));
});

test('Adding 1/2 and -3/2 should return Rational -4/4', function(){
    (function($r){
        expect($r->numerator)->toBe(-4);
        expect($r->denominator)->toBe(4);
    })(op\add(new Rational(1, 2), new Rational(-3, 2)));
});






test('add const call')->skip();
test('multiply const call')->skip();
test('substract const call')->skip();
test('divide const call')->skip();
test('pow const call')->skip();
