var $ImputAvatar, $ChangeAvatar;

$(function() {
    $ImputAvatar = $('.input-avatar');
    $ImputAvatar.on('change', function(event) {
        let urltemp = URL.createObjectURL(event.target.files[0]);
        $ImgUrl = 'url("' + urltemp + '")';
        let urlactual = $('.img-perfil').css("background-image", $ImgUrl);
    });
});
