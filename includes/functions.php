<?php
define('BASEPATH', TRUE);
/*
|----------------------------------------------------------------------------------
| INITIALIZE DYNAMIC URL
|----------------------------------------------------------------------------------
|
*/

class Dynamic_URL {
	public function site_url( $inner_url = '' )  {
		$url  = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
		$url .= $_SERVER['SERVER_NAME'];
		$url .= htmlspecialchars($_SERVER['PHP_SELF']);
		$themeurl = dirname(dirname($url))  . "/capgem/" . $inner_url;

		return $themeurl;
	}
}

$url = new Dynamic_URL;
/*
|----------------------------------------------------------------------------------
| PAGE TITLE
|----------------------------------------------------------------------------------
|
*/
class Page_Title {
	public function page_title() {
		if($p = 'home') {
			return 'Home - Capgem';
		}
		else if($p = 'profile') {
			return 'Profile - Capgem';
		}
		else if($p = 'members') {
			return 'Members - Capgem';
		}
		else if($p = 'employees') {
			return 'Employees - Capgem';
		}
		else if($p = 'calendar') {
			return 'Calendar - Capgem';
		}
		else if($p = 'reports') {
			return 'Reports - Capgem';
		}
		else if($p = 'contacts') {
			return 'Contacts - Capgem';
		}
	}
}
$title = new Page_Title();


/*
 * Capgem Class
 * */
class Capgem {

	public $obj;

    public function login($username, $password){
        $this->obj = new Database("localhost","root","","capgem");

        $col = ['user_id','access'];
        $con = array('username' => $username, 'password'=> $password);

        $result = $this->obj->select("tbl_user", $col, $con);

        if(!empty($result)){
            foreach($result[0] as $key => $value):
                $_SESSION[$key] = $value;
            endforeach;
        }else{
            $_SESSION['error'] = 'User not Found!';
        }
        header('Location: index.php');
    }

    public function logout(){
        session_destroy();

        header('Location: index.php');
    }
}

$capgem = new Capgem();
?>