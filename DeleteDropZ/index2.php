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
        #notifications{
            cursor: pointer;
            position: fixed;
            right: 0px;
            z-index: 9999;
            bottom: 0px;
            margin-bottom: 22px;
            margin-right: 15px;
            max-width: 300px;   
        }
    </style>
    <body>
        <div id="notifications"></div>
        <div class="container" >
            <div class='content'>
                <form action="upload.php" class="dropzone" id="myAwesomeDropzone"> 
                </form>  
                <button class="btn btn-primary" type="button" id='uploadfiles' value='Upload Files'>Subir</button>
            </div> 

            <form class="needs-validation-post d-none" id="form" novalidate>
                <div class="input-group mb-3">
                    <input type="text"  name="name" class="form-control" placeholder="Nombre" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        agrega un nombre
                    </div>
                </div>
                <button class="btn btn-primary btn-block" id="registrar">enviar</button>
            </form>
        </div>
        <script src="jquery.min.js"></script>                
        <script src="dropzone.js" type="text/javascript"></script> 
        <script src="Notify.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> 
        <script>
            const fetchAPI = async( url , method , data ) =>{
                let resp =  await fetch(url,{
                    method :  method,
                    body : data 
                });
                return resp.json();
            }
            
            var myAwesomeDropzone = document.querySelector('#myAwesomeDropzone');
            var file = document.querySelector('#uploadfiles');
            var form = document.querySelector('#form');
            
            Dropzone.autoDiscover = false;
            var myDropzone = new Dropzone(".dropzone", { 
                // url: null,//se especifica cuando el form no tiene el aributo action, por de fault toma la url del action en el formulario
                // method: "post", //por defecto es post se puede poner get, put, etc.....
                withCredentials: false,
                parallelUploads: 8, //Cuanto archivos subir al mismo tiempo
                uploadMultiple: false,
                maxFilesize: 8, //Maximo Tama�o del archivo expresado en mg
                paramName: "file",//Nombre con el que se envia el archivo a nivel de parametro
                createImageThumbnails: true,
                maxThumbnailFilesize: 10, //Limite para generar imagenes (Previsualizacion)
                thumbnailWidth: 154, //Medida de largo de la Previsualizacion
                thumbnailHeight: 154,//Medida alto Previsualizacion
                filesizeBase: 1000,
                maxFiles: 8,//si no es nulo, define cu�ntos archivos se cargaRAN. Si se excede, se llamar� el EVENTO maxfilesexceeded.
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
               
                if(myDropzone.files.length > myDropzone.options.maxFiles){
                    
                    Notify('error, No seas pendejo. te exediste en numero de imagenes, tienen que ser 8, borra unas', null, null, 'danger');
                 
                }else if(myDropzone.files.length < myDropzone.options.maxFiles){

                    Notify('error, No seas pendejo. faltan imagenes, agrega mas imagenes hasta que sean 8', null, null, 'danger');

                }else if(myDropzone.files.length == myDropzone.options.maxFiles){

                    Notify('las imagenes han sido guardadas', null, null, 'info');

                    form.classList.remove('d-none');
                    file.classList.add('d-none');
                    
                    myAwesomeDropzone.setAttribute("disabled", false);
                    file.setAttribute("disabled", false)
                    
                    myDropzone.processQueue(); 
                    
                    var img1 = myDropzone.files[0].name; 
                    var img2 = myDropzone.files[1].name; 
                    var img3 = myDropzone.files[2].name; 
                    var img4 = myDropzone.files[3].name; 
                    var img5 = myDropzone.files[4].name; 
                    var img6 = myDropzone.files[5].name; 
                    var img7 = myDropzone.files[6].name; 
                    var img8 = myDropzone.files[7].name; 

                    var forms = document.getElementsByClassName('needs-validation-post');

                    Array.prototype.filter.call(forms, (form) => {
                        form.addEventListener('submit',  (event) => {
                            event.preventDefault();
                            event.stopPropagation();
                            if (form.checkValidity()){
                                let data = new FormData(forms[0]);
                                data.append("opcion","post");
                                data.append("img1", img1);
                                data.append("img2", img2);
                                data.append("img3", img3);
                                data.append("img4", img4);
                                data.append("img5", img5);
                                data.append("img6", img6);
                                data.append("img7", img7);
                                data.append("img8", img8);

                                let url = "registrar.php";
                                fetchAPI(url, "POST", data) 
                                .then((data)=>{
                                    if(data.estatus == "ok"){
s                                        let timerInterval
                                        Swal.fire({
                                            icon: 'success',
                                            title: data.mensaje,
                                            timer: 2000,
                                            timerProgressBar: true,
                                            onBeforeOpen: () => {
                                                Swal.showLoading()
                                                timerInterval = setInterval(() => {
                                                const content = Swal.getContent()
                                                if (content) {
                                                    const b = content.querySelector('b')
                                                    if (b) {
                                                    b.textContent = Swal.getTimerLeft()
                                                    }
                                                }
                                                }, 100)
                                            },
                                            onClose: () => {
                                                clearInterval(timerInterval)
                                            }
                                            }).then((result) => {

                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                location.reload(true);
                                            }
                                        })

                                    }
                                })
                                .catch((e)=>console.error(e));
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });

                }

            });
            
        </script>
        
    </body>
</html>