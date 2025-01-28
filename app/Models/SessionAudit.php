<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SessionAudit extends Model
{
    //
    protected $connection = 'pgsql_audit';

    protected $table = 'session_audits';

    protected $fillable = [
        'user_id', 'action', 'ip_address', 'hostname', 'mac_address', 'performed_at',
    ];
}
