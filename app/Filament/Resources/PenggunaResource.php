<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AirResource\RelationManagers\TagihansRelationManager;
use App\Filament\Resources\PenggunaResource\Pages;
use App\Filament\Resources\PenggunaResource\RelationManagers;
use App\Models\Pengguna;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\FormsComponent;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Columns\ToggleColumn;


class PenggunaResource extends Resource
{
    protected static ?string $model = Pengguna::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()->schema([
                    TextInput::make('kode')
                    ->required(),
                    TextInput::make('nama')
                    ->required(),
                    TextInput::make('alamat')
                    ->required(),
                    TextInput::make('no_whatsapp')
                    ->label('Nomer Whatsapp')
                    ->tel()
                    ->required(),
                    Toggle::make('status')
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            //
                TextColumn::make('kode'),
                TextColumn::make('nama')
                ->searchable(),
                TextColumn::make('alamat')
                ->searchable(),
                TextColumn::make('no_whatsapp'),
                ToggleColumn::make('status'),
            ])
            ->filters([
            //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPenggunas::route('/'),
            'create' => Pages\CreatePengguna::route('/create'),
            'edit' => Pages\EditPengguna::route('/{record}/edit'),
        ];
    }
}
