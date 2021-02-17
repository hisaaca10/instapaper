$(function() {
    // Multiple images preview with JavaScript



    var multiImgPreview = function(input, imgPreviewPlaceholder) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#frmImage').on('submit', function(e){
        e.preventDefault();
        let form = $(this)[0];
        let datos = new FormData(form);

        swal.fire({
            title: 'Please wait',
            text: 'We are doing our magic..',
            icon: 'info',
            allowOutsideClick: false
        });

        swal.showLoading();

        axios.post(form.action, datos).then(res => {
            if(!res.data.err){

                if(res.data.view_html){
                    $("#output").html(res.data.view_html);
                }

                swal.fire({
                    title: 'Successfully',
                    text: res.data.res,
                    icon: 'success',
                    confirmButtonText: 'Good',
                    allowOutsideClick: false
                });

            }else{
                swal.fire({
                    title: 'Notification',
                    text: res.data.err,
                    icon: 'warning',
                    confirmButtonText: 'Cancel',
                    allowOutsideClick: false
                });
            }

        }, (err) => {
            swal.fire({
                title: 'Notification',
                text: 'There are connection problems with the server. Please try again in a few minutes.',
                icon: 'warning',
                confirmButtonText: 'Cancel',
                allowOutsideClick: false
            });
        });
    });

    $('#images').on('change', function() {
        multiImgPreview(this, 'div.imgPreview');
    });
});

function printImage(path_url) {
    var mywindow = window.open(path_url);
    mywindow.focus();
    mywindow.print();
}
