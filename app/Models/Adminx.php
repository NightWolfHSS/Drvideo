<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Adminx extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * - admin table
     *
     * @var string
     */
    protected $table = 'admx';

}
