# Inventory Management & Dynamic Pricing API

## 🚀 Overview

This project is a RESTful API built using Laravel for managing products, warehouses, and stock with dynamic pricing.

---

## 🛠️ Tech Stack

* Laravel
* MySQL
* Laravel Sanctum
* Postman (API testing)

---

## 🔐 Authentication

This API uses Laravel Sanctum for token-based authentication.

---

## 📦 Features

* Product listing with dynamic pricing
* Stock management (create/update)
* Warehouse-wise stock reporting
* Expiry-based discount logic
* Secure API using authentication
* Input validation using FormRequest

---

## ⚙️ Setup Instructions

1. Clone the repository:

```bash
git clone https://github.com/RoseVarghese08/inventory_managment.git
cd inventory_managment
```

2. Install dependencies:

```bash
composer install
```

3. Copy environment file:

```bash
cp .env.example .env
```

4. Configure database in `.env`

5. Generate app key:

```bash
php artisan key:generate
```

6. Run migrations and seed data:

```bash
php artisan migrate --seed
```

7. Start server:

```bash
php artisan serve
```

---

## 📬 API Endpoints

### 🔹 Authentication

POST `/api/login`

### 🔹 Products

GET `/api/products`

### 🔹 Stock

POST `/api/stock`

### 🔹 Warehouse Report

GET `/api/warehouses/{id}/report`

---

## 🧪 API Testing

Use Postman to test APIs.

Steps:

1. Login to get token
2. Add token in Authorization header:
   Bearer YOUR_TOKEN
3. Call other APIs

---

## 💰 Dynamic Pricing Rules

* Total stock < 10 → +30%
* Total stock 10–50 → +10%
* Total stock > 100 → -20%
* Expiry within 7 days → -25%

---

## 📊 Sample Response

```json
{
  "warehouse": "Kochi Hub",
  "products": [
    {
      "product": "Laptop",
      "quantity": 20,
      "near_expiry": true
    }
  ]
}
```

---

## 🎯 Highlights

* Clean REST API design
* Service-based architecture (DynamicPricingService)
* Proper use of Eloquent relationships
* Validation using FormRequest
* Middleware for authentication

---

## 📁 Postman Collection

Import the provided Postman collection file:
`inventory-api.postman_collection.json`

---

## 👩‍💻 Author

Rosemol Varghese
