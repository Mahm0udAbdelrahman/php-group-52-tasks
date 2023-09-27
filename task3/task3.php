<?php

$countryList = [
    'CA'        => 'Canada',
    'US'        => 'United States'];

    $stateList['CA'] = [
        'AB'        => 'Alberta',
        'BC'        => 'British Columbia',
        'AB'        => 'Alberta',
        'BC'        => 'British Columbia',
        'MB'        => 'Manitoba',
        'NB'        => 'New Brunswick',
        'NL'        => 'Newfoundland/Labrador',
        'NS'        => 'Nova Scotia',
        'NT'        => 'Northwest Territories',
        'NU'        => 'Nunavut',
        'ON'        => 'Ontario',
        'PE'        => 'Prince Edward Island',
        'QC'        => 'Quebec',
        'SK'        => 'Saskatchewan',
        'YT'        => 'Yukon'];

        $stateList['US'] = [
            'AL'        => 'Alabama',
            'AK'        => 'Alaska',
            'AZ'        => 'Arizona',
            'AR'        => 'Arkansas',
            'CA'        => 'California',
            'CO'        => 'Colorado',
            'CT'        => 'Connecticut',
            'DE'        => 'Delaware',
            'DC'        => 'District of Columbia',
            'FL'        => 'Florida',
            'GA'        => 'Georgia',
            'HI'        => 'Hawaii',
            'ID'        => 'Idaho',
            'IL'        => 'Illinois',
            'IN'        => 'Indiana',
            'IA'        => 'Iowa',
            'KS'        => 'Kansas',
            'KY'        => 'Kentucky',
            'LA'        => 'Louisiana',
            'ME'        => 'Maine',
            'MD'        => 'Maryland',
            'MA'        => 'Massachusetts',
            'MI'        => 'Michigan',
            'MN'        => 'Minnesota',
            'MS'        => 'Mississippi',
            'MO'        => 'Missouri',
            'MT'        => 'Montana',
            'NE'        => 'Nebraska',
            'NV'        => 'Nevada',
            'NH'        => 'New Hampshire',
            'NJ'        => 'New Jersey',
            'NM'        => 'New Mexico',
            'NY'        => 'New York',
            'NC'        => 'North Carolina',
            'ND'        => 'North Dakota',
            'OH'        => 'Ohio',
            'OK'        => 'Oklahoma',
            'OR'        => 'Oregon',
            'PA'        => 'Pennsylvania',
            'RI'        => 'Rhode Island',
            'SC'        => 'South Carolina',
            'SD'        => 'South Dakota',
            'TN'        => 'Tennessee',
            'TX'        => 'Texas',
            'UT'        => 'Utah',
            'VT'        => 'Vermont',
            'VA'        => 'Virginia',
            'WA'        => 'Washington',
            'WV'        => 'West Virginia',
            'WI'        => 'Wisconsin',
            'WY'        => 'Wyoming'
            ];
        

     echo "<pre>";
     var_dump($countryList['CA']);
       $countryList['CA'] = ['Egypt' , 'GIZA' , 'cairo'];
     var_dump($countryList['CA']);
     var_dump($countryList['US']);
     var_dump($countryList['CA'][0]);
     $countryList['SA'] = 'Saudi';
     print_r($countryList);
     var_dump(count($countryList));

            echo"<br>";


     print_r($stateList['CA']['BC']);
     $stateList['CA']['BC']='Iraq';
     echo"<br>";
     print_r($stateList['CA']['BC']);
     $r = array_shift($stateList['CA']);
     $E = array_pop($stateList['CA']);
            echo $r;
            echo $E;
             var_dump($stateList['CA']);

            echo"<br>";

            $stateList['US']['AK']=['Mohamed','Ahmed','Ali'];
            print_r($stateList['US']);
            var_dump($stateList['US']['AZ']);
    echo "</pre>";

    echo"<br>";
    echo"<br>";
     echo"<br>";
     //---------------------------------EX2----------------------------------------
     
     /**Array
     (
         [1] => //last name
         [9223372036854775807] => //this is max of array
         [0] => //first name
         [2] => //this may be at the last of array;
     )*/
          //---------------------------------EX3----------------------------------------

     $names = [ 'name1'=>'Mahmoud','name2'=>'Ali','name3'=>'Amr' , 'name4'=>'youssef' , 'name5'=>'Mohamed' , 'name6'=>'omar' , 'name7'=>'Hamada' , 'name8'=>'Abdallah' ,'name9'=>'Abdo' ,'name10'=>'seif' , 'num1'=> 10 ,'num2'=> 8];
     //count      
     var_dump(count($names));
     echo"<br>";
            //in_array
            if(in_array('Mahmoud',$names))
            {
                echo"yes";
            }
            else
            {
                echo"No";
            }

     echo"<br>";

     //array_key_exists
     echo array_key_exists(
        'name2',$names
     );


     echo"<br>";

     //array_keys
         echo "<pre>";
            print_r(array_keys($names));
          echo "</pre>";

          echo"<br>";  
     //array_values
          echo "<pre>";
          print_r(array_values($names));
        echo "</pre>";

        echo"<br>";
     //array_sum
        echo array_sum($names);

//end

        echo "<pre>";
            print_r(end($names));
          echo "</pre>";

          echo"<br>";
     //array_rand
          echo "<pre>";
            print_r(array_rand($names,2));
          echo "</pre>";
//array_merge
        $nums=[1,2,3];
        echo "<pre>";
        print_r(array_merge($names,$nums));
        echo "</pre>";

        //array_replace
        $replace=['php','mysql','laravel'];
        echo "<pre>";
        print_r(array_replace($names,$replace));
        echo "</pre>";


        echo"<br>";

        //array_shift
        echo array_shift($names);

        echo"<br>";
        
        //array_shift
        echo array_unshift($names);
        
        echo"<br>";
        //array_pop
        echo array_pop($names);

        echo"<br>";
        //array_push
        
        echo array_push($names);
        
        //array_slice
        echo "<pre>";
        print_r(array_slice($names,3,5));
        echo "</pre>";

        //array_splice
        echo "<pre>";
        print_r(array_splice($names,2,3));
        echo "</pre>";


?>