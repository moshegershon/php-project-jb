<?php  
    require_once 'model.php';
    require_once 'courses-bl.php';
    class coursesModel implements IModel {
        private $id;        
        private $name;  
        private $description;
        private $pic;  
        private $conectionModel_array;

              
        public function __construct($arr,$coursObjectsArray = null) {
            if (!empty($arr['id']))
                $this->id = $arr['id'];
            $this->name = $arr['name']; 
            $this->description = $arr['description'];
            $this->pic = $arr['pic'];
            $this->conectionModel_array = $coursObjectsArray;

        }
        function getId() {
            return $this->id ;
        }
        function getName() {
            return $this->name;
        }
        function getDescription() {
            return $this->description;
        }
        function getPic() {
            return $this->pic;
        }
        function getCoursesByStudentsId() {
            return $this->$coursObjectsArray;
        }   
        
        }
?>