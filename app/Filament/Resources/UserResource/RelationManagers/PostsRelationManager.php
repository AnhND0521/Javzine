<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
class PostsRelationManager extends RelationManager
{
    protected static string $relationship = 'posts';

    public function form(Form $form): Form
    {
        return $form
        ->schema([
            //
            Section::make('Create a new Post')->schema([
                TextInput::make('title')->required(),
                Textarea::make('intro')->required(),
                MarkdownEditor::make('content')
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('imagesPost')
                    ->required(),
                Group::make()->schema([
                    Select::make('user_id')->label('Author')->relationship('user', 'name')->required(),
                    Select::make('category_id')->label('Category')->relationship('category', 'name')->required()
                ])->columns(2)
            ]),
            Section::make('Image')->collapsed(false)->schema([
                FileUpload::make('thumbnail')->disk('public')->directory('images')->required(),
                TagsInput::make('tags')->required(),
            ]),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')->label('Image'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\IconColumn::make('published')
                ->icon(fn (string $state): string => match ($state) {
                    // true => 'heroicon-o-clock',
                    // false => 'heroicon-o-check-circle',
                    '1' => 'heroicon-o-check-circle',
                    '' => 'heroicon-o-clock',
                })
                ->color(fn (string $state): string => match ($state) {
                    '1' => 'success',
                    '' => 'warning'
                }),
                Tables\Columns\TextColumn::make('created_at')->label('Created At')->date(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
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
}
