<?php
declare(strict_types=1);
include('I.php');
include('A.php');
include('B.php');
include('C.php');

class Demo
{
    public function typeAReturnA(): A
    {
        echo __FUNCTION__ . "<br>";
        return new A();
    }
    public function typeAReturnB(): A
    {
        echo __FUNCTION__ . "<br>";
        return new B();
    }
    public function typeAReturnC(): A
    {
        echo __FUNCTION__ . "<br>";
        return new C();
    }
    public function typeAReturnI(): A
    {
        echo __FUNCTION__ . "<br>";
        return new I();
    }
    public function typeAReturnNull(): A
    {
        echo __FUNCTION__ . "<br>";
        return null;
    }
    public function typeBReturnA(): B
    {
        echo __FUNCTION__ . "<br>";
        return new A();
    }
    public function typeBReturnB(): B
    {
        echo __FUNCTION__ . "<br>";
        return new B();
    }
    public function typeBReturnC(): B
    {
        echo __FUNCTION__ . "<br>";
        return new C();
    }
    public function typeBReturnI(): B
    {
        echo __FUNCTION__ . "<br>";
        return new I();
    }
    public function typeBReturnNull(): B
    {
        echo __FUNCTION__ . "<br>";
        return null;
    }
    public function typeCReturnA(): C
    {
        echo __FUNCTION__ . "<br>";
        return new A();
    }
    public function typeCReturnB(): C
    {
        echo __FUNCTION__ . "<br>";
        return new B();
    }
    public function typeCReturnC(): C
    {
        echo __FUNCTION__ . "<br>";
        return new C();
    }
    public function typeCReturnI(): C
    {
        echo __FUNCTION__ . "<br>";
        return new I();
    }
    public function typeCReturnNull(): C
    {
        echo __FUNCTION__ . "<br>";
        return null;
    }
    public function typeIReturnA(): I
    {
        echo __FUNCTION__ . "<br>";
        return new A();
    }
    public function typeIReturnB(): I
    {
        echo __FUNCTION__ . "<br>";
        return new B();
    }
    public function typeIReturnC(): I
    {
        echo __FUNCTION__ . "<br>";
        return new C();
    }
    public function typeIReturnI(): I
    {
        echo __FUNCTION__ . "<br>";
        return new I();
    }
    public function typeIReturnNull(): I
    {
        echo __FUNCTION__ . "<br>";
        return null;
    }
    public function typeNullReturnA(): Null
    {
        echo __FUNCTION__ . "<br>";
        return new A();
    }
    public function typeNullReturnB(): Null
    {
        echo __FUNCTION__ . "<br>";
        return new B();
    }
    public function typeNullReturnC(): Null
    {
        echo __FUNCTION__ . "<br>";
        return new C();
    }
    public function typeNullReturnI(): Null
    {
        echo __FUNCTION__ . "<br>";
        return new I();
    }
    public function typeNullReturnNull(): Null
    {
        echo __FUNCTION__ . "<br>";
        return null;
    }
}

$demo = new Demo();
$demo->typeAReturnA(); //true
// $demo->typeAReturnB(); //false
// $demo->typeAReturnC(); //false
// $demo->typeAReturnI(); //false
// $demo->typeAReturnNull(); //false

// $demo->typeBReturnA(); //false
$demo->typeBReturnB(); //true
// $demo->typeBReturnC(); //false
// $demo->typeBReturnI(); //false
// $demo->typeBReturnNull(); //false

$demo->typeCReturnA(); //true
$demo->typeCReturnB(); //true
$demo->typeCReturnC(); //true
// $demo->typeCReturnI(); //false
// $demo->typeCReturnNull(); //false

$demo->typeIReturnA(); //true
$demo->typeIReturnB(); //true
$demo->typeIReturnC(); //true
// $demo->typeIReturnI(); //false
// $demo->typeIReturnNull(); //false

// $demo->typeNullReturnA(); //false
// $demo->typeNullReturnB(); //false
// $demo->typeNullReturnC(); //false
// $demo->typeNullReturnI(); //false
$demo->typeNullReturnNull(); //true