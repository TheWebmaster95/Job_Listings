<?php


/* Job listings are stored in an array */
$listings = [
    [
      'id' => 1,
      'title' => 'Junior PHP Full Stack Developer',
      'description' => 'Would you like to work as the junior in a 5-strong development team? OneTwo is a leading UK event management, production and creative agency.',
      'salary' => 25000,
      'location' => 'Leyland',
      'tags' => ['PHP', ' HTML', ' CSS', ' Javascript']
    ],
    [
      'id' => 2,
      'title' => 'Web Designer',
      'description' => 'We are seeking a creative and detail-oriented Web Designer to join our dynamic team. The ideal candidate will have a strong passion for web design, with a keen eye for aesthetics and user experience',
      'salary' => 24000,
      'location' => 'Lancaster',
      'tags' => [' HTML', ' CSS', ' Javascript', ' Figma']
    ],
    [
      'id' => 3,
      'title' => 'Full Stack Developer',
      'description' => 'We are looking for a highly skilled and versatile Full Stack Developer to join our team. The ideal candidate is proficient in both front-end and back-end technologies, capable of taking projects from concept to completion',
      'salary' => 50000,
      'location' => 'Lancaster',
      'tags' => ['React', 'PHP', 'SQL']
    ],
    [
      'id' => 4,
      'title' => 'UX Designer',
      'description' => ' are seeking a talented and user-centered UX Designer to join our growing team. The ideal candidate is passionate about understanding user needs and behaviors, and excels at creating intuitive, accessible, and delightful user experiences.',
      'salary' => 30000,
      'location' => 'Leyland',
      'tags' => ['User Experience', 'Wireframing', 'Prototyping']
    ],
    [
      'id' => 5,
      'title' => 'Customer Service Representative',
      'description' => 'We are looking for a friendly customer service representative to assist customers and resolve issues.',
      'salary' => 40000,
      'location' => 'Manchester',
      'tags' => []
    ],

    [
        'id' => 6,
        'title' => 'IT Technician',
        'description' => 'we are seeking a skilled and reliable IT Technician to join our team. The ideal candidate will be responsible for maintaining and troubleshooting our IT infrastructure, providing technical support to staff, and ensuring the smooth operation of all IT systems.',
        'salary' => 60000,
        'location' => 'Westeros',
        'tags' => [' Problem Solving', ' Technical Skills', ' Familiarity with networking protocols']
      ],
  ];
  
  
  
  function formatSalary($salary){
    return '£' . number_format($salary,); // Returns the £ sign and outputs it to show wage as currency and then formats the number so its more redable. 
  }
  
  function highlightTags($tags, $searchTerm){ // Creates a function that will highlight tags based on a search term
    $tagsStr = implode(', ', $tags); // Split each tag up with a comma
    return str_replace ($searchTerm, "<span class='bg-[#CAD2C5]'>{$searchTerm}</span>" , $tagsStr); // Look at the tags string and looks at the search term and it will replace that with the search term that has the yellow background assigned to it
  }
  
  
  function calculateAverageSalary($jobListings) {
    $totalSalary =0;
    $count = count($jobListings);
     // count total number of job listings
  
     foreach($jobListings as $job){
      $totalSalary += $job ['salary']; // will count all salerys and add them together
     }
  
     $averageSalary = ($count > 0) ? $totalSalary / $count : 0; //If salry is greater than 0 divide that by the count else show 0
  
  return formatSalary($averageSalary); // Will format the average salery to make it more readable
  
  }
  
  
  
  function filterListingsByLocation($listings, $location){ // Definining filter listings function
  return array_filter($listings, function($job) use ($location) { //filter out anything thats not the location speficied in search
  return strcasecmp($job['location'], $location) === 0;
  });  
  }
  
  // Check if location query string exists
  
  if(isset($_GET['location'])) { // If location is found
  $location = $_GET['location']; // Grab the location
  
  
  $filteredListings = filterListingsByLocation($listings, $location); // Created different varible to loop through
  } else {// if location query string isin't there
  $filteredListings = $listings; // set to the origional listing
  }



?>