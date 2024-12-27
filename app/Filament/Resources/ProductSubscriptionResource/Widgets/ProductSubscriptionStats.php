<?php

namespace App\Filament\Resources\ProductSubscriptionResource\Widgets;

use App\Models\Product;
use App\Models\ProductSubscription;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProductSubscriptionStats extends BaseWidget
{
    protected function getStats(): array
    {
        $totalTransaction = ProductSubscription::count();
        $approvedTransactions = ProductSubscription::where('is_paid', true)->count();
        $totalRevenue = ProductSubscription::where('is_paid', true)->sum('total_amount');

        return[
            Stat::make('Total Transaction', $totalTransaction)
                ->description('All Transaction')
                ->descriptionIcon('heroicon-o-currency-dollar'),

            Stat::make('Approved Transaction', $approvedTransactions)
                ->description('Approved Transaction')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success'),

            Stat::make('Total Revenue', 'IDR' . number_format($totalRevenue))
                ->description('Revenue from approved transactions')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success'),
        ];
    }
}
