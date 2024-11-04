<?php

class Model extends Database
{
    protected $limit = 10;
    protected $offset = 0;
    protected $order_type = "asc";
    protected $order_column = "id";
    protected $allowedColumns = []; // Specify allowed columns if needed
    protected $table = ""; // Make sure to set this in each model that extends this class

    // Retrieve all records with pagination and sorting
    public function findAll()
    {
        $query = "SELECT * FROM {$this->table} ORDER BY {$this->order_column} {$this->order_type} LIMIT {$this->limit} OFFSET {$this->offset}";
        return $this->query($query);
    }

    // Retrieve records based on conditions
    public function where($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM {$this->table} WHERE ";

        foreach ($keys as $key) {
            $query .= "$key = :$key AND ";
        }

        foreach ($keys_not as $key) {
            $query .= "$key != :$key AND ";
        }

        $query = rtrim($query, " AND ");
        $query .= " ORDER BY {$this->order_column} {$this->order_type} LIMIT {$this->limit} OFFSET {$this->offset}";

        $data = array_merge($data, $data_not);
        return $this->query($query, $data);
    }

    // Retrieve the first matching record based on conditions
    public function first($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM {$this->table} WHERE ";

        foreach ($keys as $key) {
            $query .= "$key = :$key AND ";
        }

        foreach ($keys_not as $key) {
            $query .= "$key != :$key AND ";
        }

        $query = rtrim($query, " AND ");
        $query .= " LIMIT 1";

        $data = array_merge($data, $data_not);
        $result = $this->query($query, $data);

        return $result ? $result[0] : false;
    }

    // Insert a new record into the table
    public function insert($data)
    {
        if (!empty($this->allowedColumns)) {
            $data = array_filter($data, function ($key) {
                return in_array($key, $this->allowedColumns);
            }, ARRAY_FILTER_USE_KEY);
        }

        $keys = array_keys($data);
        $query = "INSERT INTO {$this->table} (" . implode(",", $keys) . ") VALUES (:" . implode(",:", $keys) . ")";

        return $this->query($query, $data);
    }

    // Update an existing record in the table by ID
    public function update($id, $data, $id_column = 'id')
    {
        if (!empty($this->allowedColumns)) {
            $data = array_filter($data, function ($key) {
                return in_array($key, $this->allowedColumns);
            }, ARRAY_FILTER_USE_KEY);
        }

        $keys = array_keys($data);
        $query = "UPDATE {$this->table} SET ";

        foreach ($keys as $key) {
            $query .= "$key = :$key, ";
        }

        $query = rtrim($query, ", ");
        $query .= " WHERE $id_column = :$id_column";

        $data[$id_column] = $id;
        return $this->query($query, $data);
    }

    // Delete a record from the table by ID
    public function delete($id, $id_column = 'id')
    {
        $query = "DELETE FROM {$this->table} WHERE $id_column = :$id_column";
        return $this->query($query, [$id_column => $id]);
    }
}
