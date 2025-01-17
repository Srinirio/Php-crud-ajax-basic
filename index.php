<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Crud operation</title>
</head>

<body>
  <!-- Modal -->
  <div class="modal fade" id="model_for_save" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="frm">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name.." autocomplete="name">

                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" class="form-control" id="age" placeholder="Enter your age.." autocomplete="off" name="age">
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" placeholder="Enter your city.." autocomplete="off" name="city">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- Update model -->
    <div class="modal fade" id="model_for_update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="frm_update">
            <input type="hidden" id="update_id" name="id"> 
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="update_name" name="name" placeholder="Enter your name.." autocomplete="name">
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="update_age" placeholder="Enter your age.." autocomplete="off" name="age">
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="update_city" placeholder="Enter your city.." autocomplete="off" name="city">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="update_submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


    <div class="container my-5">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#model_for_save">
            Add your details
            
        </button>
        <div id="load_user_details">

        </div>
    </div>
        




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jquery-cdn -->
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.js" ></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
<script>
    var updateId;
    //CREATE AND READ AJAX
    $(document).ready(function() {
        $("#load_user_details").load("userdetails.php");
        $("#submit").click(function(){
           $.ajax({
            url:"insert.php",
            type:"POST",
            data:$("#frm").serialize(),
            success:function(d)
            {
                 $("<tr></tr>").html(d).appendTo(".table");
                 $("#frm")[0].reset();
                 $('#model_for_save').modal('hide');
            }

           });
        });
        //DELETE AJAX
        $(document).on("click",".delete",function(){
              var del=$(this);
              var id=$(this).attr("data-id");
              $.ajax({
                url:"delete.php",
                type:"post",
                data:{id:id},
                success:function()
                {
                   del.closest("tr").hide();
                }
              });
        });
        //UPDATE AJAX
        $(document).on("click", ".update", function() {
        var id = $(this).attr("data-id");
        console.log(id);
        updateId=id;
        // Make an AJAX request to fetch data for the selected ID
        $.ajax({
            url: "fetch_data.php",
            type: "POST",
            data: { id: id },
            success: function(data) {
                
                var jsonData = JSON.parse(data);

        // Populate the modal fields with the parsed data
        $("#update_name").val(jsonData.Name);
        $("#update_age").val(jsonData.Age);
        $("#update_city").val(jsonData.City)
                
                
                $("#model_for_update").modal("show");
            }
        });
    });
    
    // Handle submit event of the Update form
    $("#update_submit").click(function() {
    var getId = $(this).attr("data-id");
    var getName = $("#update_name").val();
    var getAge = $("#update_age").val();
    var getCity = $("#update_city").val();
    console.log(getCity);
    console.log(getAge);
    console.log(getId);
    $.ajax({
        url: "update.php",
        type: "POST",
        data: {
            sendId: updateId,
            sendName: getName,
            sendAge: getAge,
            sendCity: getCity
        },
        success: function(response) {
            
            
            // alert(response);
            $("#frm_update")[0].reset();
                 
                 $("#load_user_details").load("userdetails.php");
                 $('#model_for_update').modal('hide');
        }
    });
});

    
        
    });
</script>

</html>