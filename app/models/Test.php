<?php   
    namespace Models;

    use Database\DB;

    class Test {    
        public static function create($attributes=[]) {
            if (sizeof($attributes) > 0) {
                $db = DB::get_database();
                $smt = $db->prepare("INSERT INTO tests (instructions, type_test_id, course_id) VALUES (:instructions, :type_test_id, :course_id)");

                if ($smt->execute(array(
                    ':instructions' => $attributes['instructions'],
                    ':type_test_id' => $attributes['type_test_id'],
                    ':course_id' => $attributes['course_id']
                ))) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
?>