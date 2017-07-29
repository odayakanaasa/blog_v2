<?php
/**
* Chat Module
*/
// More infomation at the end of the text
namespace app\yth\api;
use think\Request;
use think\Db;
use Mine\Filter;
Class Chat{
	private $expire    = 1440 	; // one second per unit , set default as default-session-expire-time
	private $select_db = 2  	; // Redis database , set default as 2

	/**
	* Parse_data When Event =='send'
	* @param POST  : event, role, c_id, s_id, [token]?
	* @echo String : {$fd}
	*/
	public function parse_data(){
		$p = Request::instance()->post();
		@Filter::is_set([
			$p['event'],
			$p['role'],
			$p['c_id'],
			$p['s_id']
		]);
		$event = &$p['event'];
		$role  = &$p['role'];
		$c_id  = &$p['c_id'];
		$s_id  = &$p['s_id'];
		$r = \Mine\yth_Redis::instance($this->select_db);
		// Event?
			// role?
		switch ($event) {
			case 'send':
				if('customer'==$role){
					// Find staff's {$fd}
					exit(  $r->Get('chat_staff:fd:s_id:'.$s_id)  );
				}else{
					@Filter::is_set([
						$p['token']
					]);
					$token = &$p['token'];
					// Auth check
					if(  $token == $r->Get('chat_staff:token:s_id:'.$s_id)  ){
					// Find customer's {$fd}
						exit(   $r->Get('chat_customer:c_id:'.$c_id)  );
					}else{
						exit('{"Err":1002}');
					}
				}
			default:
				exit('{"Err":1004}');
		}
	}

	/**
	* Refresh Key-Value for verification Through 
	* @param POST  : fd,s_id,token
	* @echo String : 
	*/
	public function init_staff(){
		node_check('api/'. @array_pop( explode('\\', __CLASS__) ) .'/'.__FUNCTION__);
		$p = Request::instance()->post();
		@Filter::is_set([
			$p['fd'],
			$p['s_id'],
			$p['token']
		]);
		$fd   = &$p['fd'];
		$s_id = &$p['s_id'];
		$token= &$p['token'];
		$_res = Db::query('
			Select `name` ,`pic`
			From `hlz_staff`
			Where `staff_id`=?
		',[ $s_id ]);
		$info =  base64_encode(  json_encode($_res[0])  )  ;
		$r = \Mine\yth_Redis::instance($this->select_db);
		// Get old data And then flush them out
		$r->pipeline()
			->Delete('chat_staff:fd:'.$fd)
			->Delete('chat_staff:fd:s_id:'.$s_id)
			->Delete('chat_staff:token:s_id:'.$s_id)
			->Delete('chat_staff:info:s_id:'.$s_id)
			->Exec();
		// Set new expire data
		$r->pipeline()
			->Set(	 'chat_staff:fd:'.$fd, 	$s_id 	)
			->Expire('chat_staff:fd:'.$fd, 	$this->expire)
			->Set(	 'chat_staff:fd:s_id:'.$s_id, 	$fd 	)
			->Expire('chat_staff:fd:s_id:'.$s_id, 	$this->expire)
			->Set(	 'chat_staff:token:s_id:'.$s_id,	$token 	)
			->Expire('chat_staff:token:s_id:'.$s_id,	$this->expire)
			->Set(	 'chat_staff:info:s_id:'.$s_id,	$info 	)
			->Expire('chat_staff:info:s_id:'.$s_id,	$this->expire)
			->Exec();
	}

	/**
	* Refresh Key-Value for verification
	* @param POST  : fd,c_id
	* @echo String : 
	*/
	public function init_customer(){
		$p = Request::instance()->post();
		@Filter::is_set([
			$p['fd'],
			$p['c_id']
		]);
		$fd   = &$p['fd'];
		$c_id = &$p['c_id'];
		$r = \Mine\yth_Redis::instance($this->select_db);
		// Set new expire data
		$r->pipeline()
			->Set(	 'chat_customer:c_id:'.$c_id, $fd )
			->Expire('chat_customer:c_id:'.$c_id, $this->expire )
			->Set(	 'chat_customer:fd:'.$fd, $c_id )
			->Expire('chat_customer:fd:'.$fd, $this->expire )
			->Exec();
	}

	/**
	* Parse_data When WebSocket_Event =='onopen'
	* @param POST  : null
	* @echo String : {"info":[]}
	*/
	public function get_chat_staff_list(){
		// Chat Staff
		$r = \Mine\yth_Redis::instance($this->select_db);
		$list_s_id = $r->keys('chat_staff:fd:s_id:*');
		foreach ($list_s_id as $k => $v) {
			$s_id = explode('chat_staff:fd:s_id:', $v)[1];
			$arr = json_decode( base64_decode($r->Get('chat_staff:info:s_id:'.$s_id)) ,true);
			$info['name'] = $arr["name"];
			$info['pic'] = $arr["pic"];
			$info['s_id'] = $s_id;
			$list[] = $info;
		}
		$msg['info'] = isset( $list ) ? $list : [];
		trans_json( $msg );
	}

	/**
	* Parse_data When WebSocket_Event =='onclose'
	* @param POST  : fd
	* @echo String : {"info":[]}
	*/
	public function remvoe_from_chat_list(){
		$p = Request::instance()->post();
		@Filter::is_set([
			$p['fd']
		]);
		$fd   = &$p['fd'];
		// Remove this person From list 
		$r = \Mine\yth_Redis::instance($this->select_db);
		// Staff?
		if( $r->Exists('chat_staff:fd:'.$fd) ){
			$s_id = $r->Get( 'chat_staff:fd:'.$fd );
			$r->pipeline()
				->Delete('chat_staff:fd:'.$fd )
				->Delete('chat_staff:fd:s_id:'.$s_id)
				->Delete('chat_staff:token:s_id:'.$s_id)
				->Delete('chat_staff:info:s_id:'.$s_id)
				->Exec();
		}else{
		// Customer
			$c_id = $r->Get( 'chat_customer:fd:'.$fd );
			$r->pipeline()
				->Delete('chat_customer:c_id:'.$c_id )
				->Delete('chat_customer:fd:'.$fd)
				->Exec();
		}
	}


}

/* Meaning of Params
event 	=> send | receive | init
role 	=> Who did this action
c_id 	=> Customer ID
s_id 	=> Staff ID
text 	=> What he wants to say. [Only staff's text can use editor to uploads some pics ]
token 	=> If 'role' is equals to 'staff' ,it needs 'token' to verify his identification

Customer  ->  Server
{
	"event"	:	"send",
	"role"	:	"customer",
	"c_id"	: 	{$customer_cookie_id},
	"s_id"	: 	{$staff_id},
	"text"	:	{$text}
}
Server -> Staff
{
	"event"	:	"receive",
	"c_id"	: 	{$customer_cookie_id},
	"text"	:	{$text}
}

Staff  ->  Server
{
	"event"	:	"send",
	"role"	:	"staff",
	"c_id"	: 	{$customer_cookie_id},
	"s_id"	: 	{$staff_id},
	"text"	:	{$text},
	"token" :   {$token}
}
Server -> Customer
{
	"event"	:	"receive",
	"s_id"	: 	{$staff_id},
	"text"	:	{$text}
}

Inint step 1  => Get fd By sending a message '{"event":"init"}' When Websocket Event "onopen"  
{
	"event"	:	"init",
	"fd"	:	{$fd}
}


So does Staff...


Key => Value Design   [Expire 20min]

chat_staff:fd:{$fd} 		{$token)}   // Once staff reloaded his page It would reload his {$fd}
chat_staff:token:{$token} 	{$fd} 		// The {$token} is a rand  value which consisit of 10 length It would be creat when staff reloaded his page
chat_staff:s_id:{$s_id} 	{$fd} 		// This is to tell others ,he is online

chat_customer:c_id:{$c_id} 	{$fd}

*/