<?php

namespace App\Console\Commands;

use App\Compra;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\CarroAbandonado as MailCarroAbandonado;
use App\Models\Planilla;
use App\Product;
use stdClass;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class CarroAbandonado extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:carro  {fecha?} {idCarro?} {--send-email} {--qa} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia notificacion de carro de compra abandonado';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $fecha = $this->argument('fecha') ?? date("Y-m-d");
        $idCarro = $this->argument('idCarro') ?? 0;
        $sendEmail = $this->option('send-email');
        $qa = $this->option('qa');
        if($qa){
            $SQL = "CALL `procedimiento_carritoAbandonadoQA`('$fecha', '$idCarro');";
            $carritos = DB::select(DB::raw($SQL));
        } else {
            $carritos = DB::select(DB::raw("CALL procedimiento_carritoAbandonado('$fecha', '$idCarro');"));
        }
        foreach ($carritos as $key => $carro) {
            # code...
            // Template correo carro abandonado
            if ($sendEmail) {
                // Template asignado al carrito abandonado
                $template = Planilla::find(10);
                $arrayProductos = explode(",", $carro->productos);
                $productos = Product::whereIn("id", $arrayProductos)->get();
                $htmlTabla = view("email.partials.detalleTablaCarro", ["productos" => $productos])->render();
                $htmlPlantilla = $template->htmlPlantilla;
                $htmlBoton = '<a style="text-decoration: none; border-radius: 50rem; padding: 12px 50px; color: #36382E; background-color: #FCDC04; font-size: 14px; font-weight: bold;" href="' . URL::to("recovery-cart") . "/" . $carro->nOrden . '">Recuperar mi carrito</a>';

                $html = str_replace("[nombre]", $carro->nombre, $htmlPlantilla);
                $html = str_replace("[tabla_productos]", $htmlTabla, $html);
                $html = str_replace("[boton_recuperar]", $htmlBoton, $html);

                $paramEnvioEmail = [
                    "emailFrom" => $template->emailFrom,
                    'subject' => $template->subject,
                    'html' => $html
                ];
                Mail::to($carro->correo)->send(new MailCarroAbandonado($paramEnvioEmail));
                echo "Correo enviado asd@gamil.com";
            }
            echo "$fecha IdCarro: $carro->id Orden: $carro->nOrden Carro Abandonado de $carro->nombre - $carro->correo" . "\n";
        }

    }
}
