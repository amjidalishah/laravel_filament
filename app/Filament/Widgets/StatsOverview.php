<?php


namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\QRCode;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::query()->count()),
                // ->chart($this->getDailyRegistrations()),

            Stat::make('QR Codes', QRCode::query()->count()),
                // ->chart($this->getDailyQRCodeCreations()),

            Stat::make('Clicks per Month', '12'),
                // ->chart([7, 2, 10, 3, 15, 4, 17]), // Modify as needed
        ];
    }

    private function getDailyRegistrations(): array
    {
        return User::query()
            ->where('created_at', '>=', now()->subDays(6)) // Last 7 days (including today)
            ->selectRaw('DATE(created_at) as day, COUNT(*) as count')
            ->groupBy('day')
            ->orderBy('day')
            ->pluck('count')
            ->toArray();
    }

    private function getDailyQRCodeCreations(): array
    {
        return QRCode::query()
            ->where('created_at', '>=', now()->subDays(6)) // Last 7 days
            ->selectRaw('DATE(created_at) as day, COUNT(*) as count')
            ->groupBy('day')
            ->orderBy('day')
            ->pluck('count')
            ->toArray();
    }
}
