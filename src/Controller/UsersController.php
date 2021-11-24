<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Comments'],
        ]);

        $this->set(compact('user'));
    }

 /*   public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
        
            
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }*/
    
    public function add(){
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
             $user = $this->Users->patchEntity($user, $this->request->getData());
            
            if(!$user->getErrors){
            $image = $this->request->getData('image_file');
            $name = $image->getClientFilename();
            $targetPath = WWW_ROOT.'img'.DS.$name;
            if($name)
                $image->moveTo($targetPath);
            
            $user->userimage = $name;
            }
        
            
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
            
        }
        
    
        
        
        

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            
            if(!$user->getErrors){
            $image = $this->request->getData('image_file');
            $name = $image->getClientFilename();
            $targetPath = WWW_ROOT.'img'.DS.$name;
            if($name)
                $image->moveTo($targetPath);
            
            $user->userimage = $name;
            }
            
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id)
    {
       /* $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }*/
        
       
        
        $usersTable = TableRegistry::get('Users');
        $user = $usersTable->get($id); 

        $user->isactive = 0;
        $usersTable->save($user);
        
       
        $this->Flash->success(__('The user has been deleted.'));
        
        if($_SESSION['Auth']['User']['isadmin']==0){
            return $this->redirect($this->Auth->logout());
        }
        else
        {
        return $this->redirect(['action' => 'index']);
        }
    }
    
    public function login(){
        if( $this->request->is('post')){
            $user = $this->Auth->identify();
            if($user)
            {
    
                
                $this->Auth->setUser($user);
                if($_SESSION['Auth']['User']['isactive']==0)
                {
                    $usersTable = TableRegistry::get('Users');
                    $user_old = $usersTable->get($_SESSION['Auth']['User']['id']); 

                    $user_old->isactive = 1;
                    $usersTable->save($user_old);
                    
                    $this->Flash->success(__('Account Restored.'));
                    
                }
                if(!empty($_POST["remember_me"]))
                {
                    setcookie("username",$_POST["username"],time()+(1*60*60));
                    setcookie("password",$_POST["password"],time()+(1*60*60));
                }
                else
                {
                 if(isset($_COOKIE["username"])){
                     setcookie("username","");
                 }
                 if(isset($_COOKIE["password"])){
                     setcookie("password","");
                 }
                }
                return $this->redirect($this->Auth->redirectUrl());
            }
            else{
                $this->Flash->error("Incorrect Login");
        
            }
        }
    }
                
               /* if(!empty($_POST["remember"]))
                {
                    setcookie("member_login",$_SESSION['Auth']['User']['username'],time()+(1*60*60));
                    setcookie("member_password",$_SESSION['Auth']['User']['password'],time()+(1*60*60));
                }
                else
                {
                 if(isset($_COOKIE["member_login"])){
                     setcookie("member_login","");
                 }
                 if(isset($_COOKIE["member_password"])){
                     setcookie("member_password","");
                 }
                }*/
                
               
            
    
     
    
    
    public function logout(){
        $this->Flash->success('You are now logged out');
       
        return $this->redirect($this->Auth->logout());
    }
    
    public function register(){
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('You are registered and can login.'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('Cannot register. Please, try again.'));
        }
        $this->set(compact('user'));
        
    }
    
   


    
    public function beforeFilter(\Cake\Event\EventInterface $event){
        $this->Auth->allow(['register']);
       
        
       
       
    }
    
    public function getToken($length){
  $token = "";
  $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
  $codeAlphabet.= "0123456789";
  $max = strlen($codeAlphabet); // edited

  for ($i=0; $i < $length; $i++) {
    $token .= $codeAlphabet[random_int(0, $max-1)];
  }

  return $token;
  }
}
