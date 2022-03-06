<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
	// define array
	$a = array(1, 5, 2, 5, 1, 3, 2, 4, 5);
	
	// print original array
	echo "Original Array : \n";
	print_r($a);
	
	// remove duplicate values by using
	// flipping keys and values
	$a = array_flip($a);

	// restore the array elements by again
	// flipping keys and values.
	$a = array_flip($a);

	// re-order the array keys
	$a= array_values($a);

	// print updated array
	echo "\nUpdated Array : \n ";
	print_r($a);
?>

</body>
</html>
