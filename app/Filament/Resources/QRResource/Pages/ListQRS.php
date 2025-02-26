<?php

namespace App\Filament\Resources\QRResource\Pages;

use App\Filament\Resources\QRResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQRS extends ListRecords
{
    protected static string $resource = QRResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
