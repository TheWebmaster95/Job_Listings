<?php
require'listings.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Job Listings</title>
</head>

<body class="bg-[#e2ddd9]">

<!--Top Header -->
  <header class="bg-[#253239] text-[#CAD2C5] p-4">
    <div class="container mx-auto">
      <h1 class="text-3xl font-semibold text-center">Job Listings</h1>
    </div>
  </header>

<!-- Average wages -->
  <div class="container mx-auto p-4 mt-4">
    <div class="bg-[#a69afc] rounded-lg shadow-md p-6 my-6">
      <!-- Pulls through function and passes through listings to display. -->
      <h2 class="text-2xl font-semibold mb-4">Average Wage: <?= calculateAverageSalary($listings) ?></h2>
    </div>

    <!-- Output of jobs being pulled through from PHP array -->
    <?php foreach ($filteredListings as $index => $job) : ?>
      <div class="md my-4">
        <!-- if Index is even background will show as cream otherwise will stay white -->
        <div class="rounded-lg shadow-md <?= $index % 2 === 0 ? 'bg-[#f8f1e9]' : 'bg-white' ?>">
          <div class="p-4">
            <h2 class="text-xl font-semibold"><?= $job['title'] ?></h2>
            <p class="text-gray-700 text-lg mt-2"><?= $job['description'] ?></p>
            <ul class="mt-4">
              <li class="mb-2">
                <strong>Salary:</strong> <?=  formatSalary($job['salary']) ?>
              </li>
              <li class="mb-2">
                <strong>Location:</strong> <?= $job['location'] ?>

                <!-- If location is set to Leyland, will include local next to it, if not local then show remote -->
              

                  <?= $job['location'] === 'Leyland' ? '<span class="text-xs text-white bg-blue-500
                  rounded-full px-2 py-1 ml-2">Local</span>' : '<span class="text-xs text-white bg-green-500
                  rounded-full px-2 py-1 ml-2">remote</span>'?>
              </li>



                <!-- If tags dosent display on a job listing then hide it -->
           
                <?= (!empty($job['tags'])) ? '<li class="mb-2">
                
                <strong>Tags:</strong>' . highlightTags($job['tags'], 'PHP') . '</li>' : ''?> <!-- Will higlight any tags that contain PHP -->
                





            </ul>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>


  <footer class="bg-[#253239] text-[#CAD2C5] p-4">
    <div class="container mx-auto">
      <h1 class="text-3xl font-semibold text-center">Liam Middleton 2024</h1>
    </div>
    </Footer>
</body>

</html>