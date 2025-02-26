<?php
 
 namespace App\Filament\Resources;

 use Filament\Pages\Dashboard as BaseDashboard;
 use Filament\Widgets\StatsOverviewWidget;
 use App\Filament\Widgets\UserStats;
 
 class Dashboard extends BaseDashboard
 {
     public static function getWidgets(): array
     {
         return [
             UserStats::class, // Custom Statistics Widget
         ];
     }
 }
 