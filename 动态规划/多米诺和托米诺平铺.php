<?php
/*
 * 790. 多米诺和托米诺平铺
有两种形状的瓷砖：一种是 2x1 的多米诺形，另一种是形如 "L" 的托米诺形。两种形状都可以旋转。

XX  <- 多米诺

XX  <- "L" 托米诺
X
给定 N 的值，有多少种方法可以平铺 2 x N 的面板？返回值 mod 10^9 + 7。

（平铺指的是每个正方形都必须有瓷砖覆盖。两个平铺不同，当且仅当面板上有四个方向上的相邻单元中的两个，使得恰好有一个平铺有一个瓷砖占据两个正方形。）

示例:
输入: 3
输出: 5
解释:
下面列出了五种不同的方法，不同字母代表不同瓷砖：
XYZ XXZ XYY XXY XYY
XYZ YYZ XZZ XYY XXY
提示：

N  的范围是 [1, 1000]
 */
class Solution {

    /**
     * @param Integer $N
     * @return Integer
     * 执行用时：8 ms    内存消耗：15.4 MB
     */
    function numTilings($N) {
        $mod = 1000000007;
        $dp = array_fill(0, $N+3, 0);
        $dp[0] = 1;
        $dp[1] = 1;
        $dp[2] = 2;
        $dp[3] = 5;
        // dp[n] = 2*dp[n-1] + dp[n-3]
        for($i = 4; $i <= $N; $i++){
            $dp[$i] = (2*($dp[$i-1] % $mod) % $mod + $dp[$i-3] % $mod) % $mod;
        }
        return $dp[$N];
    }
} 0