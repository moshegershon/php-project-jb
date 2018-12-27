<?php
    require_once 'bl.php';
    require_once "students-model.php";
    class BusinessLogicstudents extends BusinessLogic {
        public function get()
        {
            $q = 'SELECT * FROM `students`';
            
            $results = $this->dal->select($q);
            $resultsArray = [];
    
            while ($row = $results->fetch()) {
                array_push($resultsArray, new studentsModel($row ));            }
    
            return $resultsArray;
        }
        public function set($f) {
            $query = "INSERT INTO students (`name`, `lastname`,`email`,`phonenum`,`pic`) VALUES (:a, :b, :c, :d,:e)";
            $params = array(
                "a" => $f->getName(),
                "b" => $f->getLastname(),
                "c" => $f->getEmail(),
                "d" => $f->getPhonenum(),
                "e" => $f->getPic()

            );
            return $this->dal->insert($query, $params);
        }
        public function setAfterUpdate($f,$id) {
            $query = "INSERT INTO students (`id``name`, `lastname`,`email`,`phonenum`,`pic`) VALUES (:id,:a, :b, :c, :d,:e)";
            $params = array(
                "id" => $id,
                "a" => $f->getName(),
                "b" => $f->getLastname(),
                "c" => $f->getEmail(),
                "d" => $f->getPhonenum(),
                "e" => $f->getPic()

            );
            return $this->dal->insert($query, $params);
        }


        public function setWithCourses($sid,$cid) {
            $query = "INSERT INTO `conection`(`student_id`, `course_id`) VALUES (?, ?)";
            $params = array(
                $sid,
                $cid
        
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
            $q = 'SELECT * FROM `students` WHERE id=?';
            
            $results = $this->dal->select($q, [
                 $id
            ]);
            $row = $results->fetch();
            return new studentsModel($row);
        }
        public function getCoursWithStudent($cid)
        {
            $student_query = 'SELECT * FROM `conection` WHERE `course_id` = ?';
            $studentArray = $this->dal->select($student_query, [
                $cid
            ]);
            $studentObjectsArray = [];
            while ($studentRow = $studentArray->fetch()) {
                array_push($studentObjectsArray, $this->getOne($studentRow['student_id']));
            }
            return $studentObjectsArray;
        }

        public function delete($id) {
            $query = "DELETE FROM students WHERE id =?";
            $params = array(
                 $id
            );
            $this->dal->delete($query, $params);
        }

        public function deleteFormConection($id) {
            $query = "DELETE FROM conection WHERE student_id =?";
            $params = array(
                 $id
            );
            $this->dal->delete($query, $params);
        }

        public function update($f) {
            $query = "UPDATE `students` SET `name`=?,`lastname`=?,`email`=?,`phonenum`=?,`pic`=? WHERE `id`=?";
            $params = array(
                $f->getName(),
                $f->getLastname(),
                $f->getEmail(),
                $f->getPhonenum(),
                $f->getPic(),
                $f->getId()
            );
            $this->dal->update($query, $params);
        }

        public function count() {
            $q = "SELECT count(*) FROM `students`";
            return $this->dal->selectCount($q);
        }
    }
?>
    
