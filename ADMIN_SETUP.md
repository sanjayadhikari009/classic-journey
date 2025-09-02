# Admin Panel Setup

## Overview
This application now has a separate, secure admin panel with its own authentication system and route protection.

## Features

### 🔐 Secure Authentication
- **Separate Admin Login**: Dedicated login page at `/admin/login`
- **Route Protection**: All admin routes are protected with middleware
- **Admin-Only Access**: Only users with `is_admin = true` can access admin panel
- **Session Management**: Proper session handling and logout functionality

### 🎨 Professional Design
- **Modern UI**: Clean, professional admin interface
- **Responsive Design**: Works on desktop and mobile devices
- **User Profile Display**: Shows admin user info in sidebar
- **Security Notices**: Visual indicators for restricted access

### 🛡️ Security Features
- **Admin Middleware**: Custom middleware to protect admin routes
- **Authentication Validation**: Checks both login and admin privileges
- **Session Security**: Proper session regeneration and invalidation
- **Access Logging**: All admin access attempts are logged

## File Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   └── Admin/
│   │       ├── AuthController.php     # Admin authentication
│   │       ├── DashboardController.php # Admin dashboard
│   │       └── ...                    # Other admin controllers
│   └── Middleware/
│       └── AdminMiddleware.php        # Admin route protection
├── resources/
│   └── views/
│       └── admin/
│           ├── auth/
│           │   └── login.blade.php    # Admin login page
│           ├── layouts/
│           │   └── app.blade.php      # Admin layout
│           └── dashboard.blade.php    # Admin dashboard
└── routes/
    └── web.php                        # Updated with admin routes
```

## Routes

### Admin Authentication Routes
- `GET /admin` → Redirects to admin login
- `GET /admin/login` → Admin login page
- `POST /admin/login` → Admin login process
- `POST /admin/logout` → Admin logout

### Protected Admin Routes
All admin routes are protected with `auth` and `admin` middleware:
- `GET /admin/dashboard` → Admin dashboard
- `GET /admin/members` → Member management
- `GET /admin/products` → Product management
- `GET /admin/trips` → Trip management
- `GET /admin/companies` → Company management
- `GET /admin/reviews` → Review management
- `GET /admin/order-list` → Order management
- `GET /admin/withdraw-list` → Withdrawal management
- `GET /admin/deposite-list` → Deposit management
- `GET /admin/level-setting` → Level settings
- `GET /admin/wallet-settings` → Wallet settings

## Usage

### Accessing Admin Panel
1. Navigate to `/admin` or `/admin/login`
2. Use admin credentials (email and password)
3. Must have `is_admin = true` in database

### Default Admin Account
The system includes a default admin account:
- **Email**: `admin@example.com`
- **Password**: `admin1234`
- **Username**: `admin`

### Creating New Admin Users
To create a new admin user, set the `is_admin` field to `true` in the database:

```sql
UPDATE users SET is_admin = true WHERE email = 'your-email@example.com';
```

Or create a new admin user through the database seeder.

## Security Notes

1. **Change Default Password**: Always change the default admin password
2. **Strong Passwords**: Use strong, unique passwords for admin accounts
3. **HTTPS**: Use HTTPS in production for secure communication
4. **Access Logging**: Monitor admin access logs regularly
5. **Session Timeout**: Consider implementing session timeout for admin sessions

## Customization

### Styling
- Admin login page: `resources/views/admin/auth/login.blade.php`
- Admin layout: `resources/views/admin/layouts/app.blade.php`
- Uses Tailwind CSS for styling

### Adding New Admin Routes
1. Add route to the protected admin group in `routes/web.php`
2. Create corresponding controller method
3. Create view file if needed
4. Add navigation link to admin layout

### Middleware Customization
- Admin middleware: `app/Http/Middleware/AdminMiddleware.php`
- Can be extended to add additional security checks

## Troubleshooting

### Common Issues

1. **"Access denied" error**
   - Ensure user has `is_admin = true` in database
   - Check if user is properly authenticated

2. **Route not found**
   - Verify route is in the protected admin group
   - Check route names and prefixes

3. **Login not working**
   - Verify admin credentials
   - Check if `is_admin` field is set to true
   - Ensure email exists in database

### Debug Mode
Enable debug mode in `.env` to see detailed error messages:
```
APP_DEBUG=true
```

## Support
For issues or questions about the admin panel setup, check the Laravel documentation or contact the development team. 