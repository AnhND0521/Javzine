<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\RelationManagers\PostsRelationManager;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Filament\Resources\UserResource\RelationManagers\CommentsRelationManager;
use App\Filament\Resources\UserResource\RelationManagers\FavoritePostsRelationManager;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ToggleColumn;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function shouldRegisterNavigation(): bool
    {
        return Auth::user()->is_admin;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')->required()->minLength(3),
                TextInput::make('password')->required()->password()->visibleOn('create'),
                TextInput::make('email')->email(),
                Toggle::make('is_admin')
                    ->onColor('success')
                    ->offColor('danger')
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('email'),
                TextColumn::make('created_at')->date()->sortable(),
                IconColumn::make('is_admin')
                    ->label('Admin')
                    ->icon(fn (string $state): string => match ($state) {
                        // true => 'heroicon-o-clock',
                        // false => 'heroicon-o-check-circle',
                        '1' => 'heroicon-o-check-circle',
                        '' => 'heroicon-o-x-circle',
                    })
                    ->color(fn (string $state): string => match ($state) {
                        '1' => 'success',
                        '' => 'danger'
                    })
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
                Tables\Filters\SelectFilter::make('is_admin')->label('Role')->options([
                    '1' => 'Admin',
                    '0' => 'Member'
                ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
            PostsRelationManager::class,
            CommentsRelationManager::class,
            FavoritePostsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
