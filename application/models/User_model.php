<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    /**
     * The name of the table that will be used.
     * 
     * @var string
     */
    protected string $table = 'users';

    /**
     * Fields of users table that will be filled.
     * 
     * @var array
     */
    protected array $fillable = [
        'full_name',
        'username',
        'email',
        'password'
    ];

    /**
     * Activate user or account by set 'is_active' to 1.
     * 
     * @param string $email
     * 
     * @return bool
     */
    public function activate(string $email): bool
    {
        return $this->db
            ->set('is_active', 1)
            ->where('email', $email)
            ->update($this->table);
    }

    /**
     * Deactivate user or account by set 'is_active' to 0.
     * 
     * @param string $email
     * 
     * @return bool
     */
    public function deactivate(string $email): bool
    {
        return $this->db
            ->set('is_active', 0)
            ->where('email', $email)
            ->update($this->table);
    }

    /**
     * Attempt to find user by username or email.
     * 
     * @param string $username
     * 
     * @return stdClass|null
     */
    public function getAttemptUser(string $username): ?stdClass
    {
        return $this->db
            ->where('username', $username)
            ->or_where('email', $username)
            ->get($this->table)
            ->row();
    }

    /**
     * Return fillable fields of users table.
     * 
     * @return array
     */
    public function getFillable(): array
    {
        return $this->fillable;
    }

    /**
     * Get single user by column name and it's value.
     * 
     * @param string $columnName
     * @param string $value
     * 
     * @return stdClass|null
     */
    public function getSingleUser(string $columnName, string $value): ?stdClass
    {
        return $this->db->get_where($this->table, [$columnName => $value])->row();
    }

    /**
     * Reset password of user that has provided email.
     * 
     * @param stdClass $user
     * @param string $password_hash
     * 
     * @return bool
     */
    public function resetPassword(stdClass $user, string $password_hash): bool
    {
        $user = $this->getSingleUser('email', $user->email);
        if (!$user) {
            return false;
        }

        return $this->db->update(
            $this->table,
            ['password' => $password_hash],
            ['email' => $user->email]
        );
    }

    /**
     * Store new user in database.
     * 
     * @param array $data
     * 
     * @return bool
     */
    public function store(array $data): bool
    {
        return $this->db->insert($this->table, $data);
    }

    /**
     * Update user information.
     * 
     * @param array $data
     * 
     * @return bool
     */
    public function update(array $data): bool
    {
        return $this->db
            ->set('full_name', $data['full_name'])
            ->set('username', $data['username'])
            ->set('email', $data['email'])
            ->where('id', auth()->id)
            ->update($this->table);
    }

    /**
     * Update user email.
     * 
     * @param string $email
     * 
     * @return bool
     */
    public function updateEmail(string $email): bool
    {
        return $this->db
            ->set('email', $email)
            ->where('id', auth()->id)
            ->update($this->table);
    }

    /**
     * Update user password.
     * 
     * @param string $password
     * 
     * @return bool
     */
    public function updatePassword(string $password): bool
    {
        return $this->db
            ->set('password', password_hash($password, PASSWORD_DEFAULT))
            ->where('email', auth()->email)
            ->update($this->table);
    }

    // public function validatePassword(string $password): bool
    // {
    //     return password_verify($password, auth()->password);
    // }
}
