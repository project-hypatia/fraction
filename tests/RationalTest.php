<?php

use Hypatia\Number\Fraction\Rational;

beforeEach(function () {
    $this->r_0 = new Rational(0);
    $this->r_5_2 = new Rational(5, 2);
    $this->r_minus_1_4 = new Rational(-1, 4);
});


test('Positive rational should have positive sign', function(){
    $this->assertEquals(1, $this->r_5_2->sign);
});

test('Rational of 5/2 should have 5 as numerator', function(){
    $this->assertEquals(5, $this->r_5_2->numerator);
});

test('Rational of 5/2 should have 2 as denominator', function(){
    $this->assertEquals(2, $this->r_5_2->denominator);
});


test('Negative rational should have negative sign', function(){
    $this->assertEquals(-1, $this->r_minus_1_4->sign);
});

test('Rational of -1/4 should have -1 as numerator', function(){
    $this->assertEquals(-1, $this->r_minus_1_4->numerator);
});

test('Rational of -1/4 should have 4 as denominator', function(){
    $this->assertEquals(4, $this->r_minus_1_4->denominator);
});

test('Rational instanced with 1/-4 should have -1 as numerator', function(){
    $this->assertEquals(-1, $this->r_minus_1_4->numerator);
});

test('Rational instanced with 1/-4 should have 4 as denominator', function(){
    $this->assertEquals(4, $this->r_minus_1_4->denominator);
});

test('Rational of 0 should have null sign', function(){
    $this->assertEquals(0, $this->r_0->sign);
});

test('Rational of 0 should have 0 as numerator', function(){
    $this->assertEquals(0, $this->r_0->numerator);
});

test('Rational of 0 should have 1 as denominator', function(){
    $this->assertEquals(1, $this->r_0->denominator);
});

test('Rational having impossible 0 value as denominator should raise InvalidArgumentException', function(){
    new Rational(3, 0);
})->throws(\InvalidArgumentException::class, 'Denominator cannot be zero');

test('Rational 3/9 could be reduced to Rational 1/3', function(){
    $long       = new Rational(3, 9);
    $short      = new Rational(1, 3);
    $reduced    = $long->reduce();

    expect($reduced->numerator)->toBe($short->numerator);
    expect($reduced->denominator)->toBe($short->denominator);
});

test('Rational instanced by 3/-9 could be reduced to Rational -1/3', function(){
    $long       = new Rational(3, -9);
    $short      = new Rational(-1, 3);
    $reduced    = $long->reduce();

    expect($reduced->numerator)->toBe($short->numerator);
    expect($reduced->denominator)->toBe($short->denominator);
});


test('Rational of 1/4 could be exported to float 0.25', function(){
    expect((new rational(1, 4))->toFloat())->toBe(0.25);
});

test('Rational of -1/4 could be exported to float -0.25', function(){
    expect((new rational(-1, 4))->toFloat())->toBe(-0.25);
});

test('Rational of 0/4 could be exported to float 0.0', function(){
    expect((new rational(0, 4))->toFloat())->toBe(0.0);
});


test('Rational with denominator != 1 should not be view as integer', function(){
    expect((new Rational(4, 2))->isInt())->toBe(false);
});

test('Rational with denominator == 1 should be view as integer', function(){
    expect((new Rational(4, 2))->reduce()->isInt())->toBe(true);
    expect((new Rational(2, 1))->isInt())->toBe(true);
    expect((new Rational(-2, 1))->isInt())->toBe(true);
    expect((new Rational(2, -1))->isInt())->toBe(true);
    expect((new Rational(-2, -1))->isInt())->toBe(true);
});

test('Possible rational to int should return int', function(){
    expect((new Rational(2, 1))->toInt())->toBeInt();
});

test('Not possible rational to int should throw RuntimeException', function(){
    (new Rational(2, 3))->toInt();
})->throws(\RuntimeException::class);

test('Rational should have toString output', function(){
    expect((string)(new Rational(1, 3)))->toBe('1/3');
    expect((string)(new Rational(-1, 3)))->toBe('-1/3');
    expect((string)(new Rational(1, -3)))->toBe('-1/3');
    expect((string)(new Rational(-1, -3)))->toBe('1/3');
});