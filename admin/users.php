<?php include('./layouts/header.php')?>
    <!-- conent -->
    <table class="table table-striped mt-2">
        <thead class="text-center">
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>MOBILE NUMBER</th>
            <th>OCCUPATION TYPE</th>
            <th>ACTION</th>
        </thead>
        <tbody class="text-center">
        <?php 
            $data = mysqli_query($db_connect,"select * from users where role='user' ORDER BY id DESC");
            $rows = mysqli_fetch_all($data,true);
            $i = 1;
            foreach($rows as $row){
        ?>
            <tr id="<?=$i?>">
                <td><?= $i?></td>
                <td><?= $row['name']?></td>
                <td><?= $row['email']?></td>
                <td><?= $row['mobile_number']?></td>
                <td><?= $row['occupation_type']?></td>
                <td>
                    <button class="badge btn-danger shadow-none border-0 rounded-circle p-2" data-id="<?=$row['id']?>" data-row="<?=$i?>" id="delete-btn"><i class="ri-delete-bin-line"></i></button>
                </td>
            </tr>
            
        <?php 
            $i ++;
            }
        ?>
        </tbody>
    </table>
   
<?php include('./layouts/footer.php')?>
<script>
        $(document).on('click','#delete-btn',function(){
            let rowID = $(this).data('row');
            let id = $(this).data('id');
            $.ajax({
            url : "../controller/userController.php?task=delete",
            type : "POST",
            data : {id : id},
            success : function(data){
                if(data == 1){       
                    location.reload(true);
                }else{
                    alert("FAILED TO DELETE JOB");
                };
            }
        });            
        })
</script>
   
<body>
</html>