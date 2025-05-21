<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScheduleResource\Pages;
use App\Models\Schedule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('driver_id')
                    ->relationship('driver', 'name')
                    ->searchable()
                    ->required()
                    ->label('Nama Supir'),

                Forms\Components\DateTimePicker::make('departure_time')
                    ->required()
                    ->label('Waktu Berangkat'),

                Forms\Components\DateTimePicker::make('arrival_time')
                    ->label('Waktu Tiba'),

                Forms\Components\TextInput::make('destination')
                    ->required()
                    ->maxLength(255)
                    ->label('Tujuan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('driver.name')
                    ->label('Nama Supir')
                    ->searchable(),

                Tables\Columns\TextColumn::make('departure_time')
                    ->label('Waktu Berangkat')
                    ->dateTime(),

                Tables\Columns\TextColumn::make('arrival_time')
                    ->label('Waktu Tiba')
                    ->dateTime(),

                Tables\Columns\TextColumn::make('destination')
                    ->label('Tujuan')
                    ->searchable(),
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
            'index' => Pages\ListSchedules::route('/'),
            'create' => Pages\CreateSchedule::route('/create'),
            'edit' => Pages\EditSchedule::route('/{record}/edit'),
        ];
    }
}