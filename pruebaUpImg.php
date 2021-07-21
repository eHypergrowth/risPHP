<!Doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>How to Upload & Display Image Using jQuery AJAX PHP and MySQL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
  <body style="margin-top:50px;background:#f2f2f2">
    <div class="container">
      <h2 style="text-align:center;">How to Upload & Display Image Using jQuery AJAX PHP and MySQL</h2>
        <div class="row">
         <div class="col-md-4"></div>  
          <div class="col-md-4" style="margin-top:20px;margin-bottom:20px;">

          <div class="alert alert-success alert-dismissible success" style="display: none;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <span class="success-message">File uploaded successfully</span>  
          </div>
          <div class="alert alert-danger alert-dismissible danger" style="display: none;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <span class="danger-message">This type of image is not allow</span>  
          </div>

          <form id="submitForm">
            <div class="form-group">
              <label for="file">Select File</label>
              <input type="file" class="form-control" name="file" id="file" required="">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success btn btn-block">Upload</button>
            </div>  
          </form>
        </div>
      </div>
      <div class="row">
      <div class="col-md-4"></div>  
        <div class="card col-md-4" id="preview" style="display: none;">
          <div class="card-body" id="imageView">
                   
          </div>
        </div>    
      </div>
    </div>
    <!---jQuery ajax file upload --->
<script type="text/javascript">
  $(document).ready(function(){
      $("#submitForm").on("submit", function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
          url  : "upEjemplo.php",
          type : "POST",
          cache:false,
          data :formData,
          contentType : false, // you can also use multipart/form-data replace of false
          processData: false,
          success:function(response){
            $("#preview").show();
            $("#imageView").html(response);
            $("#file").val('');
          }
        });
      });
  });
</script>
  </body>
</html>