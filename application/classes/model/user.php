<?php
class Model_User extends Model {
 
    public function register($array)
    {
        // Create a new user record in the database
        $id = DB::insert(array_keys($array))
            ->values($array)
            ->execute();
 
        // Save the new user id to a cookie
        cookie::set('user', $id);
 
        return $id;
    }
 
}
?>
