<?php
/**
 * Created by PhpStorm.
 * User: palko
 * Date: 2018. 02. 07.
 * Time: 21:02
 */

namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * User mailer.
 */
class UserMailer extends Mailer
{

    /**
     * @param $data
     */
    function register($data)
    {

        $this->to($data['user']['email'])
            ->from($data["form"])
            ->profile('default')
            ->emailFormat('html')
            ->template($data['template'],'users')
            ->viewVars(['data'=>$data])
            ->subject(sprintf($data['subject']));

    }

    /**
     * @param $data
     **/
    function forgotpassword($data)
    {

        $this->to($data['user']['email'])
        ->from($data["form"])
        ->profile('default')
        ->emailFormat('html')
        ->template($data['template'],'users')
        ->viewVars(['data'=>$data])
        ->subject(sprintf($data['subject']));

    }

    function changePasswordEmail($data)
    {

        $this->to($data['user']['email'])
        ->from($data["form"])
        ->profile('default')
        ->emailFormat('html')
        ->template($data['template'],'users')
        ->viewVars(['data'=>$data])
        ->subject(sprintf($data['subject']));

    }

}

