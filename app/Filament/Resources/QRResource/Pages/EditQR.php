<?php

namespace App\Filament\Resources\QRResource\Pages;

use App\Filament\Resources\QRResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQR extends EditRecord
{
    protected static string $resource = QRResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
