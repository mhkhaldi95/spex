<?php
/**
 * Created by PhpStorm.
 * User: Eng samer i. alkahlout
 * Date: 12/1/2018
 * Time: 8:08 AM
 */


namespace App\Constants;

class Enum
{



    // role user

    const SUPER_ADMIN = 1;
    const ADMIN = 2;
    const CUSTOMER = 3;


    // product status

    const PUBLISHED = 'published';
    const INACTIVE = 'inactive';


    // order status

    const NEW = 'new';
    const PREPARATION = 'preparation';
    const SHIPPED = 'shipped';
    const CLEARANCE = 'clearance';
    const DELIVERING = 'delivering';
    const DELIVERED = 'delivered';












}

