<?php
namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\QRCode;
use Filament\Resources\Resource;
use Filament\Forms\Components\Hidden;
use Illuminate\Support\Facades\Auth; 
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Placeholder;
use App\Filament\Resources\QRCodeResource\Pages; 
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QRCodeResource extends Resource
{
    protected static ?string $model = QRCode::class;

    protected static ?string $navigationIcon = 'heroicon-m-qr-code';
   // protected static ?string $navigationIcon = 'lucide-qr-code';
    //protected static ?string $navigationIcon = 'heroicon-o-view-grid';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Textarea::make('url')
                    ->label('Target URL')
                    ->nullable()
                    ->maxLength(500),
                Hidden::make('user_id')
                    ->default(Auth::id()),

                Placeholder::make('qr_code_preview')
                    ->content(fn ($record) => $record ? '<img src="' . url('/qr/' . $record->uuid) . '" width="150">' : '')
                    ->label('QR Code Preview')
                    ->columnSpanFull()
                    ->visible(fn ($record) => $record !== null),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('url')->label('Target URL')->wrap(),
                ImageColumn::make('qr_code')
                    ->label('QR Code')
                    ->getStateUsing(fn ($record) => url('/qr/' . $record->uuid))
                    ->square(),
                TextColumn::make('created_at')->dateTime('d-m-Y'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQRCodes::route('/'),
            'create' => Pages\CreateQRCode::route('/create'),
            'edit' => Pages\EditQRCode::route('/{record}/edit'),
        ];
    }
}
