<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Filament\Resources\PostResource\RelationManagers\FeedbacksRelationManager;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Support\Facades\Auth;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    // protected static ?string $recordTitleAttribute = 'title';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Section::make('Create a new Post')->schema([
                    TextInput::make('title')->required(),
                    Textarea::make('intro')->required(),
                    RichEditor::make('content')

                        ->fileAttachmentsDisk('public')
                        ->fileAttachmentsDirectory('imagesPost')
                        ->required(),
                    Group::make()->schema([
                        Select::make('user_id')->label('Author')->options([
                            Auth::user()->id => Auth::user()->name
                        ])->native(false)->visibleOn('create'),
                        Select::make('category_id')->label('Category')->relationship('category', 'name')->required()
                    ])->columns(2)
                ])->columnSpan(2),
                Section::make('Image')->collapsed(false)->schema([
                    FileUpload::make('thumbnail')->disk('public')->directory('images')->required(),
                    TagsInput::make('tags')->required(),
                    Toggle::make('published')
                        ->onColor('success')
                        ->offColor('danger')
                ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        $user = auth()->user();
        return $table
            ->query(
                Post::query()
                    ->when(!$user->is_admin, function ($query) use ($user) {
                        return $query->where('user_id', $user->id);
                    })
            )
            ->columns([
                //
                TextColumn::make('id')
                    ->label('ID') // ID giữ nguyên
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->visible(Auth::user()->is_admin),

                ImageColumn::make('thumbnail')
                    ->label('サムネイル') // Thumbnail
                    ->toggleable(),

                TextColumn::make('title')
                    ->label('タイトル') // Title
                    ->searchable()
                    ->toggleable()
                    ->limit(40),

                TextColumn::make('category.name')
                    ->label('カテゴリ') // Category
                    ->searchable()
                    ->toggleable()
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('ユーザー') // User
                    ->searchable()
                    ->toggleable()
                    ->sortable(),

                IconColumn::make('published')
                    ->label('公開状況') // Published
                    ->icon(fn(string $state): string => match ($state) {
                        '1' => 'heroicon-o-check-circle',
                        '' => 'heroicon-o-clock',
                    })
                    ->color(fn(string $state): string => match ($state) {
                        '1' => 'success',
                        '' => 'warning'
                    })
                    ->sortable(),

                TextColumn::make('view')
                    ->label('閲覧数') // View
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('作成日') // Created At
                    ->date()
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),

            ])
            ->filters([
                //
                Tables\Filters\SelectFilter::make('カテゴリ')
                    ->relationship('category', 'name'),
                Tables\Filters\SelectFilter::make('著者')
                    ->relationship('user', 'name'),
                Tables\Filters\SelectFilter::make('出版された')
                    ->options([
                        '1' => '出版された',
                        '0' => '待っている'
                    ])

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),


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
            FeedbacksRelationManager::class

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return '投稿';
    }

    public static function getModelLabel(): string
    {
        return '投稿'; // "Category" trong tiếng Nhật
    }

    public static function getPluralModelLabel(): string
    {
        return '投稿'; // "Categories" trong tiếng Nhật
    }
}
