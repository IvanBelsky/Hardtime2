<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 21.10.22
 * Time: 16:14
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;


class UserController
{
    public function userInfo()
    {
        return Response("ok");
    }

}
