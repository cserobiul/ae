<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Settings extends Model
{
    use HasFactory, HasRoles, SoftDeletes;

    // status
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_PENDING = 'pending';
    const STATUS_DELETE = 'delete';
    const STATUS_BAN = 'ban';


    // sms sender id
    const SMS_SENDER_ID_8801847169884 = '8801847169884';
    const SMS_SENDER_ID_APOL = 'Apol';

    // sms api
    const SMS_API_KEY = 'C20017055fedcd490da445.41117419';
}
