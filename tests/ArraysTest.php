<?php

use PHPUnit\Framework\TestCase;

class ArraysTest extends TestCase
{
    /**
     * Uncomment assertions and Replace `?` in asserts with the correct value
     */
    public function testIntegerKey()
    {
        $arr = [];
        $arr[] = 'a';
        $arr[] = 'b';
        $arr[] = 'c';

        // Which index will have 'c'?
        $this->assertEquals(2, array_key_last($arr));

        $arr[10] = 'd';
        $arr[] = 'e';

        // Which index will have 'e'?
        $this->assertEquals(11, array_key_last($arr));

        $arr['string'] = 'f';
        $arr[] = 'h';

        // Which index will have 'h'?
        $this->assertEquals(12, array_key_last($arr));
    }

    /**
     * Uncomment assertions and Replace `?` in asserts with the correct value
     */
    public function testKeyCasting()
    {
        $arr = [];
        $arr[] = 'a';
        $arr["1"] = 'b';
        $arr["01"] = 'c';
        $arr[true] = 'd';
        $arr[0.5] = 'e';
        $arr[false] = 'f';
        $arr[null] = 'g';

        // Which keys will have $arr
        $this->assertEquals([0, 1, "01", ""], array_keys($arr));

        // Which values will have $arr
        $this->assertEquals(['f', 'd', 'c', 'g'], array_values($arr));
    }

    /**
     * Uncomment assertions and Replace `?` in asserts with the correct value
     * @see https://www.php.net/manual/en/language.operators.array.php
     * @see https://www.php.net/manual/en/function.array-merge.php
     * @see https://www.php.net/manual/en/function.array-replace.php
     */
    public function testArraysOperations()
    {
        // Union
        $arr1 = ['a', 'b'];
        $arr2 = ['c', 'd', 'e', 'key' => 'value'];
        $this->assertEquals(['a', 'b', 'e', 'key' => 'value'], $arr1 + $arr2);
        
        // array_merge — Merge one or more arrays
        $arr1 = ['a', 'b', 'key1' => 'value1', 'key2' => 'value2'];
        $arr2 = [1, 'key1' => 'value3', 'key3' => 'value4'];
        $this->assertEquals(['a', 'b', 'key2' => 'value2', 1, 'key1' => 'value3', 'key3' => 'value4'], array_merge($arr1, $arr2));
        
        // array_replace — Replaces elements from passed arrays into the first array
        $arr1 = ['a', 'b', 'key1' => 'value1', 'key2' => 'value2'];
        $arr2 = [1, 'key1' => 'value3', 'key3' => 'value4'];
        $this->assertEquals([1, 'b', 'key1' => 'value3', 'key2' => 'value2', 'key3' => 'value4'], array_replace($arr1, $arr2));
    }
    
    /**
     * Uncomment assertions and Replace `?` in asserts with the correct value
     * @see https://www.php.net/manual/en/book.array.php
     */
    public function testArrayFunctions()
    {
        // list - Assign variables as if they were an array
        list(,, list($var)) = ['a', 'b', ['c', 'd']];
        $this->assertEquals('c', $var);

        // implode — Join array elements with a string
        $var = implode([1, 2, 3, 4]);
        $this->assertEquals('1234', $var);

        // sizeof — Alias of count
        // TODO to be implemented
        $this->assertEquals(4, sizeof([1, 2, 3, 4]));

        // unset — Unset a given variable
        $arr = [1, 2, 3, 4];
        unset($arr[0]);
        $this->assertEquals([1, 2, 3], array_keys($arr));

        // isset — Determine if a variable is declared and is different than NULL
        $arr = [1, 2, 'key' => 'value', null];
        $this->assertEquals(true, isset($arr[0]));
        $this->assertEquals(true, isset($arr['key']));
        $this->assertEquals(false, isset($arr[2]));

        // array_key_exists — Checks if the given key or index exists in the array
        $arr = [1, 2, 'key' => 'value', null];
        $this->assertEquals(true, array_key_exists(0, $arr));
        $this->assertEquals(true, array_key_exists('key', $arr));
        $this->assertEquals(true, array_key_exists(2, $arr));

        // in_array — Checks if a value exists in an array
        // TODO to be implemented
        $this->assertEquals(true, in_array(2, [1, 2, 3, 4]));

        // array_flip — Exchanges all keys with their associated values in an array
        // TODO to be implemented
        $this->assertEquals([1 => 0, 2 => 1, 3 => 2, 4 => 3], array_flip([1, 2, 3, 4]));

        // array_reverse — Return an array with elements in reverse order
        // TODO to be implemented
        $this->assertEquals([4, 3, 2, 1], array_reverse([1, 2, 3, 4]));

        // array_keys — Return all the keys or a subset of the keys of an array
        // TODO to be implemented
        $this->assertEquals(["one", "two", "three", "four"], array_keys(["one" => 1, "two" => 2, "three" => 3, "four" => 4]));

        // array_values — Return all the values of an array
        // TODO to be implemented
        $this->assertEquals([1, 2, 3, 4], array_values(["one" => 1, "two" => 2, "three" => 3, "four" => 4]));

        // array_filter — Filters elements of an array using a callback function
        $arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $this->assertEquals([1, 2 => 3, 4 => 5, 6 => 7, 8 => 9], array_filter($arr, function ($value) {
           return $value % 2 > 0;
        }));

        // array_map — Applies the callback to the elements of the given arrays
        $arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $this->assertEquals([2, 4, 6, 8, 10, 12, 14, 16, 18, 20], array_map(function ($value) {
           return $value * 2;
        }, $arr));

        // sort — Sort an array
        // TODO to be implemented
        $fruits = ["lemon", "orange", "banana", "apple"];
        sort($fruits);
        $this->assertEquals([0 => "apple", 1 => "banana", 2 => "lemon", 3 => "orange"], $fruits);

        // rsort — Sort an array in reverse order
        // TODO to be implemented
        $fruits = ["lemon", "orange", "banana", "apple"];
        rsort($fruits);
        $this->assertEquals([0 => "orange", 1 => "lemon", 2 => "banana", 3 => "apple"], $fruits);

        // ksort — Sort an array by key
        // TODO to be implemented
        $arr = ["w" => 1, "a" => 2, "t" => 3, "b" => 4];
        ksort($arr);
        $this->assertEquals(["a" => 2, "b" => 4, "t" => 3, "w" => 1], $arr);

        // usort — Sort an array by values using a user-defined comparison function
        // TODO to be implemented
        $arr = ["a" => 2, "b" => 4, "t" => 3, "w" => 1];
        function cmp($a, $b)
        {
            if ($a == $b) {
                return 0;
            }
            return ($a < $b) ? -1 : 1;
        }
        usort($arr, "cmp");
        $this->assertEquals([1, 2, 3, 4], $arr);

        // array_push — Push one or more elements onto the end of array
        // array_pop — Pop the element off the end of array
        // TODO to be implemented
        $arr = [1, 2, 3, 4];
        array_push($arr, 7);
        $this->assertEquals([1, 2, 3, 4, 7], $arr);
        array_pop($arr);
        $this->assertEquals([1, 2, 3, 4], $arr);


        // array_shift — Shift an element off the beginning of array
        // array_unshift — Prepend one or more elements to the beginning of an array
        // TODO to be implemented
        $arr = [1, 2, 3, 4];
        array_shift($arr);
        $this->assertEquals([2, 3, 4], $arr);
        array_unshift($arr, 7);
        $this->assertEquals([7, 2, 3, 4], $arr);

    }
}