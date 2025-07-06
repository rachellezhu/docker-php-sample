<?php

require_once '../html/calculator.php';

class CalculatorTest extends PHPUnit\Framework\TestCase
{
 public function testSum()
 {
  $sum = Calculator::sum(2,5);

  $this->assertEquals("integer", gettype($sum));
  $this->assertEquals(7, $sum);
 }
 public function testSumFloat()
 {
  $sum = Calculator::sum(2.5,5);

  $this->assertEquals("double", gettype($sum));
  $this->assertEquals(7.5, $sum);
 }

 public function testSub()
 {
  $sub = Calculator::sub(10,5);

  $this->assertEquals("integer", gettype($sub));
  $this->assertEquals(5, $sub);
 }

 public function testSubFloat()
 {
  $sub = Calculator::sub(10.12345,5);

  $this->assertEquals("double", gettype($sub));
  $this->assertEquals(5.12345, $sub);
 }
}