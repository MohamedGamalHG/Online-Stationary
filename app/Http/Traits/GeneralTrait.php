<?php


namespace App\Http\Traits;


trait GeneralTrait
{
    public function returnSuccess($errNum,$msg = '')
    {
        return response()->json([
            'status'        => true,
            'errNum'        => $errNum,
            'msg'           => $msg
        ]);
    }
    public function returnError($errNum,$msg = '')
    {
        return response()->json([
            'status'        => false,
            'errNum'        => $errNum,
            'msg'           => $msg
        ]);
    }
    public function returnData($key,$value,$msg = '')
    {
        return response()->json([
            'status'        => true,
            'msg'           => $msg,
            $key            => $value
        ]);
    }
    public function returnValidationError($code,$validator)
    {
        //return $validator->errors()->first();
        return $this->returnError($code,$validator->errors()->first());
    }
    public function returnCodeAccordingToInput($validator)
    {
        $inputs = array_keys($validator->errors()->toArray());
        $code = $this->getErrorCode($inputs[0]);
        return $code;
    }
    private function getErrorCode($input)
    {
        if($input == "name")
            return "Error ". $input;
        else if($input == "password")
            return "Error ". $input;
        else if($input == "email")
            return "Error ". $input;
        else
            return "";
    }
}
