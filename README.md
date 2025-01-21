# TaskManagerPro

## 🌟 Project Overview
TaskManagerPro is a robust and user-friendly web application designed to streamline task management for teams and individuals. It offers:
- Role-based dashboards (Admin, Manager, User)
- A secure API for seamless integration
- A responsive interface for enhanced productivity

---

## 🛠 Features

### 🌐 Web Interface
- **Admin Dashboard**: Manage users, view all tasks, and assign roles.
- **Manager Dashboard**: Oversee team tasks and track progress.
- **User Dashboard**: Create, view, and update personal tasks.

### 🔒 Secure API
- **Endpoints**:
  - `/api/auth.php`: User authentication.
  - `/api/tasks.php`: Task management.
  - `/api/users.php`: User data handling.

### 📂 Organized Codebase
- **Frontend**: Custom styles and scripts located in `/assets`.
- **Backend**: Modular PHP code for scalability and maintainability.
- **Database**: Predefined schema in `/sql/schema.sql` for easy setup.

---

## 🚀 Getting Started

### Prerequisites
- PHP 7.4+
- MySQL 5.7+
- Xampp

### Installation
1. **Clone the repository**:
   ```bash
   git clone https://github.com/your-username/TaskManagerPro.git
   ```
2. **Set up the database**:
   - Import the schema from `/sql/schema.sql`.
3. **Configure the database connection**:
   - Update `/database/connection.php` with your credentials.
4. **Start the server**:
   ```bash
   php -S localhost:8000
   ```
5. **Access the app**:
   - Navigate to `http://localhost:8000` in your browser.

---

## 🧩 Technologies Used
- **Frontend**: HTML5, CSS3, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **Version Control**: Git

---

## 📁 Project Structure
```plaintext
TaskManagerPro/
├── assets/
│   ├── css/
│   │   └── styles.css
│   ├── js/
│   │   └── scripts.js
├── database/
│   └── connection.php
├── includes/
│   ├── header.php
│   └── footer.php
├── admin/
│   ├── dashboard.php
│   ├── tasks.php
│   └── users.php
├── user/
│   ├── dashboard.php
│   └── tasks.php
├── manager/
│   ├── dashboard.php
│   └── tasks.php
├── api/
│   ├── auth.php
│   ├── tasks.php
│   └── users.php
├── sql/
│   └── schema.sql
└── index.php
```

---

## 🤝 Contributing

We welcome contributions! Please follow these steps:
1. **Fork the repository**.
2. **Create a new branch**:
   ```bash
   git checkout -b feature/your-feature
   ```
3. **Commit your changes**:
   ```bash
   git commit -m "Add your feature"
   ```
4. **Push the branch**:
   ```bash
   git push origin feature/your-feature
   ```
5. **Create a Pull Request** on GitHub.

---

## 📜 License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

---

## 📞 Contact
For inquiries, reach out to:
- **Name**: Hamad Ashraf
- **Email**: h.ashraf99@outlook.com
- **GitHub**: [Your GitHub Profile](https://github.com/h-ashraf)

---

### 🚀 Let’s manage tasks better, together!
