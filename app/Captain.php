<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Captain extends Model
{
    protected $table = 'captains';
    protected $primaryKey = 'scout_id';

    /**
     * ===============================
     *            ROLES
     * ===============================
     */

     public const ROLE_GOVERNOR               = 'gov';
     public const ROLE_VICE_GOVERNOR          = 'vgov'; // مسوول الادارة
     public const ROLE_MEDIA                  = 'med';
     public const ROLE_VICE_MEDIA             = 'vmed';
     public const ROLE_FINANCE                = 'fin';
     public const ROLE_VICE_FINANCE           = 'vfin'; //مسوول العتاد
     public const ROLE_PUBLIC_SERVICE         = 'psrv';
     public const ROLE_VICE_PUBLIC_SERVICE    = 'vpsv';
     public const ROLE_UNIT_CAPTAIN           = 'ucap';
     public const ROLE_UNIT_VICE_CAPTAIN      = 'vucp';
     public const ROLE_UNIT_CAPTAIN_ASSISTANT = 'capa';
     public const ROLE_UNIT_CAPTAIN_TRAINEE   = 'trne';

     /**
      * ==================================
      *           UNITS (DUPLICATA)
      * =================================
      */

      /**
     * الاشبال
     */
    public const UNIT_CUBS           = 'cubs'; 

    /**
     * الكشاف
     */
    public const UNIT_SCOUT          = 'sct';
    
    /**
     * الكشاف المتقدم
     */
    public const UNIT_ADVANCED_SCOUT = 'asct';

    /**
     * الجوال
     */
    public const UNIT_TRAVELLER      = 'tvlr';
}
