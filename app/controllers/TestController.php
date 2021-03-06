<?php
    namespace Controllers;  
    use Lib\Validator;
    use Models\Test;

class TestController {
        public static function create($request) {
            $data = [];
            $data = json_decode($request, true);

            $validator = new Validator();

            $validator->validate($data, [
                'instructions' => ['required'],
                'type_test_id' => ['required', 'numeric'],
                'course_id' => ['required', 'numeric']
            ]);

            if ($validator->error()) {
                return json_encode([
                    'status' => 'error',
                    'errors' => $validator->error()
                ]);
            } else {
                $value = Test::create($data);

                if ($value) {
                    return json_encode([
                        'status' => 'ok',
                        'message' => 'Test creado correctamente'
                    ]);
                } else {
                    return json_encode([
                        'status' => 'error',
                        'message' => 'Hubo un error al crear el test'
                    ]);
                }
            }
        }
     }
?>