<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete the uploaded file from Dropzone.js - PHP</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link href="dropzone.css" rel="stylesheet" type="text/css">
    </head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .dz-remove{
            width: 7rem;
            height: 2rem;
            text-decoration: none;
            background-color: #dc3545;
            color: white;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            /* margin-top: -12.5rem; */
            margin-left: .5rem;
            padding: 4px;
        }
        .dropzone .dz-preview .dz-remove:hover {
            text-decoration: none;
            color: white;
            background-color: #007bff;

        }
        .dropzone .dz-preview .dz-remove {
            font-size: 14px;
            text-align: center;
            display: initial;
            cursor: pointer;
            border: none;
            margin-top:-4rem;
        }
        .dz-error-message{
            margin-top: 1.5rem;
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
                // url: null,//se especifica cuando el form no tiene el aributo action, por de fault toma la url del action en el formulario
                // method: "post", //por defecto es post se puede poner get, put, etc.....
                withCredentials: false,
                parallelUploads: 5, //Cuanto archivos subir al mismo tiempo
                uploadMultiple: false,
                maxFilesize: 5, //Maximo Tama�o del archivo expresado en mg
                paramName: "file",//Nombre con el que se envia el archivo a nivel de parametro
                createImageThumbnails: true,
                maxThumbnailFilesize: 10, //Limite para generar imagenes (Previsualizacion)
                thumbnailWidth: 154, //Medida de largo de la Previsualizacion
                thumbnailHeight: 154,//Medida alto Previsualizacion
                filesizeBase: 1000,
                maxFiles: 5,//si no es nulo, define cu�ntos archivos se cargaRAN. Si se excede, se llamar� el EVENTO maxfilesexceeded.
                params: {}, //Parametros adicionales al formulario de envio ejemplo {tipo:"imagen"}
                clickable: true,
                ignoreHiddenFiles: true,
                acceptedFiles: "image/*", //EJEMPLO PARA PDF WORD ETC ,application/pdf,.psd,.DOCX",
                acceptedMimeTypes: null,//Ya no se utiliza paso a ser AceptedFiles
                autoProcessQueue: false,//True sube las imagenes automaticamente, si es false se tiene que llamar a myDropzone.processQueue(); para subirlas
                autoQueue: true,
                addRemoveLinks: true,//Habilita la posibilidad de eliminar/cancelar un archivo. Las opciones dictCancelUpload, dictCancelUploadConfirmation y dictRemoveFile se utilizan para la redacci�n.
                previewsContainer: null,//define d�nde mostrar las previsualizaciones de archivos. Puede ser un HTMLElement liso o un selector de CSS. El elemento debe tener la estructura correcta para que las vistas previas se muestran correctamente.
                capture: null,
                dictDefaultMessage: "Arrastra los archivos aqui para subirlos",
                dictFallbackMessage: "Su navegador no soporta arrastrar y soltar para subir archivos.",
                dictFallbackText: "Por favor utilize el formuario de reserva de abajo como en los viejos timepos.",
                dictFileTooBig: "La imagen revasa el tama�o permitido ({{filesize}}MiB). Tam. Max : {{maxFilesize}}MiB.",
                dictInvalidFileType: "No se puede subir este tipo de archivos.",
                dictResponseError: "Server responded with {{statusCode}} code.",
                dictCancelUpload: "Cancel subida",
                dictCancelUploadConfirmation: "�Seguro que desea cancelar esta subida?",
                dictRemoveFile: "X",
                dictRemoveFileConfirmation: null,
                dictMaxFilesExceeded: "Se ha excedido el numero de archivos permitidos.",
                            
                
            });

            file.addEventListener('click', () => {
                myDropzone.processQueue();
                e.stopPropagation();
            });

        </script>
        
    </body>
</html>