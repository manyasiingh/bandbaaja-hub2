<?php
$connection = new mysqli("localhost", "root", "", "wedding_old");
session_start();
$q = mysqli_query($connection, "SELECT * FROM `tbl_package` where package_id = '{$_GET['package_id']}'");
$data = mysqli_fetch_assoc($q);
$q1 = mysqli_query($connection, "SELECT * FROM `tbl_vendor` WHERE `vendor_id` = '{$data['vendor_id']}'");
$data1 = mysqli_fetch_assoc($q1);
$q2 = mysqli_query($connection, "SELECT * FROM `tbl_category` WHERE `category_id` = '{$data['category_id']}'");
$data2 = mysqli_fetch_assoc($q2);
if (isset($_POST['payment_now'])) {
    $category_id = $_GET['package_id'];
    $booking_name = $_SESSION['name'];
    $booking_status = "Pending";
    $user_id = $_SESSION['id'];
    $booking_date = $_GET['booking_date'];
    $count = mysqli_query($connection, "SELECT * FROM `tbl_booking` WHERE `user_id` = '{$user_id}' and `category_id` = '{$category_id}' and `booking_date` = '{$booking_date}'");
    $row = mysqli_num_rows($count);
    if ($row == 0) {
        $insert = mysqli_query($connection, "INSERT INTO `tbl_booking`(`booking_name`, `booking_status`, `user_id`, `category_id`, `booking_date`) VALUES ('{$booking_name}','{$booking_status}','{$user_id}','{$category_id}','{$booking_date}')");
        if ($insert) {
            $booking_id = mysqli_insert_id($connection);
            $payment_amount = $_GET['package_price'];
            $payment_mode = $_POST['payment_method'];
            $payment_sql = "INSERT INTO `tbl_payment`(`booking_id`, `payment_amount`, `payment_mode`, `payment_details`) VALUES ('{$booking_id}','{$payment_amount}','{$payment_mode}','{$payment_mode}')";
            $insert = mysqli_query($connection, $payment_sql);
            echo "<script>alert('Booking Successfully');window.location='bookings.php'</script>";
        } else {
            echo "<script>alert('Booking Fail');window.location='package-details.php?package_id=$category_id'</script>";
        }
    } else {
        echo "<script>alert('You Have already Book this package');window.location='bookings.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/sweetalert2/sweetalert2.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/toastr/toastr.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0">
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box" style="width: 800px;">
        <div class="card" style="height: 580px;">
            <div class="card-body login-card-body">
                <div class="row">
                    <div class="col-5 col-sm-3">
                        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                            <!-- <a class="nav-link " id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Cash On Delivery</a> -->
                            <a class="nav-link active" id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">UPI</a>
                            <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Bank Transaction </a>
                            <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false"> Credit / Debit</a>
                        </div>
                    </div>

                    <div class="col-7 col-sm-9">
                        <div class="tab-content" id="vert-tabs-tabContent">
                            <div class="tab-pane " id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab" style="padding: 20px;">
                                <p style="color: green;">Cash On Delivery is Safe Transaction.</p>
                                <form name="myForm1" id="myForm1" method="POST">
                                    <p><b>Payment Amount : </b>Rs.<?php echo $_GET['package_price']; ?></p>
                                    <input hidden name="payment_method" value="Cash Payment" hidden>
                                    <input hidden name="payment_status" value="Pending" hidden>
                                    <input hidden name="package_id" value="<?php echo $_GET['package_id'] ?>" hidden>
                                    <button class="btn btn-primary form-control" type="submit" name="payment_now">Payment Now</button>
                                </form>
                            </div>
                            <div class="tab-pane text-left fade show active" id="vert-tabs-settings" role="tabpanel" aria-labelledby="vert-tabs-settings-tab" style="padding: 20px;">
                                <center>
                                    <form name="myForm2" id="myForm2" method="POST">
                                        <p><b>Payment Amount : </b>Rs.<?php echo $_GET['package_price']; ?></p>
                                        <img src="https://miro.medium.com/max/1168/1*X4FqGngbIt9AxuRlSaAFJw.png" style="width: 200px;">
                                        <p>UPI Id: abc@icici</p>
                                        <input hidden name="payment_method" value="UPI" hidden>
                                        <input hidden name="payment_status" value="Pending" hidden>
                                        <input hidden name="package_id" value="<?php echo $_GET['package_id'] ?>" hidden>
                                        <button class="btn btn-primary form-control" type="submit" name="payment_now">Click Here After Pay</button>
                                    </form>
                                </center>

                            </div>
                            <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                                <form name="myForm3" id="myForm3" method="POST">
                                    <p><b>Payment Amount : </b>Rs.<?php echo $_GET['package_price']; ?></p>
                                    <table class="table table-borderless" style="width: 100%;">
                                        <input hidden name="payment_method" value="Bank-Transfer" hidden>
                                        <input hidden name="payment_status" value="Completed" hidden>
                                        <input hidden name="package_id" value="<?php echo $_GET['package_id'] ?>" hidden>
                                        <tr>
                                            <td>Bank Name</td>
                                            <td>Bank Holder Name</td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Bank Name" name="name" onkeyup="this.value=this.value.replace(/[^a-zA-Z]/g,'');"></td>
                                            <td><input type="text" class="form-control" placeholder="Holder name" name="holder_Name" onkeyup="this.value=this.value.replace(/[^a-zA-Z]/g,'');"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">IFSC Code</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><input type="text" class="form-control" placeholder="Enter IFSC Code" name="ifsc_code"> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <button class="btn btn-primary form-control" type="submit" name="payment_now">Payment Now</button>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                                <form name="myForm4" id="myForm4" method="POST">
                                    <p><b>Payment Amount : </b>Rs.<?php echo $_GET['package_price']; ?></p>
                                    <input hidden name="package_id" value="<?php echo $_GET['package_id'] ?>" hidden>
                                    <table class="table table-borderless" style="width: 500px;">
                                        <input hidden name="payment_method" value="Credit-Debit" hidden>
                                        <input hidden name="payment_status" value="Completed" hidden>
                                        <tr>
                                            <td colspan="2">Card Owner Name <span class="float-right"><b></b></span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><input type="text" class="form-control" placeholder="Enter First Name" name="holder_name" onkeyup="this.value=this.value.replace(/[^a-zA-Z]/g,'');"></td>
                                        </tr>
                                        <tr>
                                            <td>Card Number</td>
                                            <td>CVV </td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="**************" name="c_number" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');">
                                            </td>
                                            <td><input type="text" class="form-control" placeholder="***" name="cvv_number" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');"> </td>
                                        </tr>
                                    </table>
                                    <table class="table table-borderless" style="width: 500px;">
                                        <tr>
                                            <td colspan="3">
                                                <i class="fa fa-credit-card" aria-hidden="true" style="padding-left: 10px;padding-right: 10px;"></i>
                                                <i class="fab fa-paypal" style="padding-right: 22px;"></i>
                                                <i class=" fab fa-google-pay" style="padding-right: 22px;"></i>
                                                <i class="fab fa-amazon-pay" style="padding-right: 22px;"></i>
                                                <i class="fab fa-cc-paypal" style="padding-right: 22px;"></i>
                                                <i class="fab fa-cc-visa" style="padding-right: 22px;"></i>
                                                <i class="fab fa-cc-amex" style="padding-right: 22px;"></i>
                                                <i class="fab fa-cc-discover" style="padding-right: 22px;"></i>
                                                <i class="fab fa-cc-mastercard"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Valid until</td>
                                            <td>
                                                <select style="width: 120px;" name="month" class="form-control">
                                                    <option value="">Month</option>
                                                    <option value="January">January</option>
                                                    <option value="February">February</option>
                                                    <option value="March">March</option>
                                                    <option value="April">April</option>
                                                    <option value="May">May</option>
                                                    <option value="June">June</option>
                                                    <option value="July">July</option>
                                                    <option value="August">August</option>
                                                    <option value="September">September</option>
                                                    <option value="October">October</option>
                                                    <option value="November">November</option>
                                                    <option value="December">December</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select style="width: 120px;" name="year" class="form-control">
                                                    <option value="">Year</option>
                                                    <option value="2030">2030</option>
                                                    <option value="2029">2029</option>
                                                    <option value="2028">2028</option>
                                                    <option value="2027">2027</option>
                                                    <option value="2026">2026</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2023">2023</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <button class="btn btn-primary form-control" type="submit" name="payment_now">Payment Now</button>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</body>

<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>

<script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js?v=3.2.0"></script>

<!-- <script src="https://adminlte.io/themes/v3/dist/js/demo.js"></script> -->
<!-- Start Jquery Validation -->
<!-- <script src="https://jqueryvalidation.org/files/lib/jquery.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
<script>
    $(document).ready(function() {
        $("#myForm3").validate({
            rules: {
                'name': {
                    required: true,
                },
                'holder_Name': {
                    required: true,
                },
                'ifsc_code': {
                    required: true,
                    minlength: 14,
                    maxlength: 14
                },
            },
            messages: {
                name: {
                    required: "Please Enter Bank Name",
                },
                holder_Name: {
                    required: "Please Enter Card Holder Name",
                },
                ifsc_code: {
                    required: "Please Enter IFSC Code",
                },
            },
        });
        $("#myForm4").validate({
            rules: {
                'name': {
                    required: true,
                },
                'holder_Name': {
                    required: true,
                },
                'ifsc_code': {
                    required: true,
                    minlength: 14,
                    maxlength: 14
                },
                'holder_name': {
                    required: true,
                },
                'c_number': {
                    required: true,
                    minlength: 16,
                    maxlength: 16
                },
                'cvv_number': {
                    required: true,
                    minlength: 3,
                    maxlength: 3
                },
                'month': {
                    required: true,
                },
                'year': {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: "Please Enter Bank Name",
                },
                holder_Name: {
                    required: "Please Enter Card Holder Name",
                },
                ifsc_code: {
                    required: "Please Enter IFSC Code",
                },
                holder_name: {
                    required: "Please Enter Card Holder Name",
                },
                c_number: {
                    required: "Please Enter Card Number",
                },
                cvv_number: {
                    required: "Please Enter CVV Number",
                },
                month: {
                    required: "Please Select Month",
                },
                year: {
                    required: "Please Select Year",
                },
            },
        });
    });
</script>

</html>