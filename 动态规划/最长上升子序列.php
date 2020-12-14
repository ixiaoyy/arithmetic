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
     * 执行用时：1228 ms 内存消耗： 15.6 MB
     */
    function lengthOfLIS($nums) {
        // 从左到右 ， 0 ~ count($nums)-1 个位置
        // 第 i 个位置的最大子序列 = 第 i - 1 个位置 + 1/0 (是否继续递增)
        // 默认每个位置最大子序列长度为 1
        $cnt = count($nums);
        if($cnt==0) return 0;
        $arr = array_fill(0, $cnt, 1);
        for ($i=1;$i<$cnt;$i++){
            for($j=0;$j<$i;$j++){
                if($nums[$i] > $nums[$j]) {
                    $arr[$i] = max($arr[$i],$arr[$j]+ 1);
                }
            }
        }
        return max($arr);
    }
}