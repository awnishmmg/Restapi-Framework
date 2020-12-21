	<?php

	function login_get($columns='',$param=''){
		json_bind([],200,'UNKNOWN METHOD',false);
	}

############# Get Request #################

	function login_post(){

		$password = get_hash(parsejson()['password']);
		$email = parsejson()['email'];

		if(doexist('tbl_user',[
			'email'=>['=',$email],
			'password'=>['=',$password],
			'status'=> ['=','1']
		])):
			// user logined

			$userdata = select('tbl_user',['user_id'],[
				'email'=>['=',$email],
			]);
			if(count($userdata)>0):
				if(update('tbl_user_auth',[

				'is_login'=>'1',

				],['user_id'=>$userdata[0]['user_id']])):
					$data=join2('tbl_user=user_id,name,email,mobile,status|tbl_user_auth=email_verified,otp_verified,auth_key,is_login,login_time','user_id');

					json_bind($data,200,'Login Success',true);
				else:
					json_bind([],200,'User Already Logged In',false);
				endif;
			else:
				
				json_bind([],200,'Login failed',false);

			endif;
		else:

			json_bind([],200,'Login failed',false);

		endif;

	}
	


