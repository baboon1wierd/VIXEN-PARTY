# Quick Start Guide - Tutor-Allied AI Academy

## Getting Started in 5 Minutes

### Prerequisites
- PHP 7.4 or higher installed
- MySQL or MariaDB installed
- Web server (Apache/Nginx) or use PHP's built-in server

### Step 1: Navigate to the Project
```bash
cd tutor-allied-ai-academy
```

### Step 2: Configure Environment
Copy the example environment file:
```bash
cp .env.example .env
```

Edit `.env` and update your database credentials:
```env
DB_HOST=localhost
DB_NAME=ai_academy
DB_USER=root
DB_PASS=your_password
```

### Step 3: Create Database
```bash
# Login to MySQL
mysql -u root -p

# Create database
CREATE DATABASE ai_academy CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;
```

### Step 4: Set Permissions
```bash
chmod -R 755 storage/
chmod -R 755 public/
```

### Step 5: Start the Application

**Option A: Using PHP Built-in Server (Development)**
```bash
php -S localhost:8000 -t public/
```

Then open your browser to: http://localhost:8000

**Option B: Using Apache/Nginx**
Point your web server document root to:
```
/path/to/tutor-allied-ai-academy/public/
```

## Next Steps

### For Development
1. Review the code structure in `/app`
2. Check out the models in `/app/models`
3. Explore controllers in `/app/controllers`
4. Customize views in `/app/views`

### For Production Deployment
1. Set `APP_ENV=production` in `.env`
2. Set `APP_DEBUG=false` in `.env`
3. Configure proper database credentials
4. Set up HTTPS and update `SESSION_SECURE=true`
5. Configure your AI API keys
6. Set up proper file permissions
7. Enable Apache/Nginx modules (rewrite, headers)
8. Configure cron jobs for scheduled tasks

## Common Issues

### Database Connection Failed
- Check your database credentials in `.env`
- Ensure MySQL service is running
- Verify the database exists

### Permission Denied Errors
```bash
chmod -R 755 storage/
chmod -R 755 public/
```

### .htaccess Not Working
Enable Apache mod_rewrite:
```bash
sudo a2enmod rewrite
sudo service apache2 restart
```

## Project Structure Quick Reference

```
tutor-allied-ai-academy/
├── public/              # Web accessible files
│   └── index.php        # Landing page
├── app/
│   ├── config/          # Configuration files
│   │   └── database.php # Database & app config
│   ├── controllers/     # Business logic (to be added)
│   ├── models/          # Data models (to be added)
│   └── views/           # Templates (to be added)
├── storage/             # File storage
│   ├── uploads/         # User uploads
│   ├── logs/            # Application logs
│   └── cache/           # Cache files
├── .env.example         # Example environment config
└── README.md            # Full documentation
```

## Support

For detailed documentation, see the main [README.md](README.md)

For issues or questions, contact: support@ai-academy.edu
