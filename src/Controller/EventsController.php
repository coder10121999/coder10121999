<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

class EventsController extends AppController{
    
    public function delete($id){
        
        $this->Event->id = $id;
        $this->Event->saveField('isactive', 0);
        $this->Flash->success(__('The user has been deleted.'));
        

        return $this->redirect(['action' => 'login']);
    }
}