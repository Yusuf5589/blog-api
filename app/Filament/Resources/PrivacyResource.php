<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrivacyResource\Pages;
use App\Filament\Resources\PrivacyResource\RelationManagers;
use App\Models\Policy;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PrivacyResource extends Resource
{

    protected static ?string $navigationGroup = "General Controls";
    protected static ?string $model = Policy::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make("title"),
                TextInput::make("description"),
                TextInput::make("slug"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("title"),
                TextColumn::make("description"),
                TextColumn::make("slug"),
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
            'index' => Pages\ListPrivacies::route('/'),
            'create' => Pages\CreatePrivacy::route('/create'),
            'edit' => Pages\EditPrivacy::route('/{record}/edit'),
        ];
    }
}
