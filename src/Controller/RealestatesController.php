<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\Component\GoogleTrait;
use Cake\I18n\Time;
use Cake\Event\Event;
use Cake\I18n\I18n;
use Cake\Mailer\MailerAwareTrait;
use  MongoDB\BSON\toJSON;
use Cake\Filesystem\File;   
/**
 * Realestates Controller
 *
 * @property \App\Model\Table\RealestatesTable $Realestates
 *
 * @method \App\Model\Entity\Realestate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RealestatesController extends AppController
{   
	use GoogleTrait;
    use MailerAwareTrait;

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->now = new Time();
        $this->Auth->allow(['index','view','sendemail']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {   
        $filter = null;
        $now = new Time();

        if ($this->request->is('get')){
            if($this->request->query("categories")
            || $this->request->query("types")
            || $this->request->query("citys")
            || $this->request->query("min_price")
            || $this->request->query("max_price")){
               
         
               foreach ($this->request->query() as $key => $value) {
                        if(!empty($value)){ 
                            if(!empty($value["_ids"])){   
                                
                                    $filter[$key] = $value['_ids']; 
    
                            }                            
                            elseif(!empty($key) && !is_array($value)){
                                $filter[$key]=$value;
                            }
                        }                         
                    }
 
                   
                if($filter != null)
                    {
                        
                    $query = $this->Realestates->find();
                        
                    if(isset($filter['categories'])){                                       
                        $query->where(['category_id  IN' =>$filter['categories']]);
                      
                    }
                    if(isset($filter['types'])){                                       
                        $query->where(['type_id IN' =>$filter['types']]);                     
                    } 
                    if(isset($filter['citys'])){                                       
                        $query->where(['city  IN' => $filter["citys"]]);                     
                    }
                    if(isset($filter['min_price'])){
                                           
                        $query->where(['price >= ' =>$filter['min_price']]  
                        ); 
                    }
                    if(isset($filter['max_price'])){
                    $query->where(['price <= ' => $filter['max_price']]  
                        ); 
                    }
                    $query->order(['premium' =>'asc']); 
                    $query->contain(['Images']); 
                    $query->order(['premium' =>'desc']);     
                    $realestates = $this->paginate($query);
                }
                else{
                    $this->paginate = [
                        'contain' => ['Images'],
                        'order'=>['premium' =>'desc'] 
                    ];
                    $realestates = $this->paginate($this->Realestates);
                }
 
            }
            else{

                $this->paginate = [
                    'contain' => ['Images'],
                    'order'=>['premium' =>'desc'] 
                ];
                $realestates = $this->paginate($this->Realestates);
                
            }

           
       
        $types = $this->Realestates->Types->find('list', ['limit' => 200])->where([
            'active' => 1
        ]); 
                $opt[]= "";
        
        $citys = $this->Realestates
        ->find('list', ['valueField' => 'city', 'keyField' => 'city',])
        ->select(['city'])
        ->distinct('city')
        ->where(['active' => 1]);

         
         
        $categories = $this->Realestates->Categories->find('list', ['limit' => 200])->where([
            'active' => 1
        ]);
        
        $this->set(compact('realestates'));
        $this->set(compact('categories'));
        $this->set(compact('citys'));
        $this->set(compact('types'));
        $this->set(compact('now'));
        
        }

        else{
            $this->Flash->error(__('ERROR'));
            return $this->redirect(['action' => 'index']);
        }
       

    }
    /**
     * View method
     *
     * @param string|null $id Realestate id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $realestate = $this->Realestates->get($id, [
            'contain' => ['Users', 'Types', 'Categories', 'ConvenienceGrades', 'HeatingTypes', 'ConditionOfProperties', 'Parkings', 'Phones', 'Images']
        ]);
        $this->visitors($id);
        $this->set('realestate', $realestate);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $realestate = $this->Realestates->newEntity();
     
        $user = $this->request->session()->read('Auth.User');
        if ($this->request->is('post')) {
        if (!isset($this->request->params['_csrfToken']) || ($this->request->params['_csrfToken'] != $this->request->cookies['csrfToken'])) {
                $this->Security->blackHoleCallback = '__blackhole';
            } else {

                
                $now = new Time();

                $data = $this->request->getData();
              
                if (!isset($data["locality"]) || $data["locality"] == "" ) {
                    $this->Flash->error(__('Un a google addres is empty try again.'));
                } else {

                    $json_a = $this->googleaddresscordinate($data);

                    $state = $this->getstate($json_a);
                    $city = $this->getcity($json_a);
                    $street = $this->getstreet($json_a);
                    $housenumber = $this->gethousenumber($json_a);
                    $zipCode = $this->getzipCode($json_a);
                    $district = $this->getDistrict($json_a);

                    $lat = $json_a['results']['0']['geometry']['location']['lat'];
                    $lng = $json_a['results']['0']['geometry']['location']['lng'];

                    $images[] = $data["images"];
                     
                    $realestate = $this->Realestates->patchEntity($realestate, $data);
                    $realestate->user_id = $user["id"];
                    $realestate->active = true;
                    $realestate->state = $state;
                    $realestate->city = $city;
                    $realestate->street = $street;
                    $realestate->zipCode = $zipCode != "" ? $zipCode : 0;
                    $realestate->district = $district;
                    $realestate->latitude = $lat;
                    $realestate->longitude = $lng;
                    $realestate->created_by = $user["id"];
                    $realestate->created = $now;
                    $realestate->modified_by = $user["id"];
                    $realestate->modified = $now;
                    $realestate->houseNumber = $housenumber;
                    $realestate->comment = htmlspecialchars($data["comment"]);
                    $realestate->built_year=$data["built_year"]['year'];
                    
                   
                    if ($realestate->images[0]["name"] != "") {
                        foreach ($images[0] as $key => $item) {

                            $r = $this->generateRandomString();
                            if (!empty($item['name'])) {
                                $fileName = $r . "_" . substr($item['name'], -7);
                                $type = substr($item["type"], 6);

                                $uploadPath = 'img/File/Image/';
                                $uploadFile = $uploadPath . $fileName . "." . $type;

                                if (move_uploaded_file($item['tmp_name'], $uploadFile)) {
                                    
                                    $realestate->images[$key]["name"] = $fileName;
                                    $realestate->images[$key]["active"] = 1;
                                    $realestate->images[$key]["created_by"] = $user["id"];
                                    $realestate->images[$key]["modified_by"] = $user["id"];

                                } else {
                                    $this->Flash->error(__('Unable to upload file, please try again.'));
                                }
                            } else {
                                $this->Flash->error(__('Please choose a file to upload.'));
                            }
                        }
                    } else {
                        $realestate->images = null;
                    }

                 
                    if ($this->Realestates->save($realestate)) {
                        $this->Flash->success(__('The realestate has been saved.'));
                        return $this->redirect(['action' => 'index']);
                    }
                   
                    $this->Flash->error(__('The realestate could not be saved. Please, try again.'));
                }
                
            }
        }

        $types                 = $this->toList($this->Realestates->Types->find('active', ['limit' => 200])->toArray());
        $categories            = $this->toList($this->Realestates->Categories->find('active', ['limit' => 200]));
        $convenienceGrades     = $this->toList($this->Realestates->ConvenienceGrades->find('active', ['limit' => 200]));
        $heatingTypes          = $this->toList($this->Realestates->HeatingTypes->find('active', ['limit' => 200]));
        $conditionOfProperties = $this->toList($this->Realestates->ConditionOfProperties->find('active', ['limit' => 200]));
        $parkings              = $this->toList($this->Realestates->Parkings->find('active', ['limit' => 200]));        
        $array                 = $this->Realestates->Phones->find("UserPhonesRealestatesAdd",$user)->toList();


        foreach ($array as $key => $value) { 
            $phones[$value["id"]]=$value["phoneNumber"];
        }
        
     
        $this->set(compact('realestate', 'users', 'types', 'categories', 'convenienceGrades', 'heatingTypes', 'parkings', 'conditionOfProperties','phones'));
        $this->set('_serialize', ['realestate']);
        
    
    }


    
    /**
     * Edit method
     *
     * @param string|null $id Realestate id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $realestate = $this->Realestates->get($id, [
            'contain' => ['Phones']
        ]);
        $user = $this->request->session()->read('Auth.User');
        $id = $user['id'];
        $uid = $realestate->user_id;
        
        if($id == $uid) {
        
            if ($this->request->is(['patch', 'post', 'put'])) {
              
                
                    if (!isset($this->request->params['_csrfToken']) || ($this->request->params['_csrfToken'] != $this->request->cookies['csrfToken'])) {
                            $this->Security->blackHoleCallback = '__blackhole';
                        } else {

                            $now = new Time();
                            $error = false;
                            $data = $this->request->getData();
                            
                            if (isset($data["locality"])) {
            
                                $json_a = $this->googleaddresscordinate($data);                                

                                $state = $this->getstate($json_a);
                                $city = $this->getcity($json_a);
                                $street = $this->getstreet($json_a);
                                $housenumber = $this->gethousenumber($json_a);
                                $zipCode = $this->getzipCode($json_a);
                                $district = $this->getDistrict($json_a);
            
                                $lat = $json_a['results']['0']['geometry']['location']['lat'];
                                $lng = $json_a['results']['0']['geometry']['location']['lng'];

                                
                                $realestate = $this->Realestates->patchEntity($realestate, $data);
                                $realestate->state = $state;
                                $realestate->city = $city;
                                $realestate->street = $street;
                                $realestate->zipCode = $zipCode != "" ? $zipCode : 0;
                                $realestate->district = $district;
                                $realestate->latitude = $lat;
                                $realestate->longitude = $lng;
                                $realestate->modified_by = $user["id"];
                                $realestate->modified = $now;
                                $realestate->houseNumber = $housenumber;
                                $realestate->comment = htmlspecialchars($data["comment"]);
                                $realestate->built_year=$data["built_year"]['year'];
                            }
                            else{
                               
                                if($data["googlecity"]=="")
                                {
                                    $this->Flash->error(__('Nem atdál meg cimet'));
                                    $error = true;

                                }else{
                                                                         
                                        $error = false;

                                        $realestate = $this->Realestates->patchEntity($realestate, $data);
                                        $realestate->modified_by = $user["id"];
                                        $realestate->modified = $now;
                                        $realestate->comment = htmlspecialchars($data["comment"]);
                                        $realestate->built_year=$data["built_year"]['year'];
                                }
                                
                            }
     
                        if (!$error) {
                            
                            if($this->Realestates->save($realestate)){
                                $this->Flash->success(__('The realestate has been saved.'));
                                return $this->redirect(['action' => 'index']);
                            }                           
                           
                        }
                        else{
                            $this->Flash->error(__('The realestate could nqot be saved. Please, try again.'));
                        }                        
                }         
        }     

        $types                 = $this->toList($this->Realestates->Types->find('active', ['limit' => 200])->toArray());
        $categories            = $this->toList($this->Realestates->Categories->find('active', ['limit' => 200]));
        $convenienceGrades     = $this->toList($this->Realestates->ConvenienceGrades->find('active', ['limit' => 200]));
        $heatingTypes          = $this->toList($this->Realestates->HeatingTypes->find('active', ['limit' => 200]));
        $conditionOfProperties = $this->toList($this->Realestates->ConditionOfProperties->find('active', ['limit' => 200]));
        $parkings              = $this->toList($this->Realestates->Parkings->find('active', ['limit' => 200]));        
        $array                 = $this->Realestates->Phones->find("UserPhonesRealestatesAdd",$user)->toList();


        foreach ($array as $key => $value) {              
            $phones[$value["id"]] = $value["phoneNumber"];
        }
        
     
        $this->set(compact('realestate', 'users', 'types', 'categories', 'convenienceGrades', 'heatingTypes', 'parkings', 'conditionOfProperties','phones'));
        }
        else{
            $this->Flash->error(__('You dont have access'));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function deleteImage($id = null) {

        $this->request->allowMethod(['post', 'delete']);
        $image = $this->loadModel('Images');
        $images = $image->get($id);

        $fileName = $images->name; 
        if ($image->delete($images)) {
            $uploadPath = 'img\File\Image\\';
            $uploadFile = $uploadPath . $fileName;
            $file = new File(WWW_ROOT . $uploadFile, false, 0777);
         
            if($file->delete()) {
                $this->Flash->success(__('The user has been deleted.'));
            }
            
            
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function editImage($id = null)
    {
        $realestate = $this->Realestates->get($id, [
            'contain' => ['Images']
        ]);
        $user = $this->request->session()->read('Auth.User');

            if ($this->request->is(['patch', 'post', 'put'])) {
            
                
                    if (!isset($this->request->params['_csrfToken']) || ($this->request->params['_csrfToken'] != $this->request->cookies['csrfToken'])) {
                            $this->Security->blackHoleCallback = '__blackhole';
                        } else {

                            $now = new Time();
                            $error = false;
                            $data = $this->request->getData();
                            $images[] = $data["images"];
                           
                            $realestate = $this->Realestates->patchEntity($realestate, $data);

                        foreach ($images[0] as $key => $item) {

                            $r = $this->generateRandomString();
                            if (!empty($item['name'])) {
                                $fileName = $r . "_" . substr($item['name'], -7);                                

                                $uploadPath = 'img/File/Image/';
                                $uploadFile = $uploadPath . $fileName;

                                if (move_uploaded_file($item['tmp_name'], $uploadFile)) {
                                    
                                    $realestate->images[$key]["name"] = $fileName;
                                    $realestate->images[$key]["active"] = 1;
                                    $realestate->images[$key]["created_by"] = $user["id"];
                                    $realestate->images[$key]["modified_by"] = $user["id"];

                                } else {
                                    $this->Flash->error(__('Unable to upload file, please try again.'));
                                }
                            } else {
                                $this->Flash->error(__('Please choose a file to upload.'));
                            }
                        }
                    } 

                             
                            if($this->Realestates->save($realestate)){
                                $this->Flash->success(__('The realestate has been saved.'));
                                return $this->redirect(['action' => 'index']);
                            } else{
                                $this->Flash->success(__('The realestate has  not saved.'));
                                 
                            }                          
                                                
                }   
                $this->set(compact('realestate'));
        }    
       
    
   


    /**
     * Delete method
     *
     * @param string|null $id Realestate id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $realestate = $this->Realestates->get($id);
        if ($this->Realestates->delete($realestate)) {
            $this->Flash->success(__('The realestate has been deleted.'));
        } else {
            $this->Flash->error(__('The realestate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    private function generateRandomString($length = 50)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    private function toList($inputArray){
        foreach ($inputArray as $key => $value) { 
            $outPutArray[$value["id"]]=$value["name"];
       }
       return $outPutArray;
    }

    private function visitors($id = null){

        $realestate = $this->Realestates->get($id);
        $realestate->visitors++;
        $this->Realestates->save($realestate);
              
    }

    public function adminIndex(){
        $this->paginate = [
            'contain' => ['Users', 'Types', 'Categories', 'ConvenienceGrades', 'HeatingTypes', 'ConditionOfProperties', 'Parkings','Images']
        ];
        $tableValues = $this->paginate($this->Realestates);
       
        $types = $this->Realestates->Types->find('list', ['limit' => 200])->where([
            'active' => 1
        ]); 
                $opt[]= "";
        
        $citys = $this->Realestates
        ->find('list', ['valueField' => 'city'])
        ->select(['city'])
        ->distinct('city')
        ->where(['active' => 1]);
         
        $categories = $this->Realestates->Categories->find('list', ['limit' => 200])->where([
            'active' => 1
        ]);
        
        $this->set(compact('tableValues'));
        $this->set(compact('categories'));
        $this->set(compact('citys'));
        $this->set(compact('types'));
    }
     

    public function uslist(){
        $user = $this->request->session()->read('Auth.User');
 

        $this->paginate = [
            'conditions' => array('Realestates.user_id ' => $this->Auth->user(["id"])),
            'limit' => 9,
            'contain' => ['Users', 'Types', 'Categories', 'ConvenienceGrades', 'Heatingtypes', 'Parkings', 'ConditionOfProperties', 'Images']
        ];
        $tableValues = $this->paginate($this->Realestates);
        $this->paginate = ['conditions' => array('Realestates.user_id ' => $this->Auth->user(["id"])),
        'limit' => 9,
            'contain' => ['Users', 'Types', 'Categories', 'ConvenienceGrades', 'HeatingTypes', 'ConditionOfProperties', 'Parkings','Images']
        ];
        $tableValues = $this->paginate($this->Realestates);
       
        $types = $this->Realestates->Types->find('list', ['limit' => 200])->where([
            'active' => 1
        ]); 
        $opt[]= "";
        
        $citys = $this->Realestates
        ->find('list', ['valueField' => 'city'])
        ->select(['city'])
        ->distinct('city')
        ->where(['active' => 1]);
         
        $categories = $this->Realestates->Categories->find('list', ['limit' => 200])->where([
            'active' => 1
        ]);
        
        $this->set(compact('tableValues'));
        $this->set(compact('categories'));
        $this->set(compact('citys'));
        $this->set(compact('types'));
    }



    public function premium($id = null){
        $this->request->allowMethod(['get']);
        $realestate = $this->Realestates->get($id);
        $this->set(compact('realestate'));
        $this->set('_serialize', ['realestate']);
    }

    function maps(){
        $this->paginate = [
            'contain' => ['Users', 'Types', 'Categories', 'ConvenienceGrades', 'HeatingTypes', 'ConditionOfProperties', 'Parkings','Images']
        ];
        $realestates = $this->paginate($this->Realestates);
       
        $types = $this->Realestates->Types->find('list', ['limit' => 200])->where([
            'active' => 1
        ]); 
                $opt[]= "";
        
        $citys = $this->Realestates
        ->find('list', ['valueField' => 'city'])
        ->select(['city'])
        ->distinct('city')
        ->where(['active' => 1]);
         
        $categories = $this->Realestates->Categories->find('list', ['limit' => 200])->where([
            'active' => 1
        ]);
        
        $this->set(compact('realestates'));
        $this->set(compact('categories'));
        $this->set(compact('citys'));
        $this->set(compact('types'));
    }
    
    public function sendemail(){
        $this->request->allowMethod(['post']);
 
        $emaildata = $this->request["data"];
 
        $email = $emaildata["email"];
        $id = $emaildata["id"];
        $messages = $emaildata["messages"];
        $realestate = $this->Realestates->get($id, [
            'contain' => ['Users']
        ]);
 
         $usermail;
         $usermail["user"]=$realestate->user;
         $usermail["id"]=$id;
         $usermail["form"]=$email;
         $usermail["message"]=$messages;         
         $usermail["template"] = "email";
         $usermail["subject"]  = __('Realestates ');
         
         if($this->getMailer('User')->send("email", [$usermail])){
            $this->Flash->success(__('The email success send.'));
            return $this->redirect(['action' => 'index']);
   
         }else{
            $this->Flash->error(__('Try again !'));
            return $this->redirect(['action' => 'index']);
   
         }
         
     }


}
