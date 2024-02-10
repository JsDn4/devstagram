'use strict';
import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

//? instanciar dropzone para el formulario con el id dropzone
const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Arrastra una imagen aquí',
    acceptedFiles: '.png,.jpg,.jpge,.gift',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        if (document.querySelector('[name="imagen"]').value.trim()) {
            const imagenPublicada = {}
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('[name="imagen"]').value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);

            imagenPublicada.previewElement.classList.add('dz-success', 'dz-complete');
        }
    },

});


//* Esto es lo que viene desde el controlador de ImagenController
dropzone.on('success', (file, response) => {
    document.querySelector('[name="imagen"]').value = response.imagen
})

dropzone.on('removedfile', (file, response) => {
    document.querySelector('[name="imagen"]').value = ''
})