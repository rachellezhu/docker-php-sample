<?php

class Calculator{
 public static function sum(int|float $a, int|float $b): int|float
 {
  return $a + $b;
 }

 public static function sub(int|float $a, int|float $b): int|float
 {
  return $a - $b;
 }
}