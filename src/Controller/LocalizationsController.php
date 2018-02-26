<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Images Controller
 *
 * @property \App\Model\Table\ImagesTable $Images
 *
 * @method \App\Model\Entity\Image[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LocalizationsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);       
        $this->Auth->allow(['lang']);    }
    
    public function lang(){
        $this->redirect($this->referer());
    }
}