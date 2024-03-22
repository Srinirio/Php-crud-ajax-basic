
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jQuery Test</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>

<script>
    $(function(){
        alert("jQuery is working!");
    });
</script>

</body>
</html>

//UPDATE AJAX
        $(document).on('click', ".update", function() {
            var update = $(this);
            var id = $(this).attr("data-id");

            $.ajax({
                url: "update.php",
                type: "post",
                data: $("#frm").serialize(),
                success: function() {

                }

            });
        });
