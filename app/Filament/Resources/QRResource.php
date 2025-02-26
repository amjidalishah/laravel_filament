<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QRResource\Pages;
use App\Models\QR;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;

class QRResource extends Resource
{
    protected static ?string $model = QR::class;

   // protected static ?string $navigationIcon = 'heroicon-o-qrcode';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                TextInput::make('origin_domain')
                    ->required()
                    ->maxLength(255),
                TextInput::make('target_domain')
                    ->required()
                    ->maxLength(255),
                Toggle::make('status')
                    ->label('Active')
                    ->default(true),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('origin_domain')->sortable()->searchable(),
                TextColumn::make('target_domain')->sortable()->searchable(),
                BooleanColumn::make('status')->label('Active'),
            ])
            ->filters([
                // Add any table filters if needed
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQRs::route('/'),
            'create' => Pages\CreateQR::route('/create'),
            'edit' => Pages\EditQR::route('/{record}/edit'),
        ];
    }
}
