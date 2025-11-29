<?php
// Bubble Sort Function
function bubbleSort($arr, $order) {
    $n = count($arr);
    $swapCount = 0;

    // Bubble Sort algorithm
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - 1 - $i; $j++) {
            // Compare based on user order choice
            if (($order == "asc" && $arr[$j] > $arr[$j + 1]) || ($order == "desc" && $arr[$j] < $arr[$j + 1])) {
                // Swap elements if condition is met
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
                $swapCount++;
            }
        }
    }

    return [$arr, $swapCount];
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the array and order from the form
    $numbers = explode(',', $_POST['numbers']);
    $order = $_POST['order'];

    // Convert the numbers to integers
    $numbers = array_map('intval', $numbers);

    // Display the original array
    echo "<div class='result-container'>";
    echo "<h3>Original Array: [" . implode(", ", $numbers) . "]</h3>";

    // Call bubbleSort function to sort the array
    list($sortedArray, $swapCount) = bubbleSort($numbers, $order);

    // Display the sorted array and number of swaps
    echo "<h3>Sorted (" . ucfirst($order) . "): [" . implode(", ", $sortedArray) . "]</h3>";
    echo "<h4>Total Swaps: <span class='swap-count'>$swapCount</span></h4>";
    echo "</div>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bubble Sort with PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            font-size: 16px;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .result-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .swap-count {
            color: #FF6347;
            font-weight: bold;
        }

        h3 {
            color: #333;
        }

        h4 {
            font-size: 18px;
            color: #555;
        }
    </style>
</head>
<body>
    <h1>PHP Bubble Sort with Swap Count</h1>

    <!-- HTML Form to accept array input and sorting order -->
    <form method="post">
        <label for="numbers">Enter numbers (comma separated):</label>
        <input type="text" id="numbers" name="numbers" placeholder="e.g. 9,2,7,4,3" required><br>

        <label for="order">Choose sort order:</label>
        <select name="order" id="order">
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
        </select><br>

        <input type="submit" value="Sort Array">
    </form>
</body>
</html>
