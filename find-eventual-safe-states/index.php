<?php
/*
Problems(EN):
There is a directed graph of n nodes with each node labeled from 0 to n - 1. The graph is represented by a 0-indexed 2D integer array graph where graph[i] is an integer array of nodes adjacent to node i, meaning there is an edge from node i to each node in graph[i].

A node is a terminal node if there are no outgoing edges. A node is a safe node if every possible path starting from that node leads to a terminal node (or another safe node).

Return an array containing all the safe nodes of the graph. The answer should be sorted in ascending order.

Permasalahan(ID):
Ada graf berarah dari n node dengan setiap node diberi label dari 0 hingga n - 1. Graf direpresentasikan oleh array integer 2D bernilai 0 yang diindekskan graph di mana graph[i] adalah array integer dari node yang berdekatan dengan node i, yang berarti ada tepi dari node i ke setiap node di graph[i].

Sebuah node adalah node terminal jika tidak ada tepi keluar. Sebuah node adalah node aman jika setiap
jalur yang mungkin dimulai dari node tersebut mengarah ke node terminal (atau node aman lainnya).

Kembalikan array yang berisi semua node aman dari graf. Jawaban harus diurutkan secara menaik.
 */

function eventualSafeNodes($graph)
{
    $n = count($graph);
    $outdegree = array_fill(0, $n, 0);
    $reverseGraph = array_fill(0, $n, []);
    $queue = [];
    $safeNodes = [];

    // Build the reverse graph and calculate outdegree
    for ($i = 0; $i < $n; $i++) {
        foreach ($graph[$i] as $node) {
            $reverseGraph[$node][] = $i;
        }
        $outdegree[$i] = count($graph[$i]);
        if ($outdegree[$i] == 0) {
            $queue[] = $i;
        }
    }

    // Process nodes with zero outdegree
    while (!empty($queue)) {
        $node = array_shift($queue);
        $safeNodes[] = $node;
        foreach ($reverseGraph[$node] as $prev) {
            $outdegree[$prev]--;
            if ($outdegree[$prev] == 0) {
                $queue[] = $prev;
            }
        }
    }

    sort($safeNodes);
    return $safeNodes;
}

// Test case
$graph = [[1, 2], [2, 3], [5], [0], [5], [], []];
print_r(eventualSafeNodes($graph)); // Output: [2,4,5,6]