<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TagihanResource\Pages;
use App\Filament\Resources\TagihanResource\RelationManagers;
use App\Models\Tagihan;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms\Components\Select;


class TagihanResource extends Resource
{
    protected static ?string $model = Tagihan::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()->schema([
                    Select::make('pengguna_id')
                        ->label('Pengguna')
                        ->relationship('pengguna', 'nama')
                        ->searchable()
                        ->required()
                        ->createOptionForm([
                            TextInput::make('kode')
                                ->required(),
                            TextInput::make('nama')
                                ->required(),
                            TextInput::make('alamat')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('no_whatsapp')
                                ->label('Nomer Whatsapp')
                                ->tel()
                                ->required(),
                            Toggle::make('status')
                        ]),
                    DatePicker::make('tanggal'),
                    TextInput::make('air_sebelum'),
                    TextInput::make('air_sesudah'),
                    TextInput::make('meter'),
                    TextInput::make('harga')
                        ->numeric()
                        ->prefix('Rp')
                        ->maxValue(1000000.00),
                    Toggle::make('lunas')
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('tanggal')
                    ->sortable(),
                TextColumn::make('pengguna.nama')
                    ->searchable(),
                TextColumn::make('air_sebelum'),
                TextColumn::make('air_sesudah'),
                TextColumn::make('meter'),
                TextColumn::make('harga'),
                ToggleColumn::make('lunas'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTagihans::route('/'),
        ];
    }
}
