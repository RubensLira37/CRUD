<?php
interface Adm {
    public function select_id(string $id): mixed;
    public function select_name(string $name): mixed;

    public function insert_into(
        string $name, 
        string $brand, 
        string $category, 
        string $price, 
        string $created_by
    ): bool;

    public function update(
        int $id,
        string $name, 
        string $brand, 
        string $category, 
        string $price, 
        string $created_by,
    ): bool;

    public function delete(int $id): bool;
}