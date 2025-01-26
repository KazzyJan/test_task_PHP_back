<?php
require_once __DIR__ . '/../models/Customer.php';
require_once __DIR__ . '/../config/Paths.php';

class CustomerController {
    private $customerModel;
    public function __construct(){
        $this->customerModel = new Customer();
    }

    public function index() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $totalCustomers = $this->customerModel->getTotalCustomers();
        $totalPages = ceil($totalCustomers / $limit);

        if ($page < 1 || $page > $totalPages) {
            http_response_code(404);
            require_once PAGE_404;
            exit;
        }

        $customers = $this->customerModel->getCustomers($limit, $offset);
        require_once CUSTOMER_INDEX_VIEW;
    }
    public function getCustomer($id) {
        $customer = $this->customerModel->getById($id);

        if (!$customer) {
            http_response_code(404);
            require_once PAGE_404;
            exit; // Останавливаем дальнейшее выполнение
        }

        $orders = $this->customerModel->getOrders($id);
        require_once CUSTOMER_DETAIL_VIEW;
    }
}
