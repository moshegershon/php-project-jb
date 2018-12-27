<?php  
    require_once 'model.php';
    require_once 'user-bl.php';
    class usersModel implements IModel {
        private $id;        
        private $name;  
        private $password;  
        private $pic; 
        private $prmition_level;     
        
        public function __construct($arr) {
            if (!empty($arr['id']))
                $this->id = $arr['id'];
                $this->name = $arr['name'];
                $this->password = $arr['password'];
            if (!empty($arr['pic'])) 
                $this->pic = $arr['pic'];
            if (!empty($arr['prmition_level'])) 
                $this->prmition_level = $arr['prmition_level'];
        }
        function getId() {
            return $this->id ;
        }
        function getName() {
            return $this->name;
        }
        function getPassword() {
            return $this->password;
        }
        function getPic() {
            return $this->pic;
        }
        function getPrmitionLevel() {
            return $this->prmition_level;
        }
        }
?>