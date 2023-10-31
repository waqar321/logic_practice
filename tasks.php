<?php 


class Calculator
{
    public function Find_Duplicate_Values_and_print_their_quantity()
    {
        // Q1- Find Duplicate Values and print their quantity.
        //==========================================================

            $mixNumbers = [1, 2, 3, 3, 2, 5, 4, 1, 3, 6, 7, 9, 8, 7, 6, 5, 8, 0, 6, 5, 4];
            $found_items = [];
            $found_count = 0;

            foreach($mixNumbers as $Number)
            {
                if(isset($found_items[$Number]))
                {
                    $found_items[$Number]++;
                }
                else
                {
                    $found_items[$Number] = 1;
                }
            }
            
            foreach($found_items as $Number => $quantity )
            {
                if($quantity != 1)
                {
                    echo "$Number is $quantity times<br>";
            }
        } 
    }
    public function Positive_Negative_Zeros_Ratios($arr = []) 
    {
        // Q2- find positive, negative and zero’s ratio,

            //step1 = find length of arr 
            //step2 = find count of all positive value 
            //step3 = find count of all negative value 
            //step4 = find count of all zero value
            //step5 = find ratio (positive count/length)
            //step6 = find ratio (negative count/length)
            //step7 = find ratio (zero count/length)
    
    
            $length  = count($arr);
            $positive_count = 0;
            $negative_count = 0;
            $zero_count = 0;
    
            foreach($arr as $value)
            {
                if($value>0)
                {
                    $positive_count++;
                }
                else if($value<0)
                {
                    $negative_count++;            
                }
                else
                {
                    $zero_count++;
                }
            }
    
            $Positive_ratio = $positive_count/$length;
            $negative_ratio = $negative_count/$length;
            $zero_ratio = $zero_count/$length;
            
            // on xamp --------------------
            echo number_format($Positive_ratio,6)."<br>";
            echo number_format($negative_ratio,6)."<br>";
            echo number_format($zero_ratio,6)."<br>";

            // on hackerrank --------------------
            // print_r(number_format($Positive_ratio, 6)); 
            // print_r("\n");
            // print_r(number_format($negative_ratio,6));
            // print_r("\n");
            // print_r(number_format($zero_ratio, 6));
    }
    public function Min_Max_values($arr = []) 
    {
        // Q3- Given five positive integers, find the minimum and maximum values that can be calculated 
        // by summing exactly four of the five integers.
        // example: 
                    // array = 1,2,3,4,5,
                    // 2 + 3 + 4 + 5 = 14  maximum
                    // 1 + 3 + 4 + 5 = 13 
                    // 1 + 2 + 4 + 5 = 12 
                    // 1 + 2 + 3 + 5 = 11 
                    // 1 + 2 + 3 + 4 = 10 // minimum 
        
        // step1= get the length of the array 
        // step2= run loop through the length and nest length loop in each iteration
        // step3= on each iteration of parent loop, sum all of the elements of nestloop except the value that is of parent loop. 
        // step4= now sort the sums and print 0 and last index

        $sums = [];

        foreach($arr as $Parent_key => $value) 
        {
            $sum = 0;

            foreach($arr as $Child_key => $Nestvalue)
            {
                if($Parent_key != $Child_key)
                {
                    $sum += $Nestvalue;
                }
            }
            $sums[] = $sum;
        }
     
        sort($sums);
        $count_sorted_sum = count($sums);
        echo $sums[0].' '.$sums[$count_sorted_sum-1];
    }   
    public function TimeConversion($time_format)
    {
        // 12 vs 24 

        // 10:00:00PM    output:  22:00:00 
        // 11:59:00PM    output:  23:59:00         
        // 12:00:00AM    output:  00:00:00  pass
        // 12:59:00AM    output:  00:59:00  pass 
        // 01:00:00AM    output:  01:00:00   pass
        //    .....................
        // 11:00:00AM    output:  11:00:00   pass
        // 11:59:00AM    output:  11:59:00   pass
        
        // 12:00:00PM    output:  12:00:00 
        // 01:00:00PM    output:  13:00:00 
            //    .....................
        // 09:00:00PM    output:  21:00:00 


   
        
        if(str_contains($time_format, 'AM'))
        {
            $firstTwoChars = substr($time_format, 0, 2);
        
            if($firstTwoChars != '12')
            {
                $TimeFormat24 = str_replace('AM', '', $time_format);
            }
            else
            {
                $TimeFormat24 = str_replace(['AM', '12'], ['', '00'], $time_format);
            }
        }
        else
        {
            $firstTwoChars = substr($time_format, 0, 2);

            if($firstTwoChars == '12')
            {
                $TimeFormat24 = str_replace('PM', '', $time_format);
            }
            else
            {
                $Add12Hours = $firstTwoChars + 12;                 
                $TimeFormat24 = str_replace(['PM', $firstTwoChars], ['', $Add12Hours], $time_format);
            }
        }
        
        echo $TimeFormat24;
    }
    public function BreakingRecords($records = []) 
    {

        // echo 'Game'.' | '. 'Score'.' | '. 'Minimum'.' | '. 'Maximum'.' | '.'Min'.' | '. 'Max'."<br>";   

        $output = [];        
        $max = 0;
        $min = 0;
        $most = 0;
        $least = 0;
        $record = [];

        foreach($records as $key => $score)
        {        
            if(empty($record))
            {
                $minimum_score = $score;
                $maximum_score = $score;
            }
            else
            {      
                if($score > max($record))  //(24>24) 12, 24, 10, 24   
                {     
                    $most++;
                    $max=1;
                    $maximum_score = $score;        
                }
                elseif($score < min($record))  // (24<10) 12, 24, 10, 24
                {
                    $least++;
                    $min=1;
                    $minimum_score = $score;
                }   
            }

            $record[] = $score;
            
            // $line = str_pad($key, 9, ".").' | '. str_pad($score, 7, ".").' | '. str_pad($minimum_score, 14, ".").' | '. str_pad($maximum_score, 14, ".").' | '.str_pad($min, 8, ".").' | '. str_pad($max, 8, ".");
            // $line = $key.''.$score.''.$minimum_score.''.$maximum_score.''.$min.''.$max;
            // $output[] = $line;

        } 

        $output[] = $most;
        $output[] = $least;
        return $output;  // the output will be by, echo implode(" ", $result);   implode array ko string bana ke show karta or explode string ko array bana deta.

        // $result = $calculator->breakingRecords($arr = [3, 4, 21, 36, 10, 28, 35, 5, 24, 42]); //3 4 21 36 10 28 35 5 24 42
        // $result = $calculator->breakingRecords($arr = [10, 5, 20, 20, 4, 5, 2, 25, 1]); //10 5 20 20 4 5 2 25 1
        // echo implode(" ", $result);

    }
    public function CamelCase()
    {
            // $inputs[0] = "S;M;plasticCup()";   //S;V;iPad
            // $inputs[1] = "C;V;mobile phone";   //S;V;iPad
            // $inputs[2] = "C;C;coffee machine";   //S;V;iPad
            // $inputs[3] = "S;C;LargeSoftwareBook()";   //S;V;iPad
            // $inputs[4] = "C;M;white sheet of paper";   //S;V;iPad
            // $inputs[5] = "S;V;pictureFrame";   //S;V;iPad
            
            
            // $inputs[0] = "S;V;iPad";   //S;V;iPad
            // $inputs[1] = "C;M;mouse pad";   //S;V;iPad
            // $inputs[2] = "C;C;code swarm";   //S;V;iPad
            // $inputs[3] = "S;C;OrangeHighlighter";   //S;V;iPad
            
            $inputs[0] = "C;V;can of coke";   //canOfCoke
            $inputs[1] = "S;M;sweatTea()";   //sweat tea
            $inputs[3] = "S;V;epsonPrinter";   //santaClaus()
            $inputs[4] = "C;M;santa claus";   //santaClaus()
            $inputs[5] = "C;C;mirror";   //santaClaus()

            foreach($inputs as $index => $input)
            {
                $parts = explode(';', $input);
                
                // if (count($parts) < 3) {
                //     continue; // Skip incomplete lines
                // }

                $SplitOrCombine = trim($parts[0]);
                $ClassMethodOrVariable = trim($parts[1]);
                $String = trim($parts[2]);
                
                // echo $String."<br>"; 

                if($SplitOrCombine === 'S')   //if split
                {
                    $words = preg_split('/(?=[A-Z])/', $String, 5, PREG_SPLIT_NO_EMPTY);
                    // Modify the regex to split before uppercase letters and spaces
                    // $words = preg_split('/(?=[A-Z\s])/', $String, -1, PREG_SPLIT_NO_EMPTY);

                    foreach ($words as $key => $word)
                    {
                        if ($key === array_key_last($words)) 
                        {
                            $array = str_split($word);
                            $length = count($array);
                            echo $array[$length-2] == '(' && $array[$length-1] == ')' ? strtolower(trim($word, '()')) : strtolower($word).' ';
                        }
                        else
                        {
                            echo strtolower($word).' ';     
                        }
                    }
                    echo "<br>";
                    // echo "\n"; // Use \n for line break

                    // ======================== preg_split ===============================

                        // $camelCaseString = "largeSoftwareBookSellingKarachi";
                        // $words = preg_split('/(?=[A-Z])/', $camelCaseString, -1, PREG_SPLIT_NO_EMPTY);
                        // foreach ($words as $word) {
                                // echo $word . ' ';                             // for PREG_SPLIT_NO_EMPTY
                                // echo $word[0] ."Found at ".$word[1].'<br>';  // for PREG_SPLIT_OFFSET_CAPTURE
                        // }

                        // preg_split(
                        //     string $pattern, // The pattern to search for, as a string.
                        //     string $subject, // The input string.
                        //     int $limit = -1, // kitne tk kam karen, means 4 likhunga to 4th Capital letter wala string tk split karega just
                        //     int $flags = 0   //  PREG_SPLIT_NO_EMPTY  = Empty strings will be removed from the returned array.
                                                //  PREG_SPLIT_DELIM_CAPTURE 
                                                //  PREG_SPLIT_OFFSET_CAPTURE // jis index pe RE match hogi uska index bhi return karega, at first iteration  echo $word[0] ."Found at ".$word[1].'<br>';
                        // ): array|false        // if RE matches, it return an array otherwise it returns false

                    //======================================================================
                    //===========================big working code ====================================

                        // echo $characters[$i+1]; die();
                        // echo implode($FirstWord); die();
                        // echo "<pre>";
                        // print_r($FirstWord);
                        // echo "</pre>";
                        // die();

                        // $Name1 = 'LargeSoftwareBookSellingKarachi'; //'largeSoftwareBook'; //'pictureFrame'; //'plasticCup';
                        // $characters = str_split($Name1);   // Splits into an array of characters//rs//
                        // $FirstWord = [];
                        // $SecondWord = [];
                        // $ThirdWord = [];
                        // $ForthWord = [];
                        // $FifthWord = [];
                        // $SixthWord = [];

                    // foreach($characters as $key => $character)    //largeSoftwareBookSellingKarachi
                        // {
                        //     if(ctype_upper($characters[$key+1]))  //S
                        //     {
                        //         $FirstWord[] = $characters[$key]; //large
                        //         $SecondWord[] = $characters[$key+1]; //S
                            
                        //         for ($i = $key+2; $i < count($characters); $i++)  //SoftwareBookSellingKarachi
                        //         {
                        //             if(isset($characters[$i+1]))  //B
                        //             {          
                        //                 if(ctype_upper($characters[$i+1]))       //B
                        //                 {
                        //                     $SecondWord[] = $characters[$i];   // Software
                        //                     $ThirdWord[] = $characters[$i+1];  // B
                                        
                        //                     for ($j = $i+2; $j < count($characters); $j++) // BookSellingKarachi
                        //                     {
                        //                         if(isset($characters[$j+1]))     // S
                        //                         {
                        //                             if(ctype_upper($characters[$j+1])) //M 
                        //                             {
                        //                                 $ThirdWord[] = $characters[$j]; // Book
                        //                                 $ForthWord[] = $characters[$j+1];  // S
                                                    
                        //                                 for ($k = $j+2; $k < count($characters); $k++) // SellingKarachi
                        //                                 {
                        //                                     if(isset($characters[$k+1]))
                        //                                     {
                        //                                         if(ctype_upper($characters[$k+1])) 
                        //                                         {
                        //                                             $ForthWord[] = $characters[$k]; //Selling     
                        //                                             $FifthWord[] = $characters[$k+1];   // K                      

                        //                                             for ($l = $k+2; $l < count($characters); $l++) // Karachi
                        //                                             {
                        //                                                 if(isset($characters[$l+1]))
                        //                                                 {
                        //                                                     if(ctype_upper($characters[$l+1])) 
                        //                                                     {
                        //                                                         $FifthWord[] = $characters[$l]; 
                        //                                                         $SixthWord[] = $characters[$l+1];   
                        //                                                     }
                        //                                                     else
                        //                                                     {
                        //                                                         $FifthWord[] = $characters[$l]; 
                        //                                                     }
                        //                                                 }
                        //                                                 else
                        //                                                 {
                        //                                                     $FifthWord[] = $characters[$l]; 
                        //                                                 }
                        //                                             }
                        //                                             break;         
                        //                                         }
                        //                                         else
                        //                                         {
                        //                                             $ForthWord[] = $characters[$k]; 
                        //                                         }
                        //                                     }
                        //                                     else
                        //                                     {
                        //                                         $ForthWord[] = $characters[$k];                
                        //                                     }            
                        //                                 }
                        //                                 break;
                        //                             }
                        //                             else
                        //                             {
                        //                                 $ThirdWord[] = $characters[$j]; 
                        //                             }
                        //                         }
                        //                         else
                        //                         {
                        //                             $ThirdWord[] = $characters[$j]; 
                        //                         }
                        //                     }
                        //                     break;
                        //                 }
                        //                 else
                        //                 {
                        //                     $SecondWord[] = $characters[$i];   
                        //                 }
                        //             }
                        //             else
                        //             {
                        //                 $SecondWord[] = $characters[$i];    
                        //             }
                        //         }
                        //         break;                                
                        //     }
                        //     else
                        //     {
                        //         $FirstWord[] = $characters[$key]; 
                        //     }
                        // }                 
        
                    // $First = implode('', $FirstWord);
                    // $First[0]= strtolower($First[0]);
            
                        // if(!empty($FifthWord))
                        // {        
                            
                        //     $Second = implode('', $SecondWord);
                        //     $third = implode('', $ThirdWord);
                        //     $forth = implode('', $ForthWord);
                        //     $fifth = implode('', $FifthWord);
                        //     $Second[0]= strtolower($Second[0]);
                        //     $third[0]= strtolower($third[0]);
                        //     $forth[0]= strtolower($forth[0]);
                        //     $fifth[0]= strtolower($fifth[0]);
                        //     // echo $fifth; die();

                        //     echo $First.' '.$Second.' '.$third.' '.$forth. ' '.$fifth;    
                        //     break;
                        // }
                        // else if(!empty($ForthWord))
                        // {
                        //     $Second = implode('', $SecondWord);
                        //     $third = implode('', $ThirdWord);
                        //     $forth = implode('', $ForthWord);
                        //     $Second[0]= strtolower($Second[0]);
                        //     $third[0]= strtolower($third[0]);
                        //     $forth[0]= strtolower($forth[0]);
                        //     echo $First.' '.$Second.' '.$third.' '.$forth;    
                        //     break;
                        // }
                        // if(!empty($ThirdWord))
                        // {
                        //     $Second = implode('', $SecondWord);
                        //     $third = implode('', $ThirdWord);
                        //     $Second[0]= strtolower($Second[0]);
                        //     $third[0]= strtolower($third[0]);
                        //     echo $First.' '.$Second.' '.$third;    
                        //     break;
                        // }
                        // else if(!empty($SecondWord))
                        // {
                        //     $Second = implode('', $SecondWord);
                        //     $Second[0]= strtolower($Second[0]);
                        //     echo $First.' '.$Second;    
                        //     break;
                        // }
                        // else
                        // {
                        //     echo $First;    
                        // }                        
                                  
                }
                else  //if combine
                {
                    if (strpos($String, ' ') !== false) 
                    {
                        $words = explode(' ', $String);
     
                        // echo "<pre>";
                        // print_r($words); die();
                        // echo "</pre>";

                        foreach ($words as $key => $word)
                        {   
                            if($ClassMethodOrVariable !== 'C')
                            {
                                if($key === 0)
                                {
                                    echo strtolower($word);
                                }
                                else
                                {
                                    if($ClassMethodOrVariable === 'M')
                                    {
                                        if($key === array_key_last($words))
                                        {
                                            echo ucfirst($word).'()';
                                        }
                                        else
                                        {
                                            echo ucfirst($word);
                                        }
                                    }
                                    else
                                    {
                                        echo ucfirst($word);
                                    }
                                }
                                // echo ($key === 0 ? strtolower($word) : ($key === array_key_last($words) ? ucfirst($word).'()' : ucfirst($word)));
                            }
                            else 
                            {
                                echo ucfirst($word);
                            }
                        }
                        echo "<br>";   // for localhsot xamp 
                        // echo "\n"; // Use \n for line break // for online
                    }
                    else
                    {
                        echo ucfirst($String)."<br>";
                        // echo $String."does not contain spaces."."<br>";
                        // echo $String."does not contain spaces."."<br>";
                    }
                }
            }
    }
    public function divisibleSumPairs()
    {
        $ar = [1, 3, 2, 6, 1, 2];
        $n  = count($ar);   // 2 barha hoga or 100 se kam
        $k = 3;             // 2 barha hoga or 100 se kam
        $count=0;

        for($i=0; $i<$n; $i++)
        {
            for($j=$i+1; $j<$n; $j++)
            {  
                if (($ar[$i] + $ar[$j]) % $k == 0)
                {
                    $count++;
                }       
            }
        }

        echo $count;

    }
    public function matchingStrings()
    {        

        // $string_array = explode(', ', $strings);
        // $stringLength = array_shift($string_array); 
        
        // $query_array = explode(', ', $queries);
        // $queryStringLength = array_shift($query_array); 
    
        // $strings = "4, aba, baba, aba, xzxb"; 
        // $strings = "3, def, de, fgh"; 
        $strings = "13, abcde, sdaklfj, asdjf, na, basdn, sdaklfj, asdjf, na, asdjf, na, basdn, sdaklfj, asdjf";
        $string_array = explode(', ', $strings);
        $stringLength = array_shift($string_array); 
  

        // $query = "3, aba, xzxb, ab"; 
        // $query = "3, de, lmn, fgh"; 
        $query = "3, abcde, sdaklfj, asdjf, na, basdn";
        $query_array = explode(', ', $query);
        $queryStringLength = array_shift($query_array); 

        $foundQuantity = [];

        foreach($query_array as $query_key => $query)  //"aba, xzxb, ab"; 
        {
            foreach($string_array as $string_key => $string)  //aba, baba, aba, xzxb"; 
            {
                if($query == $string)  // xzxb == aba
                {
                    if(array_key_exists($query, $foundQuantity))  //aba
                    {
                        $foundQuantity[$query] = $foundQuantity[$query] + 1;  //
                    }
                    else
                    {
                        $foundQuantity[$query] = 1;   
                    }
                }
            }
            
            if(!array_key_exists($query, $foundQuantity)) 
            {
                $foundQuantity[$query] = 0;
            }
        }

        foreach ($query_array as $query) {
            echo $foundQuantity[$query] . "<br>";
        }

        // ===================== FOR LIVE ==================



        
            function matchingStrings($strings, $queries) {
          
            // array_shift($strings); 
            // array_shift($queries); 
            $foundQuantity = [];
        
            foreach($queries as $query_key => $query)  
            {
                if(!array_key_exists($query, $foundQuantity))  
                {     
                    foreach($strings as $string_key => $string) 
                    {
                        if($query == $string) 
                        {
                            if(array_key_exists($query, $foundQuantity))  
                            {
                                $foundQuantity[$query] = $foundQuantity[$query] + 1; 
                            }
                            else
                            {
                                $foundQuantity[$query] = 1;   
                            }
                        }
                    }
                }
                else
                {
                   $foundQuantity[$query] = $foundQuantity[$query];    
                }
                // if(!array_key_exists($query, $foundQuantity)) 
                // {
                //     $foundQuantity[$query] = 0;
                // }
            }  
            return $foundQuantity;     
        }
        
        // -----------------------------------------------------------------
            $strings = array();
            $queries = array();
                
                $fptr = fopen(getenv("OUTPUT_PATH"), "w");
                $strings_count = intval(trim(fgets(STDIN)));



                for ($i = 0; $i < $strings_count; $i++) {
                    $strings_item = rtrim(fgets(STDIN), "\r\n");
                    $strings[] = $strings_item;
                }

                $queries_count = intval(trim(fgets(STDIN)));



                for ($i = 0; $i < $queries_count; $i++) {
                    $queries_item = rtrim(fgets(STDIN), "\r\n");
                    $queries[] = $queries_item;
                }
            

            $res = matchingStrings($strings, $queries);
        // -----------------------------------------------------------------
        fwrite($fptr, implode("\n", $res) . "\n");

        fclose($fptr);
            

    }
}


$calculator = new Calculator();
// $calculator->Find_Duplicate_Values_and_print_their_quantity();
// $calculator->Positive_Negative_Zeros_Ratios($arr = [1, 1, 0, -1, -1]);
// $calculator->Min_Max_values($arr = [5, 5, 5, 5, 5]);
// $calculator->TimeConversion('12:00:00AM');
// $result = $calculator->breakingRecords($arr = [3, 4, 21, 36, 10, 28, 35, 5, 24, 42]); //3 4 21 36 10 28 35 5 24 42
// $calculator->CamelCase();
// $calculator->divisibleSumPairs();
$calculator->matchingStrings();

echo "<br> ============================ task run ========================= ";

// $res = matchingStrings($strings, $queries);

// fwrite($fptr, implode("\n", $res) . "\n");   // jo output ap dena chahte hen wo isme add karte

// fclose($fptr);



?>

