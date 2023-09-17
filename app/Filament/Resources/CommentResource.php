<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Filament\Resources\CommentResource\RelationManagers;
use App\Models\Comment;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Textarea::make('body')->label('Comment')->required(),
                Select::make('user_id')->label('Sender')->options([
                    Auth::user()->id => Auth::user()->name
                ])->native(false)->visibleOn('create'),
                Select::make('post_id')->label('Post')
                    ->relationship('post', 'title')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('body')->label('Comment')->searchable()->sortable(),
                TextColumn::make('user.name')->label('Sender')->searchable()->sortable(),
                TextColumn::make('post.title')->label('Post')->searchable()->sortable(),
                TextColumn::make('created_at')
                    ->label('Posted at')
                    ->date()
                    ->sortable()
                    ->searchable()
            ])
            ->filters([
                //
                Tables\Filters\SelectFilter::make('Sender')
                    ->relationship('user', 'name'),
                Tables\Filters\SelectFilter::make('Post')
                    ->relationship('post', 'title'),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                // Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }
}
