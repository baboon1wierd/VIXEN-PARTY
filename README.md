# VIXEN-PARTY
# Kenya Trust & Alert Hub 🇰🇪

A community-powered platform for **Lost & Found**, **Scam Alerts**, and **Consumer Protection** in Kenya.

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
