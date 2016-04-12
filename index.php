<?php
include('config/koneksi.php'); 
if($_SERVER['REQUEST_METHOD'] == "POST") //jika Login button diklik
{
session_start();
//mengambil data dari form login
$userid		 = $_POST['userid'];
$password 	 = md5 ($_POST['password']);
$query		= mysql_query("SELECT * FROM t_user WHERE userid='$userid' AND password='$password'");

//mengecheck level untuk login
if(mysql_num_rows($query)==1)
	{
	$data = mysql_fetch_array($query);
	$_SESSION['userid'] = $data['userid'];
	$_SESSION['level']=$data['level'];
	if($_SESSION['level']=="admin"){
		header('location: config/index.php');
	} else if($_SESSION['level']=="user"){
		header('location: config/index.php');
	}
}else{
?>
 <!---- Notification Apabila Userid Dan Password Tidak Sesuai ---->
 
		<script language="JavaScript">
			alert('Userid atau Password tidak sesuai. Silahkan Di ulang kembali');
			document.location='index.php';
		</script>
<?php
    }
}
?>

<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KONTROL LISENSI</title>

    <link href="assets/plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="assets/plugins/validator/css/bootstrapValidator.css" rel="stylesheet" type="text/css" >

</head>
<body>
<!--===========================================================================================-->

	<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-primary">
				
<!--===========================================================================================-->                   
				   
				   <div class="panel-heading">
                        <h3 class="panel-title"><strong><center>Silahkan Login!</center></strong></h3>
                    </div>
					<br>
<!--===========================================================================================-->
 
					<div class="panel-body">
                        <form id="loginform" method="POST" role="form">
                            <fieldset>
							<!-------------------------------------------------------->
                                <div class="form-group input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input class="form-control" placeholder=" Userid" name="userid" type="text" autofocus />
                                </div>
								<!-------------------------------------------------------->
                                <div class="form-group input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input class="form-control tampilkanpassword" placeholder=" Password" name="password" type="password" value="">
                                </div>
								<!-------------------------------------------------------->
								<div class="checkbox">
                                    <br class="show" />
                                </div>
								<!-------------------------------------------------------->
								<div class="form-group">
									<label class="col-lg-4 control-label" id="captchaOperation"></label>
										<div class="col-lg-5">
											<input type="text" class="form-control" name="captcha" />
										</div>
								</div>
								<br><br>
								<!-------------------------------------------------------->
                                
                                <input type="submit" name="login" class="btn btn-lg btn-primary btn-block" value="Login"></a>
								<br>
								<!-------------------------------------------------------->
                            </fieldset>
                        </form> 
					</div>
					

<!--===========================================================================================-->
					
                </div>
            </div>
        </div>
    </div>

<!--===========================================================================================-->

		<div class="footer" align="center">
			@ <strong>2016</strong> Information System. All Right Reserved.<br><br>
		</div> 
    </div>

    <!-- jQuery -->
    <script src="assets/plugins/jquery/dist/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/dist/metisMenu.min.js"></script>
	<script src="assets/plugins/validator/js/bootstrapValidator.js"></script>
    <script src="assets/js/style.js"></script>
	<script type="text/javascript">
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    function generateCaptcha() {
        $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));
    };
    generateCaptcha();

    $('#loginform')
        .bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                captcha: {
                    validators: {
                        callback: {
                            message: 'Jawaban salah!',
                            callback: function(value, validator) {
                                var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                                return value == sum;
                            }
                        }
                    }
                }
            }
        })
        .on('error.form.bv', function(e) {
            var $form              = $(e.target),
                bootstrapValidator = $form.data('bootstrapValidator');

            if (!bootstrapValidator.isValidField('captcha')) {
                // The captcha is not valid
                // Regenerate the captcha
                generateCaptcha();
            }
        });
});
</script>
<script>
$(function(){$(".tampilkanpassword").each(function(index,input) {
	var $input = $(input);
		$('<label class="tampilkanpassword"/>')
			.append(
				$("<input type='checkbox' class='tampilkanpassword' />")
			.click(function() {
				var change = $(this)
			.is(":checked") ? "text" : "password";
	var rep = $("<input type='" + change + "' />")
		.attr("id", $input.attr("id")).attr("name", $input.attr("name")).attr('class', $input.attr('class')).val($input.val()).insertBefore($input);
		$input.remove();
		$input = rep;
		})).append($("<span/>").text("Tampilkan Password")).insertAfter(".show");
		});
		});
</script>
</body>
</html>
