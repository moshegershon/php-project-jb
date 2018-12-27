<?php
    require_once 'bl.php';
    require_once "courses-model.php";
    class BusinessLogiccourses extends BusinessLogic {
        public function get()
        {
            $q = 'SELECT * FROM `courses`';
            
            $results = $this->dal->select($q);
            $resultsArray = [];
    
            while ($row = $results->fetch()) {
                array_push($resultsArray, new coursesModel($row ,$this->getStudentWithCours($row['id'])));
            }
    
            return $resultsArray;
        }
        public function set($f) {
            $query = "INSERT INTO courses (`name`, `description`,`pic`) VALUES (:a, :b, :c)";
            $params = array(
                "a" => $f->getName(),
                "b" => $f->getDescription(),
                "c" => $f->getPic()
            );
            $this->dal->insert($query, $params);
        }
        public function isin($u) {

            $q = "SELECT * FROM `users` WHERE `name` = ? AND `password` = ?";
            
            $results = $this->dal->select($q, [
                $u->getUsername(),
                $u->getpassword()
            ]);
            $row = $results->fetch();
            $r = new indexModel($row);
            return $r;
        }
        public function getOne($id)
        {
            $q = 'SELECT * FROM `courses` WHERE id=?';
            
            $results = $this->dal->select($q, [
                 $id
            ]);
            $row = $results->fetch();
            return new coursesModel($row);
        }
        public function getStudentWithCours($sid)
        {
            $cours_query = 'SELECT * FROM `conection` WHERE `student_id` = ?';
            $coursArray = $this->dal->select($cours_query, [
                $sid
            ]);
            $coursObjectsArray = [];
            while ($coursRow = $coursArray->fetch()) {
                array_push($coursObjectsArray, $this->getOne($coursRow['course_id']));
            }
            return $coursObjectsArray;
        }
        public function update($f) {
            $query = "UPDATE `courses` SET `name`=?,`description`=?,`pic`=? WHERE `id`=?";
            $params = array(
                $f->getName(),
                $f->getDescription(),
                $f->getPic(),
                $f->getId()
            );
            $this->dal->update($query, $params);
        }
        public function delete($id) {
            $query = "DELETE FROM courses WHERE id =?";
            $params = array(
                 $id
            );
            $this->dal->delete($query, $params);
        }

        public function count() {
            $q = "SELECT count(*) FROM `courses`";
            return $this->dal->selectCount($q);
        }
        
    }
?>
    
