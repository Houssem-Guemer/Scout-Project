<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Scout extends Model
{
    protected $table = 'scouts';
    protected $primaryKey = 'scout_id';
    public $timestamps = false;
    protected $membership_date;

    protected $fillable = [
        'first_name', 'last_name', 'assurance_num', 'date_of_birth',
        'membership_date', 'email', 'phone'
    ];

    public function __construct(array $attributes = []){
        parent::__construct($attributes);

        do{
            $id = mt_rand(10000, 99999);
            $query = DB::select('SELECT * FROM Scouts WHERE scout_id = ?', [$id]);
        }while(count($query) !== 0);

        $this->scout_id = $id;
    }

    private function getYear(){
        $date = $this->attributes['membership_date'];
        list($year, $month, $day) = explode('-', $date);

        return $year;
    }

    public function getFullName(){
        return $this->last_name.' '.$this->first_name;
    }

    /**
     * Gets the registration number (Matricule) of this scout
     * Registration ID is of format:
     *       SF-YYNNNNN
     * Where: SF: a fixed prefix
     *        YY: two last digits of the year
     *        NNNNN: sequence number
     * @return string registration number
     */
    public function getRegistrationNumber(){
        return 'SF-'.substr($this->getYear(), 2, 2).$this->scout_id;
    }
}
