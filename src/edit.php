<?php include('config/db_connect.php');?>
<?php
    include('config/db_connect.php');
    if (!isset($_GET['id'])) header('Location: error.php');
    $id = $_GET['id'];
    $query = "SELECT * FROM DOCGIA where madg = '$id'";
    $result = mysqli_query($conn, $query);
    $recipient = mysqli_fetch_assoc($result);

    $Name =$recipient['hovaten'];
    $YearofBirth =$recipient['namsinh'];
    $Job =$recipient['nghenghiep'];
    $CardIssueDate =$recipient['ngaycapthe'];
    $CardExpirationate =$recipient['ngayhethan'];

    $SelectSex =$recipient['gioitinh'];    
    $Address =$recipient['diachi'];

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
        $sql = "UPDATE DOCGIA SET hovaten = '$Name', namsinh = '$YearofBirth',  gioitinh = '$SelectSex', ngaycapthe = '$CardIssueDate', ngayhethan = '$CardExpirationate',diachi = '$Address', nghenghiep = '$Job' where madg = '$id'";
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
                <input name="Name" class="form-control"  Value= "<?php echo $Name?>" required>
            </div>
            <div>
            <label for="SelectSex" class="mt-2">Giới tính</label>
            <select class="form-control " name="SelectSex">
                <option <?php if ($SelectSex == "Nam") echo "selected";  ?> value="Nam">Nam</option>
                <option <?php if ($SelectSex == "Nữ") echo "selected";  ?> value="Nữ">Nữ</option>
                <option <?php if ($SelectSex == "Khác") echo "selected";  ?> value="Khác">Khác</option>
            </select>

        </div>
            <div class="form-group mt-2">
                <label for="YearofBirth">Năm sinh</label>
                <input name="YearofBirth" class="form-control"  Value= <?php echo $YearofBirth?>  required>
            </div>
            <div class="form-group mt-2">
                <label for="Job">Nghề nghiệp</label>
                <input name="Job" class="form-control" Value= "<?php echo $Job?>" required>
            </div>
                <div class="form-group mt-2">
                    <label for="CardIssueDate">Ngày đăng kí</label>
                    <input name="CardIssueDate" class="form-control" Value= <?php echo $CardIssueDate?> required>
                </div>
                <div class="form-group mt-2">
                    <label for="CardExpirationate">Ngày hết hạn</label>
                    <input name="CardExpirationate" class="form-control" Value= <?php echo $CardExpirationate?> required>
                </div>
                <div class="form-group mt-2">
                    <label for="Address">Địa chỉ</label>
                    <input name="Address" class="form-control" Value= "<?php echo $Address?>" required>
                </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary" name="add">Thêm</button>
            </div>
        </form>
    </div>
<?php include('templates/footer.php'); ?>

</html>