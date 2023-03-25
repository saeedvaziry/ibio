<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Name'),
                TextInput::make('email')->label('Email'),
                TextInput::make('username')->label('Username'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID'),
                Tables\Columns\TextColumn::make('name')->label('Name'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\ViewColumn::make('username')->label('Username')->view('filament.tables.columns.username'),
                Tables\Columns\TextColumn::make('created_at')->label('Registered At')->view('filament.tables.columns.date'),
            ])
            ->filters([
                Tables\Filters\Filter::make('name')->form([
                    TextInput::make('name')->label('Name'),
                ])->query(function (Builder $query, array $data) {
                    $query->when($data['name'], fn (Builder $query, $name): Builder => $query->where('name', 'like', "%$name%"));
                }),
                Tables\Filters\Filter::make('email')->form([
                    TextInput::make('email')->label('Email'),
                ])->query(function (Builder $query, array $data) {
                    $query->when($data['email'], fn (Builder $query, $email): Builder => $query->where('email', 'like', "%$email%"));
                }),
                Tables\Filters\Filter::make('username')->form([
                    TextInput::make('username')->label('Username'),
                ])->query(function (Builder $query, array $data) {
                    $query->when($data['username'], fn (Builder $query, $username): Builder => $query->where('username', 'like', "%$username%"));
                }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                //
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
            'index' => Pages\ListUsers::route('/'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
