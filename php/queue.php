<?php

class TempTest extends \PHPUnit\Framework\TestCase
{
    public function test()
    {
        $solution = new Solution();

        $this->assertEquals(["p2 180", "p5 400", "p1 450", "p3 550", "p4 800"],
            $solution->executeCPUTasks(100, ["p1 150", "p2 80", "p3 200", "p4 350", "p5 20"]));
    }
}

class Solution
{
    public function executeCPUTasks(int $quantum, array $arr): array
    {
        $next = explode(' ', $arr[0]);
        $startNode = new ListNode(['name' => $next[0], 'time' => $next[1]]);
        $current = $startNode;
        for ($i = 1; $i < count($arr); $i++) {
            $next = explode(' ', $arr[$i]);
            $nextNode = new ListNode(['name' => $next[0], 'time' => $next[1]]);
            $current->next = $nextNode;
            $current = $nextNode;
        }
        $endNode = $current;

        $result = [];
        $step = 0;
        $finishedTime = 0;
        $current = $startNode;
        while ($current !== null) {
            $current->val['time'] = $current->val['time'] - $quantum;
            $finishedTime += $quantum;
            $next = $current->next;
            if ($current->val['time'] > 0) {
                $endNode->next = $current;
                $current->next = null;
                $endNode = $current;
            } else {
                // ended task
                $current->next = null;
                $finishedTime += $current->val['time'];
                $result[] = $current->val['name'] . " " . $finishedTime;
            }
            $current = $next;

            $step++;
        }

        echo $step . "\n";

        $result[] = $endNode->val['name'] . " " . ($finishedTime + $endNode->val['time']);
        return $result;
    }
}

class ListNode
{
    public $val;
    public $next = null;

    function __construct(array $val)
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
