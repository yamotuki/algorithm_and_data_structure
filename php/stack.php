<?php

class TempTest extends \PHPUnit\Framework\TestCase
{
    public function test()
    {
        $solution = new Solution();

        $this->assertEquals(9, $solution->calcReversePolishNotation(["2","1","+","3","*"]));
    }
}

class Solution
{
    public function calcReversePolishNotation(array $tokens)
    {
        $stack = [];
        for ($i = 0; $i < count($tokens); $i++) {
            if (in_array($tokens[$i], ['+', '-', '*', '/'])) {
                $first = array_pop($stack);
                $second = array_pop($stack);
                if ($tokens[$i] === '+') {
                    $stack[] = $first + $second;
                } elseif ($tokens[$i] === '-') {
                    $stack[] = $second - $first;
                } elseif ($tokens[$i] === '*') {
                    $stack[] = $first * $second;
                } elseif ($tokens[$i] === '/') {
                    $stack[] = intdiv($second, $first);
                }
            } else {
                $stack[] = $tokens[$i];
            }

        }

        return array_pop($stack);
    }
}

/*
        $inp = (
        (new ListNode(1))->next =
        (new ListNode(0))->next =
            (new ListNode(1))
        );

 * */

class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val)
    {
        $this->val = $val;
    }
}

class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;

    function __construct($value)
    {
        $this->val = $value;
    }
}
