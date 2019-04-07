<?php
class Controller
{
		private $model;
		private $view;
		public function __construct()
		{		
		    $this->model = new Model();
			$this->view = new View(TEMPLATE);	
				
			if(isset($_POST['email']))
			{	
                $name = $this->clean($_POST['name']);
                $email = $this->clean($_POST['email']);
                $subject = $this->clean($_POST['subject']);
                $messege = $this->clean($_POST['messege']);
                $date = date("F j, Y, g:i a");
                $userIpAdress = $_SERVER['REMOTE_ADDR'];
			    $this->model->setName($name);
                $this->model->setEmail($email);
                $this->model->setSubject($subject);
                $this->model->setSelect();
                $this->model->setMessege($messege);
                $this->model->setDate($date);   
                $this->model->setUserIpAdress($userIpAdress);
                $this->pageSendMail();
                var_dump($date);
			}
			else
			{
				$this->pageDefault();	
			}
			
			$this->view->templateRender();			
	    }	
		
		private function pageSendMail()
		{
			if($this->model->checkForm() === true)
			{
                if ($this->model->sendEmail()) 
                {
                    $this->model->setSuccessMail('Your letter has been sent');
                    $this->model->setName('');
                    $this->model->setEmail('');
                    $this->model->setSubject(null);
                    $this->model->setSelect();
                    $this->model->setMessege('');
                }               
			}
			$mArray = $this->model->getArray();		
	        $this->view->addToReplace($mArray);	
		}	
			    
		private function pageDefault()
		{   
		   $mArray = $this->model->getArray();		
	       $this->view->addToReplace($mArray);			   
        }		

        public function clean($value = "") 
        {
            $value = trim($value);
            $value = stripslashes($value);
            $value = strip_tags($value);
            $value = htmlspecialchars($value);
            return $value;
        }	
}