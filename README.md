# VIXEN-PARTY Repository

This repository contains multiple projects focused on education and community support.

## Projects

### 1. Kenya Trust & Alert Hub 🇰🇪

A community-powered platform for **Lost & Found**, **Scam Alerts**, and **Consumer Protection** in Kenya.

[View Kenya Trust Hub →](./kenya-trust-hub/)

### 2. Tutor-Allied AI Academy 🎓

An AI-powered educational platform with personalized tutoring and adaptive learning experiences.

[View AI Academy →](./tutor-allied-ai-academy/)

---

## Kenya Trust & Alert Hub

This project helps Kenyans report, discover, and stay informed about:
- Lost and recovered items
- Online and offline scams
- Counterfeit, overpriced, or low-quality products

Built with **PHP**, designed to be lightweight, secure, and scalable.

---

## 🚀 Features

### 🔍 Lost & Found
- Report lost or found items (phones, IDs, wallets, documents, livestock)
- Location-based listings
- Evidence uploads
- Community verification

### 🚨 Scam Alerts
- User-reported scams (WhatsApp, Telegram, online shops, fake jobs, landlords)
- Evidence-based reporting
- Risk status (Reported / Under Review / Verified)
- Legal-safe wording for public protection

### 🛒 Consumer Protection
- Flag counterfeit or substandard products
- Highlight extreme overpricing or suspicious underpricing
- Compare claimed price vs market price

### 📰 Newsletter
- Weekly fraud and safety alerts
- Trending scams
- Products to avoid
- Recovered lost items
- County-based insights

---

## 🧱 Tech Stack

- **Backend:** PHP (procedural → MVC-ready)
- **Database:** MySQL (schema pending / extendable)
- **Frontend:** HTML, CSS (Tailwind-ready), minimal JS
- **Auth:** Session-based (phone/email extensible)
- **Hosting:** Apache / Nginx (Vercel not required)
- **Optional:** Composer, REST API, SMS/WhatsApp integration

---

## 📁 Project Structure

```plaintext
kenya-trust-hub/
├── public/            # Publicly accessible pages
├── app/               # Application logic & views
│   ├── config/
│   ├── controllers/
│   ├── models/
│   └── views/
├── admin/             # Admin & moderation panel
├── api/               # API endpoints
├── storage/           # Uploads, evidence, logs
├── .env               # Environment variables
├── .htaccess          # Routing & security rules
└── README.md


---

⚙️ Installation

1. Clone the repository

git clone https://github.com/your-org/kenya-trust-hub.git
cd kenya-trust-hub

2. Configure environment

Create a .env file:

APP_NAME="Kenya Trust & Alert Hub"
APP_ENV=local
DB_HOST=localhost
DB_NAME=trusthub
DB_USER=root
DB_PASS=

3. Set permissions

chmod -R 755 storage/

4. Serve the app

Point your web server root to:

/public


---

🔐 Security & Legal

All reports are user-generated

Listings are marked “Reported” until reviewed

Evidence uploads are isolated and logged

Sensitive data should be blurred or redacted

Rate limiting recommended for reports


Legal Disclaimer (Required):

> This platform does not make legal accusations.
All content is user-reported and provided for public awareness only.




---

🛠 Admin Panel

Admins can:

Review and moderate reports

Verify high-risk listings

Manage users

Escalate confirmed scams

Remove abusive or false reports


Admin routes are located in /admin.


---

🧭 Roadmap

[ ] MySQL schema & migrations

[ ] Admin verification workflows

[ ] Reputation & trust scoring

[ ] SMS / WhatsApp alerts

[ ] Map-based listings

[ ] PWA support

[ ] API access for partners



---

🤝 Contributing

Contributions are welcome.

Fork the repo

Create a feature branch

Submit a pull request


Focus areas:

Security

Moderation tooling

Performance

Accessibility



---

📩 Contact

For partnerships, reports, or support:

📧 support@trusthub.ke
🌍 Built for Kenya


---

📄 License

MIT License
© 2026 — Kenya Trust & Alert Hub

MUCHO GRACIAS AMIGO

