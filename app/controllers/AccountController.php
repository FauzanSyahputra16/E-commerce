<?php 
/**
 * Account Page Controller
 * @category  Controller
 */
class AccountController extends SecureController{
	function __construct(){
		parent::__construct(); 
		$this->tablename = "users";
	}
	/**
		* Index Action
		* @return null
		*/
	function index(){
		$db = $this->GetModel();
		$rec_id = $this->rec_id = USER_ID; //get current user id from session
		$db->where ("id", $rec_id);
		$tablename = $this->tablename;
		$fields = array("id", 
			"role_id", 
			"first_name", 
			"last_name", 
			"username", 
			"phone", 
			"email", 
			"address", 
			"email_verified_at", 
			"creator", 
			"slug", 
			"status", 
			"remember_token", 
			"created_at", 
			"updated_at");
		$user = $db->getOne($tablename , $fields);
		if(!empty($user)){
			$page_title = $this->view->page_title = "My Account";
			$this->render_view("account/view.php", $user);
		}
		else{
			$this->set_page_error();
			$this->render_view("account/view.php");
		}
	}
	/**
     * Update user account record with formdata
	 * @param $formdata array() from $_POST
     * @return array
     */
	function edit($formdata = null){
		$request = $this->request;
		$db = $this->GetModel();
		$rec_id = $this->rec_id = USER_ID;
		$tablename = $this->tablename;
		 //editable fields
		$fields = $this->fields = array("id","role_id","first_name","last_name","username","photo","phone","address","email_verified_at","creator","slug","status","remember_token","created_at","updated_at");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'role_id' => 'required|numeric',
				'first_name' => 'required',
				'last_name' => 'required',
				'username' => 'required',
				'photo' => 'required',
				'phone' => 'required',
				'address' => 'required',
				'email_verified_at' => 'required|valid_email',
				'creator' => 'required',
				'slug' => 'required',
				'status' => 'required|numeric',
				'remember_token' => 'required',
				'created_at' => 'required',
				'updated_at' => 'required',
			);
			$this->sanitize_array = array(
				'role_id' => 'sanitize_string',
				'first_name' => 'sanitize_string',
				'last_name' => 'sanitize_string',
				'username' => 'sanitize_string',
				'photo' => 'sanitize_string',
				'phone' => 'sanitize_string',
				'address' => 'sanitize_string',
				'email_verified_at' => 'sanitize_string',
				'creator' => 'sanitize_string',
				'slug' => 'sanitize_string',
				'status' => 'sanitize_string',
				'remember_token' => 'sanitize_string',
				'created_at' => 'sanitize_string',
				'updated_at' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			//Check if Duplicate Record Already Exit In The Database
			if(isset($modeldata['username'])){
				$db->where("username", $modeldata['username'])->where("id", $rec_id, "!=");
				if($db->has($tablename)){
					$this->view->page_error[] = $modeldata['username']." Already exist!";
				}
			} 
			if($this->validated()){
				$db->where("users.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					$db->where ("id", $rec_id);
					$user = $db->getOne($tablename , "*");
					set_session("user_data", $user);// update session with new user data
					return $this->redirect("account");
				}
				else{
					if($db->getLastError()){
						$this->set_page_error();
					}
					elseif(!$numRows){
						//not an error, but no record was updated
						$this->set_flash_msg("No record updated", "warning");
						return	$this->redirect("account");
					}
				}
			}
		}
		$db->where("users.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "My Account";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("account/edit.php", $data);
	}
	/**
     * Change account email
     * @return BaseView
     */
	function change_email($formdata = null){
		if($formdata){
			$email = trim($formdata['email']);
			$db = $this->GetModel();
			$rec_id = $this->rec_id = USER_ID; //get current user id from session
			$tablename = $this->tablename;
			$db->where ("id", $rec_id);
			$result = $db->update($tablename, array('email' => $email ));
			if($result){
				$this->set_flash_msg("Email address changed successfully", "success");
				$this->redirect("account");
			}
			else{
				$this->set_page_error("Email not changed");
			}
		}
		return $this->render_view("account/change_email.php");
	}
}
