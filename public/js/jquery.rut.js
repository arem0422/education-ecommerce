(function($){
    $.fn.rut = function(options){
        var settings = $.extend({
            largoRut: 8,
            caracteresPermitidos: '0123456789kK',
            condicionar: function(){return true;},
            onError: function(){},
            onSuccess: function(){}
        }, options);

        function limitarEntradaCaracteres(e){
            var charCode = (e.which == null || e.which == 0) ? e.keyCode : e.which;
            if(!settings.condicionar() || charCode <= 46){
                return;
            }
            var chr = String.fromCharCode(charCode);
            return (settings.caracteresPermitidos.indexOf(chr) !== -1);
        }

        function formateaRut(){
            if(!settings.condicionar()){
                return;
            }
            $this = sanitizar($(this).val());
            var dv = $this.slice(-1);
            var rut = $this.substr(0, $this.length - 1).slice(0, settings.largoRut);
            var rutFormateado = separadorDecimal(rut) + (rut.length > 0 ? "-" : "") + dv;
            $(this).val(rutFormateado);
        }

        function validaRut(){
            if(!settings.condicionar()){
                settings.onSuccess();
                return;
            }
            $this = sanitizar($(this).val());
            if($this == ''){
                return;
            }
            var dv = $this.slice(-1).toLowerCase();
            var rut = $this.substr(0, $this.length - 1);
            var m = 0, s = 1;
            for( ; rut; rut = Math.floor(rut/10)){
                s = (s + rut % 10 * (9 - m++ % 6)) % 11;
            }

            if (dv == (s ? s - 1 : 'k')) {
                settings.onSuccess();
            }else{
                settings.onError();
            }
        }

        function sanitizar(s){
            return s.replace(/\.|\-/g,"").replace(/\s+/g, '');
        }

        function separadorDecimal(n){
            var ret = "";
            for(var i = n.length-1, j = 0; i >= 0; i--, j++){
                ret = n.charAt(i) + (j > 0 && j % 3 == 0 ? "." : "") + ret;
            }
            return ret;
        }

        return this.each(function(){
            $(this)
                .bind('keypress',limitarEntradaCaracteres)
                .bind('keyup blur', formateaRut)
                .bind('blur', validaRut);
        });
    }
})(jQuery);

