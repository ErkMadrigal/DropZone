<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete the uploaded file from Dropzone.js - PHP</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link href="dropzone.css" rel="stylesheet" type="text/css">
    </head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        .dz-preview .dz-image-preview{
            margin-top: 4rem !important;
        }
        .dz-remove{
            width: 7rem;
            height: 2rem;
            text-decoration: none;
            background-color: #dc3545;
            color: white;
            font-size: 100%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            margin-top: -12.5rem;
            margin-left: 1.5rem;
            padding: 4px;
        }
    </style>
    <body>
        <div class="container" >
            <div class='content'>
                <form action="upload.php" class="dropzone" id="myAwesomeDropzone"> 
                </form>  
            </div> 
            <button class="btn btn-primary" type="button" id='uploadfiles' value='Upload Files'>Subir</button>
        </div>
        
        <script src="dropzone.js" type="text/javascript"></script>  
        <script type='text/javascript'>
        
            let file = document.querySelector('#uploadfiles');
            
            Dropzone.autoDiscover = false;
            var myDropzone = new Dropzone(".dropzone", { 
                addRemoveLinks: true,
                autoProcessQueue: false,
                parallelUploads: 10,
                
            });

            file.addEventListener('click', () => {
                myDropzone.processQueue();
                e.stopPropagation();
            });

        </script>
        
    </body>
</html>