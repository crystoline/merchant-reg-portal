
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Reset Password | <?php print __SITE_SHORTNAME__ ?></title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url()?>favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <style>
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            src: local('Roboto'), local('Roboto-Regular'), url(<?php echo base_url()?>/fonts/oeEVQYYBjVpg-nn8NItjTw.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 700;
            src: local('Roboto Bold'), local('Roboto-Bold'), url(<?php echo base_url()?>/fonts/77FXFjRbGzN4aCrSFhlh3qCWcynf_cDxXwCLxiixG1c.ttf) format('truetype');
        }

        @font-face {
            font-family: 'Material Icons';
            font-style: normal;
            font-weight: 400;
            src: url(<?php echo base_url()?>/fonts/2fcrYFNaTjcS6g4U3t-Y5StnKWgpfO2iSkLzTz-AABg.ttf) format('truetype');
        }

        .material-icons {
            font-family: 'Material Icons';
            font-weight: normal;
            font-style: normal;
            font-size: 24px;
            line-height: 1;
            letter-spacing: normal;
            text-transform: none;
            display: inline-block;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            -webkit-font-smoothing: antialiased;
        }


    </style>

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url()?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url()?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url()?>plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url()?>css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"> <?php print __SITE_SHORTNAME__ ?></a>
            <small><?php print __SITENAME__ ?></small>
        </div>
        <div class="card">
            <div class="body">
                <?php
                    if(@$status):
                        ?>
                        <div class="alert alert-success">Password changed successfully</div>
                        Please <a href="<?php print site_url('/user/login') ?>">Log in</a>
                        <?php
                    else:
                ?>
                <form id="sign_in" method="POST">
                    <div class="msg">Reset Your password</div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="test" class="form-control" name="password" placeholder="Enter new password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                </form>
	            <?php
	                endif;
	            ?>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url()?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url()?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url()?>plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url()?>plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url()?>js/admin.js"></script>
    <script src="<?php echo base_url()?>js/pages/examples/sign-in.js"></script>
</body>

</html>
