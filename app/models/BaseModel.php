<?php
require_once (__DIR__ . '/../../core/database.php');

class BaseModel
{
    protected $db;
    protected $table;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function all()
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->db->query($sql)->fetchAll();
    }
    public function find($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        return $this->db->query($sql, ['id' => $id])->fetch();
    }
    public function create($data)
    {
        $sql = "INSERT INTO {$this->table} (";
        $sql .= implode(", ", array_keys($data)) . ") VALUES (";
        $sql .= implode(", ", array_fill(0, count($data), "?")) . ")";
        $this->db->query($sql, array_values($data));
    }
    public function update($id, $data)
    {
        $sql = "UPDATE {$this->table} SET ";
        $sql .= implode(", ", array_map(fn($key) => "$key = ?", array_keys($data)));
        $sql .= " WHERE id = ?";
        $this->db->query($sql, [...array_values($data), $id]);
    }
    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        $this->db->query($sql, [$id]);
    }
    public function destroy($id)
    {
        return $this->delete($id);
    }
}


?>