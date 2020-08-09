<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\admin;
use App\usr;

class admincontroller extends Controller
{
    
    public function adminlogin(Request $req)
    {
    	$username=$req->input('username');
    	$password=$req->input('password');
		$sql=admin::where ('username','=',$username) 
		           ->where ('password','=',$password )  
		           ->get();
		           if(count($sql)>0)
		           {
		           	return view('admin/dashboard');
		           }
		           else
		           {
		           	echo "
		           	<script>
		           	alert('failed');
		           	window.location='/Radmin';
		           	</script>


		           	";

		           }



		       }
		       
    
    	public function addqry(Request $req)
    {
    	$stu=new usr();
    	$stu->name=$req->input('name');
    	$stu->key=$req->input('key');
    	
    	if($stu->save())
    	{
    		echo"
    		<script>
    		alert('inserted');
    		window.location='addusr';
    		</script>
    		";
    	}

    
}

public function userlogin(Request $req)
    {
    	$name=$req->input('name');
    	$key=$req->input('key');
		$sql=usr::where ('name','=',$name) 
		           ->where ('key','=',$key)  
		           ->get();
		           if(count($sql)>0)
		           {
		           	return view('user/marks');
		           }
		           else
		           {
		           	echo "
		           	<script>
		           	alert('failed');
		           	window.location='/Uuser';
		           	</script>


		           	";

		           }
}


