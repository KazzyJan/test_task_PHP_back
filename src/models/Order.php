<?php
require_once 'Model.php';

class Order extends Model {
    public function getOrders($limit, $offset)
    {
        $stmt = $this->db->prepare("SELECT * FROM orders ORDER BY created_at ASC LIMIT :limit OFFSET :offset");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalOrders()
    {
        $stmt = $this->db->query("SELECT COUNT(*) as total FROM orders");
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM orders WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Добавил этот метод сюда, так как инициализация будет происходить именно из заказов,
    // думаю логичнее обратиться в БД от сюда, чем добавлять модель покупателей в контроллер заказа. В общем нужно
    // смотреть на то, как будет строится дальнейшая структура и отталкиваться от неё. В изолированном тз это выглядит логичнее.
    public function getCustomer($orderId){
        $stmt = $this->db->prepare("SELECT * FROM customers WHERE id = (SELECT customer_id FROM orders WHERE id = ?)");
        $stmt->execute([$orderId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // По тем же соображениям более чистой архитектуры этот метод добавлен в модель заказов
    public function getAllCustomers(){
        $stmt = $this->db->query("SELECT * FROM customers");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addOrder($description, $totalPrice, $customerId, $email, $phone, $status)
    {
        $stmt = $this->db->prepare("
        INSERT INTO orders (description, total_price, customer_id, email, phone, status)
        VALUES (?, ?, ?, ?, ?, ?)
    ");
        $stmt->execute([$description, $totalPrice, $customerId, $email, $phone, $status]);
        return $this->db->lastInsertId();
    }
}
?>