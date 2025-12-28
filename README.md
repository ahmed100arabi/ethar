# Ethar (إيثار) - Humanitarian Platform

Ethar is a modern, transparent humanitarian platform designed to bridge the gap between patients in need and donors in Libya. It facilitates medical case funding, blood donation requests, and health awareness campaigns.

## 🌟 Key Features

### 🏥 Case Management
- **Patient Dashboard**: Patients can submit medical assistance requests with detailed descriptions and supporting documents.
- **Progress Tracking**: Real-time funding progress bars for each case.
- **Priority System**: Critical cases are highlighted and prioritized on the homepage.
- **Privacy**: Use of patient nicknames to protect identity while maintaining transparency.

### 🩸 Blood Donation
- **Request System**: Urgent blood donation requests with type and hospital details.
- **Donor Matching**: Connects donors with patients in their city.
- **Verification**: OTP-based verification for blood donation registrations.

### 📢 Awareness Campaigns
- **Community Outreach**: Management of health awareness events and campaigns.
- **Registration**: Simple registration process for volunteers and participants.

### 💳 Payment & Donations
- **Multi-method Support**: Supports credit card simulations and local prepaid cards.
- **Transparency**: Automated email notifications for donors and case owners upon successful funding.
- **Site Wallet**: Internal tracking of all processed donations.

### 🛡️ Admin Panel
- **Case Review**: Robust approval/rejection workflow for new requests.
- **User Management**: Oversight of all platform participants.
- **Reporting**: Detailed statistics on donations, donors, and campaign impact.

## 🛠️ Technology Stack

- **Framework**: CodeIgniter 4 (PHP 8.1+)
- **Database**: SQLite 3 (for portability and speed)
- **Frontend**: Vanilla CSS (Modern UI/UX with Glassmorphism)
- **Icons**: Lucide/SVG Icons
- **Typography**: IBM Plex Sans Arabic

## 🚀 Installation & Setup

1. **Clone the repository**:
   ```bash
   git clone [repository-url]
   cd Ethar
   ```

2. **Install Dependencies**:
   ```bash
   composer install
   ```

3. **Environment Setup**:
   - Copy `env` to `.env`
   - Set `CI_ENVIRONMENT = development` for debugging.

4. **Database Setup**:
   - Ensure `writable/database/` is writable.
   - Run migrations (if applicable): `php spark migrate`

5. **Run the Server**:
   ```bash
   php spark serve
   ```
   The app will be available at `http://localhost:8080`

## 🔐 Access Credentials (Development)

### Admin Access
- **Email**: `super@ethar.com`
- **Password**: `0000`

### User Access
- **Email**: `ahmed22aribi@gmail.com` | **Password**: `1234`
- **Email**: `fears.alzaquzi@gmail.com` | **Password**: `4321`

### Card Management (Testing)
- **URL**: `http://localhost:8080/card_management.php`

## 📁 Project Structure

- `app/Controllers`: Application logic and routing handlers.
- `app/Models`: Database interactions and business rules.
- `app/Views`: Modern, responsive UI templates.
- `public/`: Entry point and static assets (CSS, JS, Images).
- `writable/database/`: SQLite database files.

