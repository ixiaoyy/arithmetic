<?php
/*
 * 给定一个无序的整数数组，找到其中最长上升子序列的长度。

示例:

输入: [10,9,2,5,3,7,101,18]
输出: 4
解释: 最长的上升子序列是 [2,3,7,101]，它的长度是 4。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/longest-increasing-subsequence
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     * 执行用时：1400 ms 内存消耗：15.7 MB
     */
    function lengthOfLIS($nums) {
        // 拼上最大的值，确保进入递归，最后长度-1
        $nums[] = PHP_INT_MAX;
        // 增加默认值，用于判断对应值是否已经记录
        $dp = array_fill(0,count($nums),-1);
        return $this->f($nums, count($nums)-1, $dp)-1;
    }

    function f($nums, $i, &$dp){
        if($dp[$i] != -1) return $dp[$i];
        $a = 1;
        for($j=0;$j<$i;$j++){
            if($nums[$j] < $nums[$i]){
                // 从 0 ~ i 如果比 i 位置上数字 小，至少是 上一个最大长度 + 1
                $a = max($a, $this->f($nums, $j, $dp) + 1);
            }
        }
        $dp[$i] = $a;
        return $dp[$i];
    }
}