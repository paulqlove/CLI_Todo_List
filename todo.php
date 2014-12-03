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
}

//function to modify the list after inputs 
function itemPlacement($placeInput, $array){
   echo 'Enter Item' . PHP_EOL;
   $string = getInput();
    switch ($placeInput) {
        case 'B':
           array_unshift($array, $string);
            break;
        default:
            array_push($array, $string);
            break;
    } 
    return $array;
}      
//function to open a file 
function readList($fileOpen){
    $items = array();


   
    if (filesize($fileOpen) > 0) {
        //open a file 
        $open = fopen($fileOpen, 'r');
        //take user input and get filesize 
        $contents = trim(fread($open, filesize($fileOpen)));
        //run a message if file is empty
        //make contents equal to items

        $items = $contents;

        //turn string into array
        $items = explode("\n", $items);

        // foreach on $items trim()
        foreach ($items as $key => $item) {
           //trims each key

            $items[$key] = trim($item);
        }

        //close the file
        fclose($open);
        //return the file
    } else {
        echo "This file is empty" . PHP_EOL;
    }
   
    return $items;
}
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
    
    

do {
     // Echo the list produced by the function
     echo listItems($items);

     // Show the menu options
     echo '(N)ew item, (R)emove item, (Q)uit, (S)ort, (O)pen file : ';

     // Get the input from user
     // Use trim() to remove whitespace and newlines
        $input = getInput(true);

     // Check for actionable input
    if ($input == 'N') {
         // Ask for entry
         
         //ask user if they would like to add to beginning or end of list
         echo "Would you like to add this item to:" . PHP_EOL .  "(B)eginning of list ";
         //get input after prompt
         $placeInput = getInput(true);

         $items = itemPlacement($placeInput, $items);

    }elseif($input == 'R') {
         // Remove which item?
         echo 'Enter item number to remove: ';
         // Get array key
         $key = getInput();
         // Remove from array
         unset($items[$key]);
    //Sort menu is here
    }elseif ($input == 'S') {
        echo ' (A)-Z, (Z)-A, (O)rder entered, (R)everse order entered :';
         $inputSort = getInput(true);
         //redifine $items when calling for new func sort_menu
         $items = sort_menu($inputSort, $items);
         
    }elseif($input == 'F') {

        array_shift($items);

    }elseif ($input == 'L') {
        array_pop($items);
    }elseif($input == 'O'){
        //ask user to enter in file they want to enter
        echo 'What file would you like to add' . PHP_EOL;
        $fileOpen = getInput();
        //call function that opens file here
        $items = readList($fileOpen);
        
        
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

// listItems($input);
// getInput($input);



