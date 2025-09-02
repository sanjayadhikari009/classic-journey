<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Trip;
use App\Models\Company;
use App\Models\UserOrder;
use App\Models\Deposite;
use App\Models\Withdraw;
use App\Models\Favorite;
use App\Models\Review;
use Illuminate\Support\Facades\Hash;

class UserPanelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create or update a test user
        $user = User::updateOrCreate(
            ['email' => 'john@example.com'],
            [
                'name' => 'John Doe',
                'password' => Hash::make('password'),
                'username' => 'johndoe',
                'mobile_number' => '+1 (555) 123-4567',
                'balance' => 2500.00,
                'language' => 'en',
                'currency' => 'USD',
                'timezone' => 'America/New_York',
                'date_format' => 'MM/DD/YYYY',
                'email_notifications' => true,
                'sms_notifications' => false,
                'marketing_emails' => true,
                'booking_confirmations' => true,
                'price_alerts' => true,
                'profile_visible' => true,
                'reviews_visible' => true,
                'activity_status' => true,
                'bio' => 'Passionate traveler exploring the world one destination at a time.',
                'location' => 'New York, NY',
                'date_of_birth' => '1990-05-15',
                'gender' => 'male',
            ]
        );

        // Create or update a company
        $company = Company::updateOrCreate(
            ['name' => 'Adventure Travel Co.'],
            [
                'description' => 'Leading adventure travel company',
                'status' => 'active',
            ]
        );

        // Create sample trips
        $trips = [
            [
                'title' => 'European Adventure',
                'description' => 'Explore the best of Europe in 14 days',
                'destination' => 'Europe',
                'duration' => 14,
                'price' => 2999.00,
                'company_id' => $company->id,
                'status' => 'active',
                'featured' => true,
            ],
            [
                'title' => 'Asian Discovery',
                'description' => 'Discover the wonders of Asia',
                'destination' => 'Asia',
                'duration' => 21,
                'price' => 3999.00,
                'company_id' => $company->id,
                'status' => 'active',
                'featured' => true,
            ],
            [
                'title' => 'African Safari',
                'description' => 'Experience the wild beauty of Africa',
                'destination' => 'Africa',
                'duration' => 10,
                'price' => 2499.00,
                'company_id' => $company->id,
                'status' => 'active',
                'featured' => false,
            ],
        ];

        $createdTrips = [];
        foreach ($trips as $tripData) {
            $trip = Trip::updateOrCreate(
                ['title' => $tripData['title']],
                $tripData
            );
            $createdTrips[] = $trip;
        }

        // Create sample bookings
        $bookings = [
            [
                'trip_id' => $createdTrips[0]->id,
                'amount' => 2999.00,
                'status' => 'completed',
                'booking_date' => '2024-06-15',
                'travel_date' => '2024-08-15',
            ],
            [
                'trip_id' => $createdTrips[1]->id,
                'amount' => 3999.00,
                'status' => 'pending',
                'booking_date' => '2024-07-01',
                'travel_date' => '2024-09-01',
            ],
        ];

        foreach ($bookings as $bookingData) {
            UserOrder::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'trip_id' => $bookingData['trip_id'],
                    'booking_date' => $bookingData['booking_date']
                ],
                array_merge($bookingData, ['user_id' => $user->id])
            );
        }

        // Create sample deposits
        $deposits = [
            ['amount' => 1000.00, 'status' => 'complete', 'payment_method' => 'credit_card'],
            ['amount' => 500.00, 'status' => 'complete', 'payment_method' => 'paypal'],
            ['amount' => 750.00, 'status' => 'pending', 'payment_method' => 'bank_transfer'],
        ];

        foreach ($deposits as $depositData) {
            Deposite::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'amount' => $depositData['amount'],
                    'payment_method' => $depositData['payment_method']
                ],
                array_merge($depositData, ['user_id' => $user->id])
            );
        }

        // Create sample withdrawals
        $withdrawals = [
            ['amount' => 300.00, 'status' => 'complete', 'payment_method' => 'bank_transfer'],
            ['amount' => 200.00, 'status' => 'pending', 'payment_method' => 'paypal'],
        ];

        foreach ($withdrawals as $withdrawalData) {
            Withdraw::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'amount' => $withdrawalData['amount'],
                    'payment_method' => $withdrawalData['payment_method']
                ],
                array_merge($withdrawalData, ['user_id' => $user->id])
            );
        }

        // Create sample favorites
        Favorite::updateOrCreate(
            ['user_id' => $user->id, 'trip_id' => $createdTrips[0]->id],
            ['user_id' => $user->id, 'trip_id' => $createdTrips[0]->id]
        );
        Favorite::updateOrCreate(
            ['user_id' => $user->id, 'trip_id' => $createdTrips[2]->id],
            ['user_id' => $user->id, 'trip_id' => $createdTrips[2]->id]
        );

        // Create sample reviews
        $reviews = [
            [
                'trip_id' => $createdTrips[0]->id,
                'rating' => 5,
                'comment' => 'This trip exceeded all my expectations. The guides were knowledgeable and the itinerary was perfect.',
                'status' => 'approved',
                'commission_earned' => 150.00,
            ],
            [
                'trip_id' => $createdTrips[1]->id,
                'rating' => 4,
                'comment' => 'Wonderful trip with beautiful destinations. Highly recommend for anyone interested in Asian culture.',
                'status' => 'approved',
                'commission_earned' => 120.00,
            ],
        ];

        foreach ($reviews as $reviewData) {
            Review::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'trip_id' => $reviewData['trip_id'],
                ],
                array_merge($reviewData, ['user_id' => $user->id])
            );
        }

        $this->command->info('User panel sample data created successfully!');
        $this->command->info('Test user: john@example.com / password');
    }
}