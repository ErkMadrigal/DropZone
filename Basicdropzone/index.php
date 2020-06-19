<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">

</head>
<body>
    <form class="needs-validation dropzone" id="drop" action="upload.php" novalidate>
        <div class="input-group mb-3">
            <input type="text"  name="title" class="form-control" placeholder="title" required>
            
            <div class="invalid-feedback">
                please write a title
            </div>
        </div>
        <div class="input-group-mb-3">
          <div class="fallback">
            <input class="form-control" name="file" id="file" type="file" placeholder="file" multiple required/>
          </div>
          <div class="valid-feedback">
            please enter a file
          </div>
        </div>
        <button class="btn btn-primary">Submit form</button>
      </form>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
    <!-- <script src="app.js"></script> -->
    <script>
      (() => {
          'use strict';
          window.addEventListener('load', () => {
              Dropzone.options.drop = {
                uploadMulltiple: true,
                dictCancelUpload: true,
                dictRemoveFileConfirmation: true,
                addRemoveLinks: true,
                maxFilesize: 2,
                maxFiles: 2,
                acceptedFiles: 'images/*',

                init: init = () = >{
                  this.on('error', () => {
                    alert("error al subir el archivo");
                  });
                }
              };
              
          }, false);
      })();
    </script>
</body>
</html>