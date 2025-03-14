<?php
class UserRepository implements DataRepositoryInterface {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function getAll() {
        return $this->db->query("SELECT * FROM users");
    }

    public function getById($id) {
        return $this->db->query("SELECT * FROM users WHERE id = ?", [$id]);
    }

    public function create($data) {
        $this->db->query("INSERT INTO users (id, name, email) VALUES (?, ?, ?)", [$data['id'], $data['name'], $data['email']]);
    }

    public function update($id, $data) {
        $this->db->query("UPDATE users SET name = ?, email = ? WHERE id = ?", [$data['name'], $data['email'], $id]);
    }

    public function delete($id) {
        $this->db->query("DELETE FROM users WHERE id = ?", [$id]);
    }
}