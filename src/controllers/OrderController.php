<?php
require_once __DIR__ . '/../models/Order.php';
require_once __DIR__ . '/../config/Paths.php';

class OrderController {
   private $orderModel;
   public function __construct(){
       $this->orderModel = new Order();
   }

   public function index() {
       $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
       $limit = 10;
       $offset = ($page - 1) * $limit;
       $totalOrders = $this->orderModel->getTotalOrders();
       $totalPages = ceil($totalOrders / $limit);

       if ($page < 1 || $page > $totalPages) {
           http_response_code(404);
           require_once PAGE_404;
        exit;
       }

       $orders = $this->orderModel->getOrders($limit, $offset);
       $customers = $this->orderModel->getAllCustomers();
       require_once ORDER_INDEX_VIEW;
   }
   public function getOrder($id) {
       $order = $this->orderModel->getById($id);

       if (!$order) {
           http_response_code(404);
           require_once PAGE_404;
           exit;
       }

       $customer = $this->getCustomer($id);

       require_once ORDER_DETAIL_VIEW;
   }
   public function getCustomer($id) {
       $customer = $this->orderModel->getCustomer($id);
       return $customer;
   }
   public function getCustomerById($customerId) {
       $customer = $this->orderModel->getCustomerById($customerId);
       return $customer;
   }
    public function addOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $description = isset($_POST['description']) ? $_POST['description'] : '';
            $totalPrice = isset($_POST['total_price']) ? $_POST['total_price'] : 0;
            $customerId = isset($_POST['customer_id']) ? $_POST['customer_id'] : null;
            $status = isset($_POST['status']) ? $_POST['status'] : '';

            $customer = $this->getCustomerById($customerId);

            $email = $customer['email'];
            $phone = $customer['phone'];

            if (empty($description) || empty($customerId) || $totalPrice == 0) {
                $response = ['success' => false, 'message' => 'Все обязательные* поля должны быть заполнены.'];
                echo json_encode($response);
                return;
            }

            $orderId = $this->orderModel->addOrder($description, $totalPrice, $customerId, $email, $phone, $status);

            if ($orderId) {
                $newOrder = $this->orderModel->getById($orderId);

                $totalOrders = $this->orderModel->getTotalOrders();

                $totalPages = ceil($totalOrders / 10);

                $response = [
                    'success' => true,
                    'order' => $newOrder,
                    'totalOrders' => $totalOrders,
                    'totalPages' => $totalPages
                ];
            } else {
                $response = ['success' => false, 'message' => 'Не удалось добавить заказ.'];
            }

            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
    }
}
