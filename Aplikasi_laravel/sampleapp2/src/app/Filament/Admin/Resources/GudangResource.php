<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\GudangResource\Pages;
use App\Filament\Admin\Resources\GudangResource\RelationManagers;
use App\Models\Gudang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GudangResource extends Resource
{
    protected static ?string $model = Gudang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('tas_id')
                    ->label('Nama Tas')
                    ->options(Tas::all()->pluck('nama', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('jumlah')
                    ->numeric()
                    ->required()
                    ->default(0),
                    Forms\Components\TextInput::make('Bungkus_kopi')
                    ->numeric()
                    ->required()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tas.nama')->label('Nama Tas')->sortable(),
                Tables\Columns\TextColumn::make('tas.panjang')->sortable(),
                Tables\Columns\TextColumn::make('tas.lebar')->sortable(),
                Tables\Columns\TextColumn::make('tas.tinggi')->sortable(),
                Tables\Columns\TextColumn::make('Bungkus_kopi')->sortable(),
                Tables\Columns\TextColumn::make('jumlah')->sortable(),
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
            'index' => Pages\ListGudangs::route('/'),
            'create' => Pages\CreateGudang::route('/create'),
            'edit' => Pages\EditGudang::route('/{record}/edit'),
        ];
    }
}
