<?php include('config/db_connect.php');?>
<?php
// DOCGIA(madg, hovaten, gioitinh, namsinh, nghenghiep, ngaycapthe, ngayhethan, diachi)
    if(isset($_POST['add']))
    {
        $Name =$_POST['Name'];
        $YearofBirth =$_POST['YearofBirth'];
        $Job =$_POST['Job'];
        $CardIssueDate =$_POST['CardIssueDate'];
        $CardExpirationate =$_POST['CardExpirationate'];

        $SelectSex =$_POST['SelectSex'];    
        $Address =$_POST['Address'];

        $sql ="INSERT INTO DOCGIA ( hovaten, gioitinh, namsinh, nghenghiep, ngaycapthe, ngayhethan, diachi) VALUES ('$Name','$SelectSex','$YearofBirth','$Job','$CardIssueDate','$CardExpirationate','$Address')";
        $res = mysqli_query($conn, $sql);

        if ($res) {

            header("location: index.php");
        } else {
            header("location: error.php");
        }
    }   

?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>
    <div class="container">
        <h2 class="d-flex justify-content-center">Thêm đọc giả</h2>

        <form method="POST" action="">
        <div class="form-group  mt-2 ">
                <label for="name">Họ và tên</label>
                <input name="Name" class="form-control" required>
            </div>
            <div>
            <label for="SelectSex" class="mt-2">Giới tính</label>
            <select class="form-control " name="SelectSex">
                <option>Nam</option>
                <option>Nữ</option>
                <option>Khác</option>
            </select>

            </div>
            <div class="form-group mt-2">
                <label for="YearofBirth">Năm sinh</label>
                <input name="YearofBirth" class="form-control"  required>
            </div>
            <div class="form-group mt-2">
                <label for="Job">Nghề nghiệp</label>
                <input name="Job" class="form-control" required>
            </div>
                <div class="form-group mt-2">
                    <label for="CardIssueDate">Ngày đăng kí</label>
                    <input name="CardIssueDate" class="form-control" required>
                </div>
                <div class="form-group mt-2">
                    <label for="CardExpirationate">Ngày hết hạn</label>
                    <input name="CardExpirationate" class="form-control" required>
                </div>
                <div class="form-group mt-2">
                    <label for="Address">Địa chỉ</label>
                    <input name="Address" class="form-control" required>
                </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary" name="add">Thêm</button>
            </div>
        </form>
    </div>
<?php include('templates/footer.php'); ?>

</html>