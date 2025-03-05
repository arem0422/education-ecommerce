<?php 

function slog(){

    list($callee) = debug_backtrace();
    $vars = $callee['args'];
    $postData = [
        'time' => date("Y-m-d h:i:s"),
        'file' => $callee['file'],
        'line' => $callee['line'],
        'count' => count($callee['args']),
        'data' => $vars
    ];

    $apiName = "api/slog/send";
    $curl = curl_init(env("URL_SOCKET","") . $apiName);

    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POST, 1);

    if (!empty($postData)) {
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData));
    }
    // Set the content type to application/json
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

    $result = json_decode(curl_exec($curl));
    llog($result);
    // // Comprobar si occurió algún error
    if ($errno = curl_errno($curl)) {
        $error_message = curl_strerror($errno);
        llog($error_message);
        return false;
    }
    curl_close($curl);
 
    return;
}

/**
 * Metodo para debuguear variables en laravel log
 * @author Hector Vilches Flores
 * 
 * @param $var any
 * 
 * @return void
 */
function llog(){

    list($callee) = debug_backtrace();
    $vars = $callee['args'];

    Log::info("-----------------------------------------");
    Log::info("LLOG | Count Arguments : " . count($callee['args']));
    Log::info("LLOG | File : " . $callee['file'] );
    Log::info("LLOG | Line : " . $callee['line'] );
    foreach($vars as $k => $var){
        try {
            Log::info("LLOG | " . "\t" .  " Parameter => " . $k);
            if(gettype($var) === 'array' || gettype($var) === 'object'){
                descomponer($var);
            } else {
                
                Log::info("LLOG | Name => '" . $k . "' Type : '" . gettype($var) . "' Value = " . $var);
            }
        } catch (\Throwable $th) {
            Log::info($th->getMessage() . " file" . $th->getFile() . " : " . $th->getLine());
        }
    }
    Log::info("-----------------------------------------");
 
    return;
}

function descomponer($var){

    
    foreach($var as $k => $v){
        if(gettype($v) === 'array' || gettype($v) === 'object'){
            descomponer($v);
        } else {
            Log::info("LLOG | Name => '" . $k . "' Type : '" . gettype($v) . "' Value = " . $v);
        }
    }

}

function getTryCatch($e)
{
    return $e->getMessage() . " => " . $e->getFile() . " : " . $e->getLine();
}

function getImgByDomain()
{
    $domain = request()->root();
    if(Str::contains($domain, "udd") || Str::contains($domain, "udp")){
        $domain = "universidad";
    }
    if(Str::contains($domain, "sasi")){
        $domain = "sasi";
    }

    switch ($domain) {
        case 'universidad':
            $img = "https://static.vgroup.cl/2022/07/VGROUP/mantenimiento_lms.jpg";
            break;
        case 'sasi':
            $img = "https://static.vgroup.cl/2022/07/VGROUP/mantenimiento_sasi.jpg";
            break;
        
        default:
            $img = "https://static.vgroup.cl/2022/07/VGROUP/mantenimiento_vgroup.jpg";
            break;
    }

    return $img;
}
    function logCritico($title = "Error send mailer", $description = "")
        {

            $url_webhook = "https://discord.com/api/webhooks/1004783228164513872/jFI1caQCeuvBIJLSfFAuU5fFK4jNLtAiVQybLcV3sXmEv64vf9Q36eDuHHcXDyF4OEwY";
            $fechayhora = date("c", strtotime("now"));
            $datos_json = json_encode(
                [
                    "content" => "Hubo un error con el envio de correo.",
                    "username" => "aescalona#1211",
                    "avatar_url" => "https://gravatar.com/avatar/60d924975d568ec3badd825a5df40296?s=400&d=robohash&r=x",
                    "embeds" => [
                        [
                            "title" => $title,
                            "type" => "rich",
                            "description" => $description,
                            "url" => "https://api-lms.vgroup.cl",
                            "timestamp" => $fechayhora,
                            "thumbnail" => [
                                "url" => "https://static.vgroup.cl/2022/07/VGROUP/Vgroup_fondo.png"
                            ],
                            "author" => [
                                "name" => "Bot HunterBug",
                                "url" => "https://api-lms.vgroup.cl"
                            ]
                        ]
                    ]


                ],
                JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
            );

            $curl = curl_init($url_webhook);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json', "Length" => strlen($datos_json)));
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $datos_json);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($curl, CURLOPT_HEADER, 0);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

            $respuesta = curl_exec($curl);
            $error_msg = curl_error($curl);
            $errstr = null;
            if (curl_errno($curl)) {
                $errstr = curl_errno($curl) . ": " . curl_error($curl) . " verbose: " . $respuesta;
                llog($errstr);
            }

            curl_close($curl);
        }
?>