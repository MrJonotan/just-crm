<?php

namespace App\Filters;

use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;
use Laratrust\Laratrust;

class RoleMenuFilter implements FilterInterface
{
    public function __construct(Laratrust $laratrust)
    {
        $this->laratrust = $laratrust;
    }

    public function transform($item)
    {
        if (isset($item['permission']) && ! $this->laratrust->isAbleTo($item['permission'])) {
            $item['restricted'] = true;
        }
        if(isset($item['roles']) && ! $this->laratrust->hasRole($item['roles'])){
            $item['restricted'] = true;
        }
        return $item;
    }
}
