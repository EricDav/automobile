<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<?php include_once './common/head.php'; ?>
</head>

<body>
    <div class="banner-w3ls" id="home">
        <!-- header -->
        <?php include_once './common/header.php'; ?>
        <?php include_once './common/contact.php'; ?>
    </div>
    <!-- footer -->
    <?php require_once './common/footer.php'; ?>
    <!-- //footer -->

    <!-- js -->
    <?php require_once './common/script.php'; ?>
    <script>
        $('#sendContact').click(function(event) {
            event.preventDefault();
            name = $('#my-name').val();
            email = $('#my-email').val();
            message = $('#message').val();

            if (name.trim() != '' && email.trim() != '' && message.trim() != '') {
                $.ajax({
                type: "POST",
                url: "<?=$_SERVER['HTTP_HOST'] == 'localhost:8888' ? '/web/sendEmail.php' : '/sendEmail.php' ?>",
                data: {name: name, email:email, message: message},
                success: function(data){
                    alert('here');
                    console.log(data);
                },
                dataType: 'json'
            });
            }
        });
    </script>
<!-- //smooth scrolling -->
</body>
