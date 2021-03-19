<?php

use Hypatia\Number\Fraction as fr;
use Hypatia\Number\Fraction\Rational;

beforeEach(function () {
    $this->r_0 = fr\float_to_rational(0);
    $this->r_5_2 = fr\float_to_rational(2.5);
    $this->r_minus_1_4 = fr\float_to_rational(-0.25);
});

test('Positive float to rational should return rational object', function(){
    expect($this->r_5_2)->toBeInstanceOf(Rational::class);
});

test('Negative float to rational should return rational object', function(){
    expect($this->r_minus_1_4)->toBeInstanceOf(Rational::class);
});

test('Zero float to rational should return rational object', function(){
    expect($this->r_0)->toBeInstanceOf(Rational::class);
});



test('GCD of 8 and 4 should be 2', function(){
    expect(fr\gcd(8, 4))->toBe(4);
});

test('Reduce [6,8] should return array [3, 4]', function(){
    expect(fr\reduce(6, 8))->toBe([3, 4]);
});

test('Reduce [6,-9] should return array [-2, 3]', function(){
    expect(fr\reduce(6, -9))->toBe([-2, 3]);
});

test('Reduce [0,3] should return array [0, 1]', function(){
    expect(fr\reduce(0, 3))->toBe([0, 1]);
});

test('Reduce [0,-3] should return array [0, 1]', function(){
    expect(fr\reduce(0, -3))->toBe([0, 1]);
});

test('Reduce [(-)6,(-)8] should return array [(-)3, 4]', function(){
    expect(fr\reduce(6, 8))->toBe([3, 4]);
    expect(fr\reduce(-6, 8))->toBe([-3, 4]);
    expect(fr\reduce(6, -8))->toBe([-3, 4]);
    expect(fr\reduce(-6, -8))->toBe([3, 4]);
});

test('float_to_rational const call')->skip();
test('gcd const call')->skip();
test('reduce const call')->skip();
test('sign const call')->skip();