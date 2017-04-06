<?php
/**
 * Created by PhpStorm.
 * User: frowhy
 * Date: 2017/4/4
 * Time: 04:14
 *
 *_______________%%%%%%%%%_______________________
 *______________%%%%%%%%%%%%_____________________
 *______________%%%%%%%%%%%%%____________________
 *_____________%%__%%%%%%%%%%%___________________
 *____________%%%__%%%%%%_%%%%%__________________
 *____________%%%_%%%%%%%___%%%%_________________
 *___________%%%__%%%%%%%%%%_%%%%________________
 *__________%%%%__%%%%%%%%%%%_%%%%_______________
 *________%%%%%___%%%%%%%%%%%__%%%%%_____________
 *_______%%%%%%___%%%_%%%%%%%%___%%%%%___________
 *_______%%%%%___%%%___%%%%%%%%___%%%%%%_________
 *______%%%%%%___%%%__%%%%%%%%%%%___%%%%%%_______
 *_____%%%%%%___%%%%_%%%%%%%%%%%%%%__%%%%%%______
 *____%%%%%%%__%%%%%%%%%%%%%%%%%%%%%_%%%%%%%_____
 *____%%%%%%%__%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%____
 *___%%%%%%%__%%%%%%_%%%%%%%%%%%%%%%%%_%%%%%%%___
 *___%%%%%%%__%%%%%%_%%%%%%_%%%%%%%%%___%%%%%%___
 *___%%%%%%%____%%__%%%%%%___%%%%%%_____%%%%%%___
 *___%%%%%%%________%%%%%%____%%%%%_____%%%%%____
 *____%%%%%%________%%%%%_____%%%%%_____%%%%_____
 *_____%%%%%________%%%%______%%%%%_____%%%______
 *______%%%%%______;%%%________%%%______%________
 *________%%_______%%%%________%%%%______________
 */

namespace Frowhy\Algorithm;

class Algorithm
{
    public static function quickSort($arr) {
        if (! is_array($arr)) {
            return false;
        }
        $len = count($arr);
        if ($len <= 1) {
            return $arr;
        }
        $left = $right = [];

        for ($i = 1; $i < $len; $i++) {
            if ($arr[$i] < $arr[0]) {
                $left[] = $arr[$i];
            } else {
                $right[] = $arr[$i];
            }
        }
        $left  = self::quickSort($left);
        $right = self::quickSort($right);

        return array_merge($left, [$arr[0]], $right);
    }

    static function array_swap($arr, $l, $r) {
        $arr[$l] = $arr[$l] ^ $arr[$r];
        $arr[$r] = $arr[$l] ^ $arr[$r];
        $arr[$l] = $arr[$l] ^ $arr[$r];

        return $arr;
    }

    public static function bubbleSort($arr) {
        if (! is_array($arr)) {
            return false;
        }
        $len = count($arr);
        if ($len <= 1) {
            return $arr;
        }

        for ($i = 1; $i < $len; $i++) {
            $max_j = $len - $i;
            for ($j = 0; $j < $max_j; $j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    $arr = self::array_swap($arr, $j, $j + 1);
                }
            }
        }

        return $arr;
    }

    public static function selectionSort($arr) {
        if (! is_array($arr)) {
            return false;
        }
        $len = count($arr);
        if ($len <= 1) {
            return $arr;
        }

        for ($i = 0; $i < $len; $i++) {
            $min_i = $arr[$i];
            $index = $i;
            $min_j = $i + 1;
            for ($j = $min_j; $j < $len; $j++) {
                if ($arr[$j] < $min_i) {
                    $min_i = $arr[$j];
                    $index = $j;
                }
            }
            if ($i < $index) {
                $arr = self::array_swap($arr, $i, $index);
            }
        }

        return $arr;
    }

    public static function insertionSort($arr) {
        if (! is_array($arr)) {
            return false;
        }
        $len = count($arr);
        if ($len <= 1) {
            return $arr;
        }

        for ($i = 0; $i < $len; $i++) {
            $pre_i   = $i - 1;
            $current = $arr[$i];
            while ($pre_i >= 0 && $arr[$pre_i] > $current) {
                $arr[$pre_i + 1] = $arr[$pre_i];
                $pre_i -= 1;
            }
            $arr[$pre_i + 1] = $current;
        }

        return $arr;
    }

    public static function shellSort($arr) {
        if (! is_array($arr)) {
            return false;
        }
        $len = count($arr);
        if ($len <= 1) {
            return $arr;
        }

        $gap   = 1;
        $pre_i = $len / 3;
        while ($gap < $pre_i) {
            $gap = $gap * 3 + 1;
        }

        while ($gap > 0) {
            for ($i = 0; $i < $len; $i++) {
                $temp = $arr[$i];
                $j    = $i - $gap;

                while ($j >= 0 and $arr[$j] > $temp) {

                    $arr[$j + $gap] = $arr[$j];
                    $j -= $gap;
                }

                $arr[$j + $gap] = $temp;
            }

            $gap = floor($gap / 3);
        }

        return $arr;
    }

    public static function mergeSort(&$arr) {
        if (! is_array($arr)) {
            return false;
        }
        $len = count($arr);
        if ($len <= 1) {
            return $arr;
        }

        $mid   = $len >> 1;
        $left  = array_slice($arr, 0, $mid);
        $right = array_slice($arr, $mid);
        static::mergeSort($left);
        static::mergeSort($right);
        if (end($left) <= $right[0]) {
            $arr = array_merge($left, $right);
        } else {
            for ($i = 0, $j = 0, $k = 0; $k <= $len - 1; $k++) {
                if ($i >= $mid && $j < $len - $mid) {
                    $arr[$k] = $right[$j++];
                } elseif ($j >= $len - $mid && $i < $mid) {
                    $arr[$k] = $left[$i++];
                } elseif ($left[$i] <= $right[$j]) {
                    $arr[$k] = $left[$i++];
                } else {
                    $arr[$k] = $right[$j++];
                }
            }
        }

        return $arr;
    }

    public static function countingSort($arr) {
        if (! is_array($arr)) {
            return false;
        }
        $len = count($arr);
        if ($len <= 1) {
            return $arr;
        }

        $count = $sorted = [];
        $min   = min($arr);
        $max   = max($arr);
        for ($i = 0; $i < $len; $i++) {
            $count[$arr[$i]] = isset($count[$arr[$i]]) ? $count[$arr[$i]] + 1 : 1;
        }
        for ($j = $min; $j <= $max; $j++) {
            while (isset($count[$j]) && $count[$j] > 0) {
                $sorted[] = $j;
                $count[$j]--;
            }
        }

        return $sorted;
    }

    public static function heapSort($arr) {
        if (! is_array($arr)) {
            return false;
        }
        global $len;
        $len = count($arr);
        if ($len <= 1) {
            return $arr;
        }

        for ($i = $len; $i >= 0; $i--) {
            self::heapify($arr, $i);
        }

        return $arr;
    }

    static function heapify($arr, $i) {
        $left    = 2 * $i + 1;
        $right   = 2 * $i + 2;
        $largest = $i;

        global $len;
        if ($left < $len && $arr[$left] > $arr[$largest]) {
            $largest = $left;
        }
        if ($right < $len && $arr[$right] > $arr[$largest]) {
            $largest = $right;
        }
        if ($largest != $i) {
            self::array_swap($arr, $i, $largest);
            self::heapify($arr, $largest);
        }
    }
}
