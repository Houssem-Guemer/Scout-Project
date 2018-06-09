<?php

namespace App\Constants;

class Roles{
    /**
     * المحافظ
     */
     public const GOVERNOR               = 'gov';

     /**
      * نائب المحافظ, مسؤول الادارة
      */
     public const VICE_GOVERNOR          = 'vgov';

     /**
      * مسؤول الاعلام
      */
     public const MEDIA                  = 'med';

     /**
      * نائب مسؤول الاعلام
      */
     public const VICE_MEDIA             = 'vmed';

     /**
      * مسؤول المالية
      */
     public const FINANCE                = 'fin';

     /**
      * نائب مسؤول المالية, مسؤول العتاد
      */
     public const VICE_FINANCE           = 'vfin';

     /**
      * مسؤول خدمة المجتمع
      */
     public const PUBLIC_SERVICE         = 'psrv';

     /**
      * نائب مسؤول خدمة المجتمع
      */
     public const VICE_PUBLIC_SERVICE    = 'vpsv';

     /**
      * قائد وحدة
      */
     public const UNIT_CAPTAIN           = 'ucap';

     /**
      * نائب قائد وحدة
      */
     public const UNIT_VICE_CAPTAIN      = 'vucp';

     /**
      * قائد وحدة مساعد
      */
     public const UNIT_CAPTAIN_ASSISTANT = 'capa';

     /**
      * قائد وحدة متربص
      */
     public const UNIT_CAPTAIN_TRAINEE   = 'trne';
}