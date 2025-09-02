#!/bin/bash

echo "🚀 Applying Journey System Fixes to Local Environment"
echo "=================================================="

echo "1. Seeding Products..."
php artisan db:seed --class=ProductSeeder

echo "2. Clearing application cache..."
php artisan cache:clear
php artisan config:clear
php artisan view:clear

echo "3. Optimizing application..."
php artisan config:cache
php artisan route:cache

echo "4. Running database migrations (if any)..."
php artisan migrate

echo "5. Fixing users with 0 journeys who have balance..."
php artisan journey:fix-reset

echo "✅ All fixes applied successfully!"
echo ""
echo "🔍 Test the fixes:"
echo "- Visit /rate-trip to see correct Current Balance and Journey count"
echo "- Visit /user/history to see only reviewed products (should be clean now)"
echo "- Use /debug-products to check database state"
echo "- Admin shows 'No products currently locked' = correct (no submit buttons should show)"
echo "- After admin locks products for user, they will appear in history with submit buttons"
echo ""
echo "📝 Key fixes applied:"
echo "- Fixed Current Balance display (now shows actual user balance)"
echo "- Fixed Journey Progress calculation (now shows completed reviews)"
echo "- History page shows ONLY reviewed products and admin-assigned products"
echo "- Start Journey button text is white again"
echo "- FIXED PENDING LOGIC: Only products where money was deducted show as pending"
echo "- Added payment tracking: Shows amount paid for completed/pending items"
echo "- REMOVED Available and Locked products from history (clean view)"
echo "- FIXED JOURNEY BLOCKING: Users with balance can continue when journey = 0"
echo "- AUTO-RESET: Journey count auto-resets when user has balance but 0 journeys"
echo ""
echo "🎯 Expected behavior:"
echo "- Current Journey: Shows remaining journeys (user.journey field)"
echo "- Journey Progress: Shows completed reviews / total journey allocation"
echo "- PENDING: Only products where balance was deducted but review not completed"
echo "- COMPLETED: Products where review was finished"
echo "- ON HOLD: Admin-assigned products only"
echo "- History tabs: All, Pending, Completed, On Hold (clean and simple)" 