<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
    <title>Admin</title>
</head>
<body>
<div class="container">
            <!-- About wrapper -->
            <div class="about-wrapper">
                <div class="content" style="height:500px;">
                <br>
                <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12">
                        <form id="fileUploadForm" action="{{url('/')}}/admin" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="mycsv" id="mycsv" class="form-control" value="">
                        
                        
                        <div id="pbar" style="display:none">        
                        <p class="text-success">Note: Don't refresh the page, file is uploading.... </p>
                        </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">  
                        <button class="btn btn-primary" name="upload" id="upload" >Import</button>  

                        <span><a href="{{url('/')}}/display">Display</a></span>
                        
                        
                        <div id="spenner" style="display:none;">
                            <div class="spinner-border text-primary" role="status">
                                <span class="sr-only"></span>
                            </div>
                        </div>
                        </form>  
                        </div>
                        <!--<div class="col">
                            
                        </div>-->
                    </div><!-- End of Row -->   
                </div>
            </div>
</div>
</body>
</html>