<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Filament\Resources\CategoryResource\RelationManagers\PostsRelationManager;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    // public static function shouldRegisterNavigation(): bool
    // {
    //     return Auth::user()->is_admin;
    // }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')->required(),
                TextInput::make('slug')->required(),
                TextInput::make('icon')->required(),
                ColorPicker::make('color')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('name')
                    ->label('名前') // Name
                    ->searchable(),

                TextColumn::make('slug')
                    ->label('スラッグ') // Slug
                    ->searchable(),

                ColorColumn::make('color')
                    ->label('カラー'), // Color

                TextColumn::make('created_at')
                    ->label('作成日') // Created At
                    ->sortable()
                    ->visible(Auth::user()->is_admin),

            ])
            ->filters([
                //

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->visible(Auth::user()->is_admin),
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
            PostsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'カテゴリ';
    }

    public static function getModelLabel(): string
    {
        return 'カテゴリ'; // "Category" trong tiếng Nhật
    }

    public static function getPluralModelLabel(): string
    {
        return 'カテゴリ'; // "Categories" trong tiếng Nhật
    }
}
