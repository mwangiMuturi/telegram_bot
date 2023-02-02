<?php 
$update = json_decode(file_get_contents("php://input"), TRUE); $chatId = $update["message"]["chat"]["id"]; 
$userName = $update["message"]["chat"]["first_name"]; 
$message = $update["message"]["text"];  
$token = "5940936471:AAGq7FCU_5axKFkxv396DFzEooMk7CHL3-k";
if(strpos($message, "joke") !== false || strpos($message, "Joke") !== false) 
{ 
  $url = 'https://icanhazdadjoke.com/'; 
  $ch = curl_init(); 
  curl_setopt($ch, CURLOPT_URL, $url); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
  curl_setopt($ch, CURLOPT_USERAGENT, 'TellMeAJokeBot/1.0 (http://www.mysite.com/)'); 
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json")); 
  $result = curl_exec($ch); 
  $joke = json_decode($result, TRUE)["joke"];                $tg_api='https://api.telegram.org/bot'.$token.'/sendMessage?chat_id='.$chatId.'&text='.$joke."😂"; 
  file_get_contents($tg_api);  
} 
else 
{ 
  $help = "Hi ".$userName."! I have infinite jokes with me 😎 Type \"𝙏𝙚𝙡𝙡 𝙢𝙚 𝙖 𝙟𝙤𝙠𝙚\" or just type \"𝙅𝙤𝙠𝙚\", and i'll send you a random joke 😂";   $tg_api='https://api.telegram.org/bot'.$token.'/sendMessage?chat_id='.$chatId.'&text='.$help; file_get_contents($tg_api); 
} 
?>