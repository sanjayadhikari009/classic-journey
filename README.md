# Travelstride Clone - Laravel Application

A complete Laravel clone of the Travelstride website, featuring a modern travel booking platform with trip search, destination browsing, and custom trip design functionality.

## Features

### 🏠 **Home Page**
- Hero section with compelling travel messaging
- Travel style selection (Guided Group, Custom, Adventure, etc.)
- Why use Travelstride benefits section
- Featured trips showcase
- Popular destinations grid
- Tour operator partnerships
- Travel guides and tips
- Sign-in call-to-action

### 🎯 **Trips Page**
- Advanced search functionality
- Filter by trip type, destination, and style
- Trip cards with ratings, reviews, and pricing
- Sort options (price, popularity, duration)
- Pagination for large trip collections

### 🌍 **Destinations Page**
- Browse destinations by region
- Popular destinations showcase
- Trip count per destination
- Interactive destination cards

### ✨ **Design My Trip**
- Comprehensive trip customization form
- Destination selection
- Travel style preferences
- Budget range selection
- Interest categories
- Contact information collection
- Special requests handling

### 👤 **User Authentication**
- Sign-in page with Google and email options
- Modern authentication UI
- Password recovery functionality

### ℹ️ **Information Pages**
- About page with company mission and values
- Contact page with form and company information
- FAQ section for common questions

## Technology Stack

- **Backend**: Laravel 12 (PHP 8.2+)
- **Frontend**: Blade templates with Tailwind CSS
- **Styling**: Tailwind CSS v4
- **Icons**: Font Awesome 6
- **Build Tool**: Vite
- **Database**: SQLite (default)

## Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd insight-vacation
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup**
   ```bash
   php artisan migrate
   ```

6. **Build assets**
   ```bash
   npm run build
   ```

7. **Start the development server**
   ```bash
   php artisan serve
   ```

## Project Structure

```
insight-vacation/
├── app/
│   └── Http/Controllers/
│       ├── HomeController.php
│       ├── TripController.php
│       └── DestinationController.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       ├── home.blade.php
│       ├── trips/
│       │   └── index.blade.php
│       ├── destinations/
│       │   └── index.blade.php
│       └── pages/
│           ├── about.blade.php
│           ├── contact.blade.php
│           ├── signin.blade.php
│           └── design-trip.blade.php
├── routes/
│   └── web.php
└── public/
    └── build/
```

## Routes

- `GET /` - Home page
- `GET /trips` - Browse all trips
- `GET /trips/search` - Search trips
- `GET /trips/{id}` - View specific trip
- `GET /destinations` - Browse destinations
- `GET /destinations/{destination}` - View specific destination
- `GET /about` - About page
- `GET /contact` - Contact page
- `GET /signin` - Sign in page
- `GET /design-trip` - Custom trip design

## Design Features

### 🎨 **Modern UI/UX**
- Clean, professional design matching Travelstride's aesthetic
- Responsive design for all device sizes
- Smooth hover effects and transitions
- Consistent color scheme and typography

### 📱 **Responsive Design**
- Mobile-first approach
- Tablet and desktop optimizations
- Flexible grid layouts
- Touch-friendly interface elements

### 🚀 **Performance**
- Optimized asset loading
- Efficient CSS with Tailwind
- Fast page load times
- SEO-friendly structure

## Customization

### Colors
The application uses a blue-based color scheme that can be customized in the Tailwind configuration:

- Primary: Blue-600 (#2563eb)
- Secondary: Gray tones
- Accent: Various blue shades

### Content
All content is easily editable through the Blade templates in the `resources/views/` directory.

### Styling
Styles are managed through Tailwind CSS classes and can be customized in `resources/css/app.css`.

## Development

### Running in Development Mode
```bash
npm run dev
php artisan serve
```

### Building for Production
```bash
npm run build
```

### Database Migrations
```bash
php artisan migrate
php artisan migrate:rollback
```

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## License

This project is for educational purposes and is a clone of the Travelstride website design and functionality.

## Acknowledgments

- Original design inspiration from [Travelstride](https://www.travelstride.com/)
- Laravel framework for the robust backend
- Tailwind CSS for the beautiful styling
- Font Awesome for the icons

---

**Note**: This is a demonstration project showcasing Laravel development skills and modern web design principles. It replicates the functionality and design of Travelstride for educational purposes.
