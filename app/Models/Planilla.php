<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planilla extends Model
{
    use HasFactory;
    protected $table = 'plantilla_emails';
	protected $primaryKey = 'idPlantilla';

}
