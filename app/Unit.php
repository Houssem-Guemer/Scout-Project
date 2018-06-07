<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'units';
    protected $primaryKey = 'scout_id';

    /*
     * ===============================
     *          UNIT NAMES
     * ===============================
     */
    

    /**
     * الاشبال
     */
    public const UNITNAME_CUBS           = 'cubs'; 

    /**
     * الكشاف
     */
    public const UNITNAME_SCOUT          = 'sct';
    
    /**
     * الكشاف المتقدم
     */
    public const UNITNAME_ADVANCED_SCOUT = 'asct';

    /**
     * الجوال
     */
    public const UNITNAME_TRAVELLER      = 'tvlr';

    /**
     * ======================================
     *               STAGES
     * ====================================== 
     */

     //For all Units
     public const STAGE_ACCEPTANCE               = 0;
     //Specific for Units except travellers
     public const STAGE_UNIT_BEGINNER            = 1;
     public const STAGE_UNIT_SECOND              = 2;     
     public const STAGE_UNIT_FIRST               = 3;
     //Specific for travelers only
     public const STAGE_TRAVELLER_PREP           = 4;
     public const STAGE_TRAVELLER_TRAINER        = 5;
     public const STAGE_TRAVELLER_PUBLIC_SERVICE = 6;
       
}
