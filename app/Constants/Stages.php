<?php

namespace App\Constants;

class Stages {
    /**
     * مرحلة القبول
     */
    public const ACCEPTANCE               = 0;

    /**
     * مرحلة المبتدئ
     */
    public const UNIT_BEGINNER            = 1;

    /**
     * مرحلة الثاني
     */
    public const UNIT_SECOND              = 2;   
    
    /**
     * مرحلة الأول
     */
    public const UNIT_FIRST               = 3;

    /**
     * مرحلة جوال إعداد
     */
    public const TRAVELLER_PREP           = 4;

    /**
     * مرحلة جوال تدريب
     */
    public const TRAVELLER_TRAINER        = 5;

    /**
     * مرحلة جوال خدمة عامة
     */
    public const TRAVELLER_PUBLIC_SERVICE = 6;
}