<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Blog;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Date;
use Symfony\Component\VarDumper\Caster\ImgStub;
use Illuminate\Support\Str;

class BlogResource extends Resource
{
    protected static ?string $navigationGroup = "General Controls";

    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make("title")->required()->reactive()->live(debounce:'500')->afterStateUpdated(fn(Set $set, $state)=>$set("slug", Str::slug($state))),
                TextInput::make("slug")->required(),
                MarkdownEditor::make('description')->required(),
                DatePicker::make("beginning_date")
                ->label("Starter Date")
                ->minDate(now()->startOfDay()),
                DatePicker::make("finish_date")->label("Finish Date")->after("beginning_date")->minDate(now()->addDay()),
                TagsInput::make("tags")->required(),
                Select::make('category_id')->label("Category")->options(Category::pluck("name","id"))->required(),
                FileUpload::make("img_url")->disk("public")->directory("img_url")->nullable(),
                Toggle::make('status')->onColor('success')->offColor('danger')->visible(fn()=>auth()->user()->hasRole("super_admin"))
            ]);
    }

    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('slug'),
                TextColumn::make('description')
                ->extraAttributes([
                    'style' => '
                                overflow: hidden; 
                                text-overflow: ellipsis; 
                                white-space: normal;',
                ]),            
                TextColumn::make('beginning_date'),
                TextColumn::make('finish_date'),
                TextColumn::make('tags'),
                TextColumn::make('category.name')->label('Category'),
                ImageColumn::make('img_url')->defaultImageUrl(url('storage/img_url/blog-default.png')),
                IconColumn::make('status')->boolean(),
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
