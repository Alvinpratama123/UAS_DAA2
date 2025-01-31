<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\TasResource\Pages;
use App\Filament\Admin\Resources\TasResource\RelationManagers;
use App\Models\Tas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TasResource extends Resource
{
    protected static ?string $model = Tas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('panjang')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('lebar')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('tinggi')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('Bungkus_kopi')
                    ->required(),
                    Forms\Components\Textarea::make('aksesoris')
                    ->required(),
                    Forms\Components\Textarea::make('jumlah_dibuat')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->sortable(),
                Tables\Columns\TextColumn::make('panjang')->sortable(),
                Tables\Columns\TextColumn::make('lebar')->sortable(),
                Tables\Columns\TextColumn::make('tinggi')->sortable(),
                Tables\Columns\TextColumn::make('Bungkus_kopi')->sortable(),
                Tables\Columns\TextColumn::make('aksesoris')->limit(50),
                Tables\Columns\TextColumn::make('jumlah_dibuat')->limit(50),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTas::route('/'),
            'create' => Pages\CreateTas::route('/create'),
            'edit' => Pages\EditTas::route('/{record}/edit'),
        ];
    }
}
