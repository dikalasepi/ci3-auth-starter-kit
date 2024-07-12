<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserCookie_model extends CI_Model
{
    /**
     * The name of the table that will be used.
     * 
     * @var string
     */
    protected string $table = 'user_cookies';

    /**
     * Fields of user_cookies table that will be filled.
     * 
     * @var array
     */
    protected array $fillable = [
        'id',
        'email',
        'token',
        'is_browser',
        'is_mobile',
        'browser_name',
        'browser_version',
        'mobile_device',
        'device_platform'
    ];

    /**
     * Return fillable fields of user_cookies table.
     * 
     * @return array
     */
    public function getFillable(): array
    {
        return $this->fillable;
    }

    /**
     * Get single user cookies's record by column name and it's value.
     * 
     * @param string $columnName
     * @param string $value
     * 
     * @return stdClass|null
     */
    public function getSingleCookie(string $columnName, string $value): ?stdClass
    {
        return $this->db->get_where($this->table, [$columnName => $value])->row();
    }

    /**
     * Store user cookies's record to database.
     * 
     * @param array $data
     * 
     * @return bool
     */
    public function store(array $data): bool
    {

        $data['id'] = base64_encode(random_bytes(32));
        $data = array_merge(['id' => $data['id']], $data);
        $duration_in_seconds = $this->config->item('cookie_expiration') ?? 0;

        /** set cookie according to 'cookie_expiration' config in config.php */
        setcookie('uid', $data['id'], time() + $duration_in_seconds);
        setcookie('session', password_hash($data['token'], PASSWORD_DEFAULT), time() + $duration_in_seconds);

        $data['expiration_date'] = date('Y-m-d H:i:s', time() + $duration_in_seconds);
        return $this->db->insert($this->table, $data);
    }

    /**
     * Delete user cookies's record from database.
     * 
     * @param string $id
     * @param string $token
     * 
     * @return bool
     */
    public function delete(string $id, string $token): bool
    {
        $row = $this->db->where('id', $id)->get($this->table)->row();
        if ($row === null) {
            return false;
        }

        if (!password_verify($row->token, $token)) {
            return false;
        }

        /** delete cookie from database */
        $this->db->delete($this->table, ['id' => $id]);

        /** delete cookie from browser */
        setcookie('uid', '', time() - 3600);
        setcookie('session', '', time() - 3600);

        return true;
    }

    public function empty(): void
    {
        /** delete cookie from browser */
        setcookie('uid', '', time() - 3600);
        setcookie('session', '', time() - 3600);

        /** delete cookie from database */
        $this->db
            ->where('expiration_date <', date('Y-m-d H:i:s'))
            ->delete($this->table);
    }
}
