<?php require_once("conn.php");

$sql = "SELECT * FROM examFees";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
       ?>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Name
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Class
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Status
            </th>
           
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">

       <?php

        
        foreach($rows as $row){
            
            ?>
            <?php  $color = ($row['fStatus'] == 'Paid')?  "green":"red"; ?>
             
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img class="h-10 w-10 rounded-full" src='<?php echo "https://randomuser.me/api/portraits/thumb/men/".rand(10,100).".jpg"; ?>' alt="">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                      <?php echo $row['stuName']; ?>
                    </div>
                    <div class="text-sm text-gray-500">
                      j<?php echo $row['email']; ?>
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900"> <?php echo $row['class']; ?></div>
                <div class="text-sm text-gray-500">Science</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-<?php echo $color; ?>-200 text-<?php echo $color; ?>-800">
                <?php echo $row['fStatus']; ?>
                </span>
              </td>             
            </tr>
           
            

            <?php
            
        }
?>
        </tbody>
        </table>
        <?php
    } else {
    echo "0 results...";
}
?>
