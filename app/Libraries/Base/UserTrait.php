<?php namespace App\Libraries\Base;
use App\Libraries\Repositories\UserRepository;

/**
 * Created by PhpStorm.
 * User: bappu
 * Date: 11/15/15
 * Time: 7:55 PM
 */

    trait UserTrait
    {
        private $user;
        function __construct(UserRepository $userRepository)
        {
            $this->user=$userRepository;
        }
        public function crateUser($request)
        {
            $values=$this->user->createUser($request);
            return $values;
        }
    }