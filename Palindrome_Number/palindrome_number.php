<?php
/*
    NOTE:
    - Palindrome number adalah bilangan yang jika dibalik akan tetap sama.
 */

//  Jawabannya
function is_palindrome($x)
{
    $x = (string)$x; // mengubah angka menjadi string
    $len = strlen($x); // menghitung panjang string

    // melakukan perulangan untuk mengecek apakah angka tersebut palindrome atau tidak
    // [1,2,2,1], Panjang array 4
    // [0,1,2,3]
    for ($i = 0; $i < $len; $i++) {
        if ($x[$i] != $x[$len - $i - 1]) {
            return false;
        }
    }

    return true;
}


// Test case
echo is_palindrome(121) ? "true" : "false"; // true
echo "\n";
echo is_palindrome(122) ? "true" : "false"; // true
