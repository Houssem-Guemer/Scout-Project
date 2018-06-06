<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Captain extends Model
{
    protected $table = 'captains';
    protected $primaryKey = 'scout_id';

    protected $fillable = [
        'scout_id', 'role', 'apr'
    ];

    public const ROLE_GOVERNEUR         = 'GOV';
    public const ROLE_GOVERNEUR_ADJOINT = 'AGV';
    public const ROLE_MEDIA             = 'MED';
    public const ROLE_FINANCE           = 'FIN';
    public const ROLE_CAPITAIN_DUNITE   = 'CAP';
    public const ROLE_CAPITAIN_ADJOINT  = 'ACP';
    
}

