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







    // user gender

    const MALE = 1;
    const FEMALE = 2;


    // product status

    const PUBLISHED = 'published';
    const INACTIVE = 'inactive';

    // discount type

    const NO_DISCOUNT = 1;
    const DISCOUNT_PERCENTAGE = 2;
    const DISCOUNT_FIXED = 3;


    // branch status
    const BRANCH_OPEN = 'open';
    const BRANCH_CLOSED = 'closed';


    // type discount coupon
    const FIXED = 'fixed';
    const PERCENTAGE = 'percentage';


    // type discount coupon
    const INITIATED = 'initiated';
    const PAID = 'paid';
    const ACCEPT = 'accept';
    const REJECT = 'reject';
    const DONE = 'done';



}

