<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AccessToken_model extends CI_Model
{
    /**
     * The name of the table that will be used.
     * 
     * @var string
     */
    protected string $table = 'access_tokens';

    /**
     * Fields of access_tokens table that will be filled.
     * 
     * @var array
     */
    protected array $fillable = [
        'email',
        'token',
        'expiration_date'
    ];

    /**
     * Generate a new token for the given email, then store to database.
     * 
     * @param string $email
     * 
     * @return array
     */
    public function generateToken(string $email): array
    {
        $duration_in_seconds = $this->config->item('auth_token_expiration') ?? 0;
        $data = [
            'email' => $email,
            'token' => base64_encode(random_bytes(64)),
            'expiration_date' => date('Y-m-d H:i:s', time() + $duration_in_seconds)
        ];

        $this->store($data);

        return $data;
    }

    /**
     * Return fillable fields of access_tokens table.
     * 
     * @return array
     */
    public function getFillable(): array
    {
        return $this->fillable;
    }

    /**
     * Get a token record by given column name and it's value.
     * 
     * @param string $columnName
     * @param string $value
     * 
     * @return stdClass|null
     */
    public function getSingleToken(string $columnName, string $value): ?stdClass
    {
        return $this->db->get_where($this->table, [$columnName => $value])->row();
    }

    /**
     * Store a new token to database. If the token already exists, it will be deleted first.
     * 
     * @param array $data
     * 
     * @return bool
     */
    private function store(array $data): bool
    {
        $row = $this->getSingleToken('email', $data['email']);
        if ($row !== null) {
            $this->delete($row->email);
        }
        return $this->db->insert($this->table, $data);
    }

    /**
     * Delete a token record by given email.
     * 
     * @param string $email
     * 
     * @return bool
     */
    public function delete(string $email): bool
    {
        return $this->db->delete($this->table, ['email' => $email]) ? true : false;
    }
}
