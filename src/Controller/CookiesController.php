<?php
   namespace App\Controller;
   use App\Controller\AppController;
   use Cake\Http\Cookie\Cookie;
   use Cake\Http\Cookie\CookieCollection;
   class CookiesController extends AppController{
      public $cookies;
      public function testCookies() {
         $cookie = new Cookie('name','XYZ');
         $this->cookies = new CookieCollection([$cookie]);
         $cookie_val = $this->cookies->get('name');
         $this->set('cookie_val',$cookie_val->getValue());
         $isPresent = $this->cookies->has('name');
         $this->set('isPresent',$isPresent);
         $this->set('count', $this->cookies->count());
         $test = $this->cookies->remove('name');
         $this->set('count_afterdelete', $test->count());
      }
   }
?>