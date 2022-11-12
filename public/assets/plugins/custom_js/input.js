// # id
// . class

//---------------Input file name---------------//
function previewImg(){
    const user_image = document.querySelector(['#user_image', '#file_imei', '#file_payload']);
    const user_image_label = document.querySelector('.custom-file-label');
    const imgPreview = document.querySelector('.img-preview');
    
    user_image_label.textContent = user_image.files[0].name;
    
    const file_user_image = new FileReader();
    file_user_image.readAsDataURL(user_image.files[0]);
    
    file_user_image.onload = function(e){
        imgPreview.src = e.target.result;
    }
}