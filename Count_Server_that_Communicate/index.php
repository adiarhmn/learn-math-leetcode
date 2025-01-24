<?php
/*
Problems(EN):
You are given a map of a server center, represented as a m * n integer matrix grid, where 1 means that on that cell there is a server and 0 means that it is no server. Two servers are said to communicate if they are on the same row or on the same column.
Return the number of servers that communicate with any other server.

Return the number of servers that communicate with any other server.

Permasalahan(ID):
Anda diberikan peta pusat server, yang direpresentasikan sebagai matriks bilangan bulat grid m * n, di mana 1 berarti bahwa pada sel tersebut ada server dan 0 berarti bahwa tidak ada server. Dua server dikatakan berkomunikasi jika mereka berada di baris yang sama atau di kolom yang sama.

Kembalikan jumlah server yang berkomunikasi dengan server lain.


=================================================================================================
[ID] Hasil yang diharapkan:
[EN] Expected result:

Example 1:
Input: grid = [[1,0],[0,1]]
Output: 0
Explanation: No servers can communicate with others.

Example 2:
Input: grid = [[1,0],[1,1]]
Output: 3

Example 3:
Input: grid = [[1,1,0,0],[0,0,1,0],[0,0,1,0],[0,0,0,1]]
Output: 4

=================================================================================================
[ID] Petunjuk:
[EN] Constraints:

m == grid.length
n == grid[i].length
1 <= m <= 250
1 <= n <= 250
grid[i][j] == 0 or 1


// Langkah: 
[
    [1,1,0,0],
    [0,0,1,0],
    [0,0,1,0],
    [0,0,0,1]
]
*/

function stepCountServers($grid)
{
    $m = count($grid); // menghitung jumlah baris
    $n = count($grid[0]); // menghitung jumlah kolom

    // membuat array dengan panjang $m dan diisi dengan 0 array_fill(0, 3, 0) => [0,0,0]
    // array_fill(start_index, num, value)
    $rowCountServer = array_fill(0, $m, 0); // contoh: [0,0,0]
    $colCountServer = array_fill(0, $n, 0); // contoh: [0,0,0]


    $totalServer = 0; // inisialisasi total dengan 0

    // melakukan perulangan untuk menghitung jumlah server pada baris dan kolom
    for ($i = 0; $i < $m; $i++) {
        for ($j = 0; $j < $n; $j++) {
            echo $grid[$i][$j] . " ";
            if ($grid[$i][$j] == 1) {
                $rowCountServer[$i]++; // menambahkan jumlah server pada baris
                $colCountServer[$j]++; // menambahkan jumlah server pada kolom
                $totalServer++;
            }
        }
        echo " | ".$rowCountServer[$i] . "\n";
    }

    echo "------------\n";
    for ($i = 0; $i < $n; $i++) {
        echo $colCountServer[$i] . " ";
    }
    echo "\n------------\n";
    echo "Total: $totalServer\n";


    // melakukan perulangan untuk menghitung jumlah server yang berkomunikasi
    for ($i = 0; $i < $m; $i++) {
        for ($j = 0; $j < $n; $j++) {
            //  Jika server ada (1)  && Jika Jumlah Horizonal = 1 && Jumlah Vertikal = 1
            if ($grid[$i][$j] == 1 && ($rowCountServer[$i] == 1 && $colCountServer[$j] == 1)) {
                $totalServer--;
                echo "Total Server: $totalServer\n";
            }
        }
    }

    // Mengembalikan sisa server yang berkomunikasi
    return $totalServer;
}


// Real Function
function countServers($grid) {
    $rows = count($grid);
    $cols = count($grid[0]);
    $rowCount = array_fill(0, $rows, 0);
    $colCount = array_fill(0, $cols, 0);

    // Count the number of servers in each row and column
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            if ($grid[$i][$j] == 1) {
                $rowCount[$i]++;
                $colCount[$j]++;
            }
        }
    }

    $count = 0;
    // Count the number of servers that can communicate
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            if ($grid[$i][$j] == 1 && ($rowCount[$i] > 1 || $colCount[$j] > 1)) {
                $count++;
            }
        }
    }

    return $count;
}

// Test cases
// echo countServers([[1,0],[0,1]]); // Output: 0
// echo countServers([[1,0],[1,1]]); // Output: 3
// echo countServers([[1,1,0,0],[0,0,1,0],[0,0,1,0],[0,0,0,1]]); // Output: 4

// Gambaran dari grid
echo stepCountServers([[1,1,0,0],[0,1,1,0],[0,0,0,1],[0,0,0,1]]); // 0
