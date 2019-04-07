<?php 
class Model
{ 
    private $name;
    private $email;
    private $subject;
    private $userIPAdress;
    private $selected;
    private $selected1;
    private $selected2;
    private $selected3;
    private $messege;
    private $successMail;
    private $nameError;
    private $mailError;
    private $subjectError;
    private $messegeError;
    private $date;
    
   public function __construct()
   {

     }
   	
	public function getArray()
   {	    
        return array('%TITLE%'=>'Contact Form', 
                    '%NAMEERROR%'=>$this->nameError,
                    '%MAILERROR%'=>$this->mailError,
                    '%SUBJECTERROR%'=>$this->subjectError,
                    '%MESSEGEERROR%'=>$this->messageError,
                    '%NAME%'=>$this->name,
                    '%EMAIL%'=>$this->email,
                    '%SELECTED%'=>$this->selected,
                    '%SELECTED1%'=>$this->selected1,
                    '%SELECTED2%'=>$this->selected2,
                    '%SELECTED3%'=>$this->selected3,
                    '%MESSEGE%'=>$this->messege,
                    '%SUCCESMAIL%'=>$this->successMail,
                    '%SUBJECT%'=>$this->subject,
                    );	
   }
	
	public function checkForm()
	{
        $name = $this->name;
        $email = $this->email;
        $subject = $this->subject;
        $messege = $this->messege;
        
        if ($name == '') {
            $this->nameError = 'Name is empty';
        }
        elseif (strlen($name) < 2 || strlen($name) > 20)
        {
            $this->nameError = 'Name is too short or too long (must be 2-20 symbols)';
        }
        elseif(!preg_match('/^[a-zA-Zа-яА-Я]+$/ui', $name))
		{
			$this->nameError = 'Name is incorrect';
        }
        if ($email == '') {
            $this->mailError = 'Email is empty';
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$this->mailError = 'Email is incorrect';
		}
        if ($subject == '') {
            $this->subjectError = 'Subject is empty';
        }
        if($messege == '')
		{
			$this->messegeError = 'Message is empty';
        }
        elseif(strlen($messege) < 2 || strlen($message) > 900)
		{
			$this->messegeError = 'This message is too short or too long (must be 2-20 symbols)';
        }
        if($this->nameError == '' && $this->mailError == '' && $this->subjectError == '' && $this->messegeError == '')
		{
			return true;
		}
		return false;
	}
   
	public function sendEmail()
	{
        $adress = EMAIL;
        $subject = $this->subject;
        $messege = $this->messege."\r\n";        
        $messege .= "UserIP: ".$this->userIpAdress."\r\n";
        $headers = "From: ".$this->email;
        return mail($adress, $subject, $messege, $headers);
        
    }
    
    public function setName($name) 
    {
        $this->name = $name;
    }

    public function setEmail($email) 
    {
        $this->email = $email;
    }

    public function setSubject($subject) 
    {
        $this->subject = $subject;
    }

    public function setSelect()
    {
        switch($this->subject) 
        {
            case Subject1:
                $this->selected1 = 'selected';
                break;
            case Subject2:
                $this->selected2 = 'selected';
                break;
            case Subject3:
                $this->selected3 = 'selected';
                break;
            default:
                $this->selected = 'selected';
                $this->selected1 = '';
                $this->selected2 = '';
                $this->selected3 = '';
        }
    
    }

    public function setDate($date)
    {
        $this->date = $date;
    }    

    public function setMessege($messege)
	{
        $this->messege = $messege;	
    }
    
    public function setSuccessMail($text)
	{
        $this->successMail = $text;	
    }
    
    public function setUserIpAdress($userIpAdress)
	{
		$this->userIpAdress = $userIpAdress;			
	}
}