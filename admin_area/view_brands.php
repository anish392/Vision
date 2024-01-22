 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>View brands</title>
 </head>

 <body>
     <h3 class="text-center text-success">All brands</h3>
     <table class="table table-bordered mt-5">
         <thead class="bg-primary  text-center">
             <tr>
                 <th>SN</th>
                 <th>Brand title</th>
                 <th>Edit</th>
                 <th>Delete</th>
             </tr>
         </thead>
         <tbody class="bg-secondary text-light">
             <?php
                $select_brand = "select * from brands";
                $result = mysqli_query($con, $select_brand);
                $number = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $brand_id = $row['brand_id'];
                    $brand_title = $row['brand_title'];
                    $number++;
                ?>

                 <tr class="text-center">
                     <td><?php echo $number ?></td>
                     <td><?php echo $brand_title ?></td>
                     <td><a href='index.php?edit_brand=<?php echo $brand_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i> </a></td>
                     <td><a href='index.php?delete_brand=<?php echo $brand_id ?>' type="button" class=" text-light" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a> </td>
                 </tr>
             <?php
                } ?>

         </tbody>
     </table>



     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">

                 <div class="modal-body">
                     <h4>Are you sure want to delete this</h4>
                 </div>
                 <!-- ? halnu aagadi jastai ?view_brand -->
                 <div class="modal-footer">
                     <button type="button" class="btn btn-primary"><a href="./index.php?delete_brand=<?php echo $brand_id ?>" class="text-light text_decoration-none">Yes</a></button>
                     <button type="button" class="btn btn-primary"><a href="./index.php" class="text-light text_decoration-none">No</a></button>

                 </div>
             </div>
         </div>
     </div>
 </body>

 </html>