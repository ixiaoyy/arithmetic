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
     * 执行用时：28 ms   内存消耗：15.8 MB
     */
    function lengthOfLIS($nums) {
        if(count($nums) < 2) return count($nums);
        $list = [];
        $len = 0;
        foreach($nums as $num){
            //如果当前提取的数字比递增数组最后一个（也就是最大的）数大
            //直接添加到最尾部，并把结果加一
            if($len==0 || $list[$len-1]<$num) $list[$len++] = $num;
            else{
                //在递增数组中用二分法删除并插入新数字
                $left = 0;
                $right = $len;
                while($left < $right){
                    $mid = floor(($left+$right)/2);//计算中间数index
                    //二分，找到第一个比$num小的数，并替换
                    if($list[$mid] < $num) $left = $mid+1;
                    else $right = $mid;
                }
                $list[$left] = $num;
            }
        }
        return $len;
    }
}