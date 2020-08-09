<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\admin;
use App\usr;
use App\mark;

class homecontroller extends Controller
{
    // admin login
    public function adminlogin(Request $req)
    {
        $u = $req->input('uname');
        $p = $req->input('pass');
        $sql = admin::where('username','=',$u)
                    ->where('password','=',$p)
                    ->get();
        if(count($sql)>0)
        {
            $admin = admin::where('username','=',$u)
                    ->where('password','=',$p)
                    ->value('username');
             Session()->put('username',$admin);
            return redirect('/dadmin');
        }            
        else
        {
            echo"
            <script>
            alert('Error');
            window.location='/Radmin';
            </script>
            ";
        }
    }

    public function alogout()
    {
        Session()->forget('username');
        Session()->flush();
        return redirect('/Radmin');
    }

    public function addqry(Request $req)
    {
        $rno = $req->input('rno');

        $sql = usr::where('rno','=',$rno)->get();
        if(count($sql)>0)
        {
            echo"
            <script>
            alert('present already');
            window.location='addusr';
            </script>
            ";
        }
        else
        {
            $stu=new usr();
            $stu->name=$req->input('name');
            $stu->rno=$req->input('rno');
            $stu->address=$req->input('addr');
            
            
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
}



    public function editmarks($id)
    {
        $res=mark::where('id','=',$id)->get();
        return view('Admin/edit',compact('res'));
    }

    

    

     public function editusrqry(Request $req)
    {
        $sid=$req->input('sid');
        $n=$req->input('name');
        $k=$req->input('rno');
        $a=$req->input('addr');
        

        $update=usr::where('sid','=',$sid)->update(['name'=>$n,'rno'=>$k,'addr'=>$a]);
            if($update==true)
            {
                echo"
            <script>
            alert('updated');
            window.location='/addusr';
            </script>
            ";
            }
            else
            {
                echo"
            <script>
            alert('failed');
            window.location='/addusr';
            </script>
            ";
            }



    }
public function editusr($sid)
    {
        $res=usr::where('sid','=',$sid)->get();
        return view('admin/editusr',compact('res'));
    }

    public function deleteusr($sid)
    {
        $delete=usr::where('sid','=',$sid)->delete();
        if($delete==true)
        {
            echo"
            <script>
            alert('deleted');
            window.location='/addusr';
            </script>
            ";
            }
        else
        {
            echo"
            <script>
            alert('error');
            window.location='/addusr';
            </script>
            ";
            }

    }
    

    public function userlogin(Request $req)
    {
        $n = $req->input('rno');
        //$k = $req->input('key');
        $sql = usr::where('rno','=',$n)
                    //->where('key','=',$k)
                    ->get();
        if(count($sql)>0)
        {
            $user = usr::where('rno','=',$n)
                   // ->where('key','=',$k)
                    ->value('rno');
                    $sid = usr::where('rno','=',$n)
                   // ->where('key','=',$k)
                    ->value('sid');
             Session::put('rno',$user);
             Session::put('sid',$sid);
            return redirect('/marks');
        }            
        else
        {
            echo"
            <script>
            alert('Error');
            window.location='/Uuser';
            </script>
            ";
        }
    }

public function marku($sid)
    {
        $student_id=$sid;
        // $res=mark::where('student_id','=',$sid)->get();
        return view('admin/marku',compact('student_id'));
    }

public function viewmark($sid)
    {
        $student_id=$sid;
        
        return view('admin/viewmark',compact('student_id'));
    }

   
public function addmark(Request $req)
{
        $sid = $req->input('sid');
        $stu=new mark();
        $stu->student_id=$req->input('sid');
        $stu->subject=$req->input('subject');
        $stu->marks=$req->input('marks');
        
        if($stu->save())
        {
            echo"
            <script>
            alert('inserted');
            window.location='/addusr';
            </script>
            ";
        }
        else
        {
            echo"
            <script>
            alert('error');
            window.location='/addusr';
            </script>
            ";
        }
}



}


