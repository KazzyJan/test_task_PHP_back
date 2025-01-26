<?php
require_once 'Model.php';
class Customer extends Model {
    public function getCustomers($limit, $offset)
    {
        $stmt = $this->db->prepare("SELECT * FROM customers ORDER BY created_at ASC LIMIT :limit OFFSET :offset");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalCustomers()
    {
        $stmt = $this->db->query("SELECT COUNT(*) as total FROM customers");
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM customers WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getOrders($customerId) {
        $stmt = $this->db->prepare("SELECT * FROM orders WHERE customer_id = ?");
        $stmt->execute([$customerId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
