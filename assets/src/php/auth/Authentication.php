<?php
interface Authentication {
    /**
     * Logs in a user by veriying their email and password.
     * 
     * This function checks if a user with the given email exist,
     * and if the password matches the stored password.
     * If the credentials are valid, it start a session for a user.
     * 
     * @param string $user_email The email address for user.
     * @param string $password  The password endered by for user.
     * @return bool Return true if the login is sucessful, false otherwise.
     */
    public function login(string $email, string $password): bool;

    public function check(string $email): mixed;

    public function signup(string $email, string $password): bool;
}