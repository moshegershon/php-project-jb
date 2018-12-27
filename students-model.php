<?php  
    require_once 'model.php';
    require_once 'user-bl.php';
    class studentsModel implements IModel {
        private $id;        
        private $name;  
        private $lastname; 
        private $email; 
        private $phonenum; 
        private $pic;     
        
        public function __construct($arr ,$coursObjectsArray=null) {
            if (!empty($arr['id']))
                $this->id = $arr['id'];
            $this->name = $arr['name']; 
            $this->lastname = $arr['lastname'];
            $this->email = $arr['email'];
            $this->phonenum = $arr['phonenum'];
            $this->pic = $arr['pic'];

        }
        function getId() {
            return $this->id ;
        }
        function getName() {
            return $this->name;
        }
        function getLastname() {
            return $this->lastname;
        }
        function getEmail() {
            return $this->email;
        }
        function getPhonenum() {
            return $this->phonenum;
        }
        function getPic() {
            return $this->pic;
        }
            
        }
?>