<?php

    include('config/db_connect.php');
    $sql = "SELECT * from DOCGIA";
    $res = mysqli_query($conn, $sql);
    $recipients = mysqli_fetch_all($res, MYSQLI_ASSOC);
    // echo '<pre>' , var_dump($recipients) , '</pre>';
    // exit;

?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>
    

    <div class="container">
        <a href="add.php" class="btn btn-success mb-3">Thêm độc giả</a>
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Năm sinh</th>
                    <th scope="col">Nghề nghiệp</th>
                    <th scope="col">Ngày cấp thẻ</th>
                    <th scope="col">Ngày hết hạn</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>
        <tbody>
            <?php foreach ($recipients as $i => $recipient) : ?>
                <tr>
                    <!-- //DOCGIA(madg, hovaten, gioitinh, namsinh, nghenghiep, ngaycapthe, ngayhethan, diachi) -->
                    <th scope="row"><?php echo $i + 1 ?></th>
                    <td><?php echo $recipient['hovaten'] ?> </td>

                    <td><?php echo $recipient['gioitinh'] ?> </td>
                    <td><?php echo $recipient['namsinh'] ?> </td>
                    <td><?php echo $recipient['nghenghiep'] ?> </td>
                    <td><?php echo $recipient['ngaycapthe'] ?> </td>
                    <td><?php echo $recipient['ngayhethan'] ?> </td>
                    <td><?php echo $recipient['diachi'] ?> </td>
                    
                    <td><a class=" text-primary" href="edit.php?id=<?php echo $recipient['madg']; ?>"><i class="bi bi-pencil-square"></i></a></td>
                    <td><a class="text-danger" href="delete.php?id=<?php echo $recipient['madg']; ?>"> <i class="bi bi-trash"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   

<?php include('templates/footer.php'); ?>
</html>