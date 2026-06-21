Student Document Tracking and Monitoring System (SDTMS)

Overview

Student Document Tracking and Monitoring System (SDTMS) is a web-based application developed to help students track the status of academic documents such as Bonafide Certificates and OD Forms in real time.

The system provides transparency in the document approval process and reduces manual tracking efforts by allowing students to monitor the current status of their requests online.

---

Features

Student Module

- Student Registration
- Student Login Authentication
- Dashboard
- Track Document Status
- View Collection Details
- Logout

Admin Module

- Admin Login
- Dashboard
- Add Request
- Update Request Status
- Manage Collection Details
- Logout

Tracking Workflow

- Submitted
- Office Received
- HOD Review
- HOD Approved
- Principal Review
- Principal Approved
- Ready For Collection
- Rejected with Remarks

---

Technologies Used

Frontend

- HTML
- CSS
- JavaScript

Backend

- PHP

Database

- MySQL

Hosting

- InfinityFree

---

Database Tables

students

- id
- reg_no
- student_name
- department
- password

requests

- id
- reg_no
- document_type
- status
- remarks

collection_details

- id
- request_id
- collection_date
- collection_time
- location

admins

- id
- admin_id
- password

---

Project Structure

SDTMS/
│
├── index.php
├── register.php
├── student-login.php
├── dashboard.php
├── tracking.php
├── admin-login.php
├── admin-dashboard.php
├── add-request.php
├── update-status.php
├── collection.php
├── db.php
│
├── css/
├── images/
└── database/

---

Installation

1. Download or clone the repository.
2. Import the SQL database into MySQL.
3. Configure database credentials in "db.php".
4. Start Apache and MySQL using XAMPP.
5. Open the project in a browser.

---

Objectives

- Reduce manual document tracking.
- Improve transparency in approval processes.
- Provide real-time status updates.
- Simplify document management for students and administrators.

---

Future Enhancements

- Email Notifications
- SMS Alerts
- QR Code Tracking
- Mobile Application
- Advanced Analytics Dashboard
- Online Document Download

---

Project Status

Completed (Core Functionalities)

Progress: 95%

---

Developed By

Akash Krishna

Student Document Tracking and Monitoring System (SDTMS)
