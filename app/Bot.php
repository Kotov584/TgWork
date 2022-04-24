<?php
     class Bot {

      public $token;
      public $chatId;
      public $messageId;

       public function __construct ($token) 
       { 
		      set_time_limit(0); 
          ini_set('max_execution_time', 0);
          $this->token = $token;
       }

       public function request($method, $datas = []) 
       {
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, 'https://api.telegram.org/bot'.$this->token.'/'.$method);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
          $res = curl_exec($ch);
          curl_close($ch);
          return json_decode($res, 1);
          unset($ch,$method,$datas,$res);
       }
       
       public function sendMessage ($text) 
       {
          $this->request('sendMessage', ['chat_id' => $this->chatId, 'text' => $text ]);
       }
       
       public function editMessage ($newMessage) 
       {
          $this->request('editMessage', ['chat_id' => $this->chatId, 'message_id' => $this->messageId, 'text' => $newMessage ]);
       }
       
       public function onText ($text, $callFunction) 
       {
         //
       }
       
       public function onCallbackQuery () 
       {
         //
       }
       
       public function createStep () 
       {
         //
       }
       
       public function firstStep () 
       {
         //
       }
       
       public function nextStep () 
       {
         //
       }
       
       public function previousStep () 
       {
         //
       }
       
       public function lastStep () 
       {
         //
       }
     }