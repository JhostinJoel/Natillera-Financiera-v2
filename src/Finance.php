<?php
final class Finance {
    public static function money($value): float { return round((float)$value, 2, PHP_ROUND_HALF_UP); }
    public static function applyContribution($paid, $due, string $raw=''): float { $amount=trim($raw)==='' ? $due-$paid : (float)$raw; return min($due,max(0,$paid+$amount)); }
    public static function validateLoan(string $type, int $active, string $name='', string $document=''): float { if($type==='PARTICIPANT'){if($active>=1) throw new InvalidArgumentException('El participante ya tiene un préstamo activo.'); return .05;} if(trim($name)===''||trim($document)==='') throw new InvalidArgumentException('El referido requiere nombre e identificación.'); return .10; }
    public static function amortization(float $principal,float $rate,int $term,DateTimeImmutable $start): array { $interest=self::money($principal*$rate);$part=self::money($principal/$term);$balance=self::money($principal);$rows=[];for($n=1;$n<=$term;$n++){ $capital=$n===$term?$balance:$part;$date=$start->modify("+{$n} month");$rows[]=['number'=>$n,'due_date'=>$date->format('Y-m-d'),'principal'=>self::money($capital),'interest'=>$interest,'total'=>self::money($capital+$interest)];$balance=self::money($balance-$capital);}return $rows; }
    public static function collectedInterest(array $installments, ?int $year=null): float { $total=0;foreach($installments as $i){if($year!==null&&(int)substr($i['due_date'],0,4)!==$year)continue;$total+=min((float)$i['paid_amount'],(float)$i['interest_amount']);}return self::money($total); }
}
