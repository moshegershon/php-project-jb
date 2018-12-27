<?php
    require_once 'bl.php';
    require_once "user-model.php";
    class BusinessLogicusers extends BusinessLogic {
        public function get()
        {
            $q = 'SELECT * FROM `users`';
            
            $results = $this->dal->select($q);
            $resultsArray = [];
    
            while ($row = $results->fetch()) {
                array_push($resultsArray, new usersModel($row));
            }
    
            return $resultsArray;
        }
        public function set($f) {
            $query = "INSERT INTO users (`name`, `password`,`pic`,`prmition_level`) VALUES (:a, :b, :c, :d)";
            $params = array(
                "a" => $f->getName(),
                "b" => $f->getPassword(),
                "c" => $f->getPic(),
                "d" => $f->getPrmitionLevel()
            );
            $this->dal->insert($query, $params);
        }
        public function isin($u) {
            $q = "SELECT * FROM users WHERE `name` like ? AND `password` like ?" ;
            
            $results = $this->dal->select($q, [

                $u->getName(),
                $u->getPassword()
            ]);
            $row = $results->fetch();
            $r = new usersModel($row);
            return $r;
        }
        public function getOne($id)
        {
            $q = 'SELECT * FROM `users` WHERE id=?';
        
            $results = $this->dal->select($q, [
                 $id
            ]);
            $row = $results->fetch();
            return new usersModel($row);
        }
        public function delete($id) {
            $query = "DELETE FROM users WHERE id =?";
            $params = array(
                 $id
            );
            $this->dal->delete($query, $params);
        }
        public function update($f) {
            $query = "UPDATE `users` SET `name`=?, `password`=?, `pic`=?,`prmition_level`=? WHERE `id` =?";
            $params = array(
                $f->getName(),
                $f->getpassword(),
                $f->getPic(),
                $f->getPrmitionLevel(),
                $f->getId()
            );
            $this->dal->update($query, $params);
        }
    }   
    
?>
    
