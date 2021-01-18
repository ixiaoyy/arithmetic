<?php
/*
 * 你的赛车起始停留在位置 0，速度为 +1，正行驶在一个无限长的数轴上。（车也可以向负数方向行驶。）

你的车会根据一系列由 A（加速）和 R（倒车）组成的指令进行自动驾驶 。

当车得到指令 "A" 时, 将会做出以下操作： position += speed, speed *= 2。

当车得到指令 "R" 时, 将会做出以下操作：如果当前速度是正数，则将车速调整为 speed = -1 ；否则将车速调整为 speed = 1。  (当前所处位置不变。)

例如，当得到一系列指令 "AAR" 后, 你的车将会走过位置 0->1->3->3，并且速度变化为 1->2->4->-1。

现在给定一个目标位置，请给出能够到达目标位置的最短指令列表的长度。

示例 1:
输入:
target = 3
输出: 2
解释:
最短指令列表为 "AA"
位置变化为 0->1->3
示例 2:
输入:
target = 6
输出: 5
解释:
最短指令列表为 "AAARA"
位置变化为 0->1->3->7->7->6
说明:

1 <= target（目标位置） <= 10000。
 */

class Solution {

    /**
     * @param Integer $target
     * @return Integer
     * 执行用时：40 ms   内存消耗：15.4 MB
     */
    function racecar($target)
    {
        $dp = array_fill(0, $target + 3, PHP_INT_MAX);
        $dp[0] = 0;
        $dp[1] = 1;
        $dp[2] = 4;

        for ($t = 3; $t <= $target; ++$t) {
            $k = strlen(decbin($t));
            if ($t == (1 << $k) - 1) {
                $dp[$t] = $k;
                continue;
            }
            for ($j = 0; $j < $k - 1; ++$j)
                $dp[$t] = min($dp[$t], $dp[$t - (1 << ($k - 1)) + (1 << $j)] + $k - 1 + $j + 2);
            if ((1 << $k) - 1 - $t < $t)
                $dp[$t] = min($dp[$t], $dp[(1 << $k) - 1 - $t] + $k + 1);
        }

        return $dp[$target];
    }
}

