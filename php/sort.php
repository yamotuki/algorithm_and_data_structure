<?php

class TempTest extends \PHPUnit\Framework\TestCase
{
    public function test()
    {
        $solution = new Solution();

        $this->assertEquals([1, 2, 3], $solution->selectionSort([2, 1, 3]));
        $this->assertEquals([1, 2, 3, 4, 5], $solution->selectionSort([5, 3, 2, 4, 1]));
    }
}

class Solution
{
    public function selectionSort(array $a): array
    {
        $len = count($a);

        for ($i = 0; $i < $len; $i++) {
            $minJ = $i;
            for ($j = $i + 1; $j < $len; $j++) {
                if ($a[$j] < $a[$minJ]) {
                    $minJ = $j;
                }
            }
            $temp = $a[$i];
            $a[$i] = $a[$minJ];
            $a[$minJ] = $temp;

        }

        return $a;
    }

    public function bubbleSort(array $input)
    {
        $flag = true;
        $swapCount = 0;
        $sorted = 0;
        while ($flag) {
            $flag = false;
            for ($j = count($input) - 1; $j > $sorted; $j--) {
                if ($input[$j] < $input[$j - 1]) {
                    $swapCount++;
                    $temp = $input[$j];
                    $input[$j] = $input[$j - 1];
                    $input[$j - 1] = $temp;

                    $flag = true;
                }
            }
            $sorted++;
        }

        var_dump($swapCount);

        return $input;
    }

    public function insertionSort(array $input)
    {
        for ($i = 1; $i < count($input); $i++) {
            $key = $input[$i];
            $j = $i - 1;
            while ($j >= 0 && $input[$j] > $key) {
                $input[$j + 1] = $input[$j];
                $j--;
            }
            $input[$j + 1] = $key;
        }

        return $input;
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
