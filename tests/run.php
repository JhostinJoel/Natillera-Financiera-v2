<?php
require_once __DIR__.'/../src/Finance.php';
$passed=0;$failed=0;
function test(string $name, callable $fn): void { global $passed,$failed;try{$fn();echo "PASS {$name}\n";$passed++;}catch(Throwable $e){echo "FAIL {$name}: {$e->getMessage()}\n";$failed++;}}
function eq($a,$b): void {if($a!==$b)throw new Exception(var_export($a,true).' !== '.var_export($b,true));}
test('redondeo monetario',fn()=>eq(Finance::money('1.005'),1.01));
test('aporte completo por campo vacío',fn()=>eq(Finance::applyContribution(0,100,''),100.0));
test('aporte parcial no supera deuda',fn()=>eq(Finance::applyContribution(80,100,'50'),100.0));
test('tasa propia 5%',fn()=>eq(Finance::validateLoan('PARTICIPANT',0),.05));
test('bloquea segundo préstamo propio',fn()=>tryThrow(fn()=>Finance::validateLoan('PARTICIPANT',1)));
test('referido exige identidad',fn()=>tryThrow(fn()=>Finance::validateLoan('REFERRED',0)));
test('amortización fija',function(){ $rows=Finance::amortization(1000000,.05,5,new DateTimeImmutable('2026-10-24'));eq(count($rows),5);eq($rows[0]['interest'],50000.0);eq($rows[4]['interest'],50000.0);eq(array_sum(array_column($rows,'principal')),1000000.0);});
test('interés cobrado prioriza límite de cuota',fn()=>eq(Finance::collectedInterest([['due_date'=>'2026-01-01','paid_amount'=>25000,'interest_amount'=>50000]]),25000.0));
echo "{$passed} passed, {$failed} failed\n";exit($failed?1:0);
function tryThrow(callable $fn): void {try{$fn();}catch(InvalidArgumentException $e){return;}throw new Exception('no lanzó excepción');}
