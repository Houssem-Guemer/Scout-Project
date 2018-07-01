<?php

namespace App\Support\Authorization;


use Cache;
use Config;
use Zizaco\Entrust\Traits\EntrustUserTrait;

trait AuthorizationUserTrait
{
    use EntrustUserTrait, CacheFlusherTrait;

    public function cachedRoles()
    {
        return Cache::remember('entrust_role_for_user_'.$this->primaryKey, Config::get('cache.ttl'), function () {
            return $this->role();
        });
    }

    public function save(array $options = [])
    {   //both inserts and updates
        parent::save($options);
        $this->flushUserRolesCache($this);
    }

    public function delete(array $options = [])
    {   //soft or hard
        parent::delete($options);
        $this->flushUserRolesCache($this);
    }

    public function restore()
    {   //soft delete undo's
        parent::restore();
        $this->flushUserRolesCache($this);
    }
}