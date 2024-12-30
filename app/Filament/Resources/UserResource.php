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
                TextColumn::make('name')
                    ->label('名前') // Name
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('メールアドレス'), // Email

                TextColumn::make('created_at')
                    ->label('作成日') // Created At
                    ->date()
                    ->sortable(),

                IconColumn::make('is_admin')
                    ->label('管理者') // Admin
                    ->icon(fn(string $state): string => match ($state) {
                        '1' => 'heroicon-o-check-circle',
                        '' => 'heroicon-o-x-circle',
                    })
                    ->color(fn(string $state): string => match ($state) {
                        '1' => 'success',
                        '' => 'danger',
                    })
                    ->searchable()
                    ->sortable(),

            ])
            ->filters([
                //
                Tables\Filters\SelectFilter::make('管理者')->label('役割')->options([
                    '1' => '管理者',
                    '0' => 'メンバー'
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

    public static function getNavigationLabel(): string
    {
        return 'ユーザー';
    }

    public static function getModelLabel(): string
    {
        return 'ユーザー'; // "Category" trong tiếng Nhật
    }

    public static function getPluralModelLabel(): string
    {
        return 'ユーザー'; // "Categories" trong tiếng Nhật
    }
}
