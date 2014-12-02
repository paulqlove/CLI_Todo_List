<?php

// Create array to hold list of todo items
$items = array();


function listItems($list){
   $string = '';
   foreach ($list as $key => $item) {
       $key++;
      $string .= "[{$key}]{$item}" . PHP_EOL;
   }
    return $string;
}
function getInput($upper = false){
    $input = strtoupper(trim(fgets(STDIN)));

    if ($upper == true) {
       return $input;
    } else {
        return $input;
    }
}
//sort menu function
function sort_menu($inputSort, $items) {
    //switch
    switch($inputSort){
        case 'A':
            asort($items);
            break;
        case 'Z':
            arsort($items);
            break;
        case 'O':
            ksort($items);
            break;
        case 'R':
            krsort($items);
            break;
       
    }  return $items;
        

/*low to high items
    if ($inputSort == 'A') {
        asort($items);
    } elseif ($inputSort == 'Z') {
        arsort($items);
    } elseif ($inputSort == 'O'){
        ksort($items); 
    } elseif ($inputSort == 'R') {
        krsort($items);
    }//return reordered aray 
    return $items;*/
    

    }
    

do {
     // Echo the list produced by the function
     echo listItems($items);

     // Show the menu options
     echo '(N)ew item, (R)emove item, (Q)uit, (S)ort : ';

     // Get the input from user
     // Use trim() to remove whitespace and newlines
     $input = getInput(true);

     // Check for actionable input
     if ($input == 'N') {
         // Ask for entry
         echo 'Enter item: ';
         // Add entry to list array
         $items[] = getInput();
     } elseif ($input == 'R') {
         // Remove which item?
         echo 'Enter item number to remove: ';
         // Get array key
         $key = getInput();
         // Remove from array
         unset($items[$key]);
    //Sort menu is here
     } elseif ($input == 'S') {
        echo ' (A)-Z, (Z)-A, (O)rder entered, (R)everse order entered :';
         $inputSort = getInput(true);
         //redifine $items when calling for new func sort_menu
         $items = sort_menu($inputSort, $items);
         
     }
 // Exit when input is (Q)uit
 } while ($input != 'Q');

 // Say Goodbye!
 echo "Goodbye!\n";

 // Exit with 0 errors
 exit(0);

// The loop!
/*do {
    // Iterate through list items
    foreach ($items as $key => $item) {
        // Display each item and a newline
        $key++;
        echo "[{$key}] {$item}\n";
    }

    // Show the menu options
    echo '(N)ew item, (R)emove item, (Q)uit : ';

    // Get the input from user
    // Use trim() to remove whitespace and newlines
    $input = trim(fgets(STDIN));
    $lower = strtolower($input);
    // Check for actionable input
    if ($lower == 'n') {
        // Ask for entry
        echo 'Enter item: ';
        // Add entry to list array
        $items[] = trim(fgets(STDIN));
   
    } elseif ($lower == 'r') {

        // Remove which item?
        echo 'Enter item number to remove: ';
        // Get array key
        $key = trim(fgets(STDIN));
        // Remove from array
        $key--;
        unset($items[$key]);
        //Reindex numerical array
        $items = array_values($items);
    } 
	// Exit when input is (Q)uit
	} while ($lower != 'q');

		// Say Goodbye!
		echo "Goodbye!\n";

		// Exit with 0 errors
		exit(0);*/


listItems($input);
getInput($input);


