<?php

/*
 * 给定一个未排序的整数数组，找到最长递增子序列的个数。

示例 1:

输入: [1,3,5,4,7]
输出: 2
解释: 有两个最长递增子序列，分别是 [1, 3, 4, 7] 和[1, 3, 5, 7]。
示例 2:

输入: [2,2,2,2,2]
输出: 5
解释: 最长递增子序列的长度是1，并且存在5个子序列的长度为1，因此输出5。
注意: 给定的数组长度不超过 2000 并且结果一定是32位有符号整数。
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     * 执行用时：380 ms  内存消耗：15.4 MB
     */
    function findNumberOfLIS($nums) {
        $len = count($nums);
        if($len<=1) return $len;
        // 记录递增子序列长度
        $lengths = array_fill(0,$len,0);
        // 记录递增子序列长度对应的数量
        $counts = array_fill(0,$len,1);

        for ($i = 0; $i < $len; $i++) {
            for ($j = 0; $j < $i; $j++) {
                // 递增
                if($nums[$j] < $nums[$i]) {
                    // if 前面的递增长度 old_length 比当前值 new_length 大 那么 当前递增长度 new_length = old_length + 1
                    // 记录递增长度对应的数量 = old_cnt 个 new_length
                    if($lengths[$j] >= $lengths[$i]) {
                        $lengths[$i] = $lengths[$j] + 1;
                        $counts[$i] = $counts[$j];
                    }
                    // 如果 old_length + 1 刚好等于当前值
                    // 记录递增长度对应的数量 = old_cnt + new_cnt
                    else if($lengths[$j] + 1 == $lengths[$i]) {
                        $counts[$i] += $counts[$j];
                    }
                }
            }
        }

        $ans = 0;
        $longest = max($lengths);
        for($i=0;$i<$len;$i++){
            if($lengths[$i] == $longest) {
                $ans += $counts[$i];
            }
        }
        return $ans;
    }
}