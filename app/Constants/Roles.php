<?php
class Roles{
    /**
     * المحافظ
     */
     public const ROLE_GOVERNOR               = 'gov';

     /**
      * نائب المحافظ, مسؤول الادارة
      */
     public const ROLE_VICE_GOVERNOR          = 'vgov';

     /**
      * مسؤول الاعلام
      */
     public const ROLE_MEDIA                  = 'med';

     /**
      * نائب مسؤول الاعلام
      */
     public const ROLE_VICE_MEDIA             = 'vmed';

     /**
      * مسؤول المالية
      */
     public const ROLE_FINANCE                = 'fin';

     /**
      * نائب مسؤول المالية, مسؤول العتاد
      */
     public const ROLE_VICE_FINANCE           = 'vfin';

     /**
      * مسؤول خدمة المجتمع
      */
     public const ROLE_PUBLIC_SERVICE         = 'psrv';

     /**
      * نائب مسؤول خدمة المجتمع
      */
     public const ROLE_VICE_PUBLIC_SERVICE    = 'vpsv';

     /**
      * قائد وحدة
      */
     public const ROLE_UNIT_CAPTAIN           = 'ucap';

     /**
      * نائب قائد وحدة
      */
     public const ROLE_UNIT_VICE_CAPTAIN      = 'vucp';

     /**
      * قائد وحدة مساعد
      */
     public const ROLE_UNIT_CAPTAIN_ASSISTANT = 'capa';

     /**
      * قائد وحدة متربص
      */
     public const ROLE_UNIT_CAPTAIN_TRAINEE   = 'trne';
}