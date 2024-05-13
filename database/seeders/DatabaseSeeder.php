<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            StoreSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            BrandSeeder::class,
            VendorSeeder::class,
            AttributeSeeder::class,
            AttributeOptionSeeder::class,
            ProductSeeder::class,
            ProductDetailSeeder::class,
            OrderSeeder::class,
            OrderDetailSeeder::class,
            DeliveryInfoSeeder::class,
            CouponSeeder::class,
            DeliveryServiceProviderSeeder::class,
            PaymentSeeder::class,
            EventSeeder::class,
            PointSeeder::class,
            GainPointHistorySeeder::class,
            AccessPointHistorySeeder::class,
            PointCurrencySeeder::class,
        ]);
    }
}
