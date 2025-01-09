<?php 
session_start();
include('connection.php');
$data=[];
  $sql="select * from temple";
  $res=$con->query($sql);
  if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
      $data[]=$row;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Temple sites</title>
</head>
<body>
<?php require_once '../header.php'; ?>
<a class="btn btn-success" href="/devalaya/admin/addtemple.php">New Temple Site</a>

<?php if(count($data)>0){ ?>
          <table class="table">
            <thead>
              <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Details</th>
                <th>Address</th>
                <th>Deity</th>
                <th>Construction Year</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $i=0; 
                foreach($data as $row){ 
                $i++;
              ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["details"]; ?></td>
                <td><?php echo $row["address"]; ?></td>
                <td><?php echo $row["deity"]; ?></td>
                <td><?php echo $row["made_year"]; ?></td>
                <td><a href='edittemple.php?id=<?php echo $row["id"]; ?>' class='btn-blue'><i class="fa-light fa-pen"></i></a></td>
                <td><a href='delete.php?id=<?php echo $row["id"]; ?>' onclick='return confirm("Are You Sure?")'  class='btn-red'>Delete</a></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
      <?php }else{ ?>
        <div class='alert-red'>No Records</div>
<?php }?>

</body>
</html>