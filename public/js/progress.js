// $('.btn-porcentaje').on('click', function() {
//     var val = parseFloat($('#percent').val());
//     val = Math.round(val);
//     alert(val);
//     var $circle = $('#svg #bar');

//     if (isNaN(val)) {
//         val = 100;
//     } else {
//         var r = $circle.attr('r');
//         var c = Math.PI * (r * 2);

//         if (val < 0) { val = 0; }
//         if (val > 100) { val = 100; }

//         var pct = ((100 - val) / 100) * c;

//         $circle.css({ strokeDashoffset: pct });

//         $('#cont').attr('data-pct', val);
//     }
// });
$(document).ready(function() {
    var svg = document.querySelectorAll("#svg");
    $.each(svg, function(key, value) {
        var avance = value.getAttribute('data-avance');

        val = Math.round(avance);

        if (isNaN(val)) {
            val = 100;
        } else {
            var r = 30;
            var c = Math.PI * (r * 2);

            if (val < 0) { val = 0; }
            if (val > 100) { val = 100; }

            var pct = (((100 - val) / 100) * c) + 377;
            var circle = value.lastChild.previousElementSibling;
            //console.log()
            circle.style.strokeDashoffset = pct + "px";
        }
    });

});